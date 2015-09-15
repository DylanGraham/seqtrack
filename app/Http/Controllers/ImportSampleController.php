<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Requests\SampleImportRequest;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use Session;
use Input;
use File;
use DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;

class ImportSampleController extends Controller
{
    protected $errors = [];
    protected $uniqueSamples = [];
    /*
     * Restrict access to authenticated users
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $this->middleware('super');
        return view('import.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validateFile($request);
        return redirect('import');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function process() {

    }

    public function checkHeaders($header) {
        if($header[0] == 'SampleID') {
            if($header[1] == 'I7IndexID') {
                if($header[2] == 'I7Sequence') {
                    if($header[3] == 'I5IndexID') {
                        if($header[4] == 'I5Sequence') {
                            return true;
                        } else {
                            array_push($this->errors, 'Missing column I5Sequence');
                            return FALSE;
                        }
                    } else {
                        array_push($this->errors, 'Missing column I5IndexID');
                        return FALSE;
                    }
                } else {
                    array_push($this->errors, 'Missing column I7Sequence');
                    return FALSE;
                }
            } else {
                array_push($this->errors, 'Missing column I7IndexID');
                return FALSE;
            }
        } else {
            array_push($this->errors, 'Missing column SampleID');
            return FALSE;
        }
    }

    public  function validateFile(Request $request) {
        $file = array('sampleFile' => Input::file('sampleFile'));
        // setting up rules
        $rules = array('sampleFile' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('import')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Input::file('sampleFile')->isValid()) {
                $array = $this->csvToArray(Request::file('sampleFile'));
                if(Count($this->errors)) {
                    Session::flash('error', $this->errors);
                    $this->errors = [];
                } else {
                    Session::flash('success', "File Upload Successful");
                    $this->addData(Request::file('sampleFile'));
                }
                //return Redirect::to('import');
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('import');
            }
        }
    }

    public function csvToArray($filename, $delimiter=',')
    {
        $count = 1;
        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(!$header) {
                    if($this->checkHeaders($row) !== FALSE) {
                        $header = $row;
                    } else {
                        return FALSE;
                    }
                }
                else {
                    $this->checkSampleId($row[0], $count);
                    $this->checkI7Index($row[1], $row[2], $count);
                    $this->checkI5Index($row[3], $row[4], $count);
                    $data[] = array_combine($header, $row);
                }
                $count++;
            }
            fclose($handle);
            print_r($this->errors);
        }
        return $data;
    }

    public function checkSampleId($sampleId, $line) {
        if($sampleId != "") {
            if(!in_array($sampleId, $this->uniqueSamples)) {
            $result = DB::Table('samples')
                ->select('sample_id')
                ->where('sample_id', 'LIKE', $sampleId)
                ->get();
            if (Count($result) != 0) {
                array_push($this->errors, 'Sample id on line ' . $line . '. Already exists in the database.');
                return FALSE;
            } else {
                array_push($this->uniqueSamples, $sampleId);
                return TRUE;
            }

            } else {
                array_push($this->errors, 'Duplicate Sample Id on line ' . $line . '. Please check it.');
                return FALSE;
            }
        } else {
            array_push($this->errors, 'Sample ID missing on line '.$line);
            return FALSE;
        }
    }

    public function checkI7Index($indexId, $sequenceId, $line) {
        if($indexId == "" || $sequenceId == "") {
            array_push($this->errors, 'Empty I7Index or I7Sequence on line '.$line);
            return FALSE;
        } else {
            $sequence = DB::Table('i7_index')->select('sequence')
                ->where('index', 'LIKE', $indexId)
                ->get();
            if($sequenceId == $sequence[0]->sequence) {
                return TRUE;
            } else {
                array_push($this->errors, 'Invalid I7Index - I7Sequence pair on line '.$line);
                return FALSE;
            }
        }
    }

    public function checkI5Index($indexId, $sequenceId, $line)
    {
        if ($indexId == "" && $sequenceId == "") {
            return TRUE;
        } elseif ($indexId == "" && $sequenceId != "") {
            array_push($this->errors, 'Missing I5Index for I5Sequence on line ' . $line);
        } elseif($indexId != "" && $sequenceId == "") {
            array_push($this->errors, 'Missing I5Sequence for I5Index on line ' . $line);
        } else {
            $sequence = DB::Table('i5_index')->select('sequence')
                ->where('index', 'LIKE', $indexId)
                ->get();
            if($sequenceId == $sequence[0]->sequence) {
                return TRUE;
            } else {
                array_push($this->errors, 'Invalid I5Index - I5Sequence pair on line '.$line);
                return FALSE;
            }
        }
    }

    public function addData($filename, $delimiter=',') {
        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(!$header) {
                    if($this->checkHeaders($row) !== FALSE) {
                        $header = $row;
                    } else {
                        return FALSE;
                    }
                }
                else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
    }
}
