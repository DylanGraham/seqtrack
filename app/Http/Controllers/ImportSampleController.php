<?php
/**
 *
 * The file contains a controller for importing samples to a batch in csv format.
 *
 * CSV Format
 * =================================================================
 * SampleID,I7IndexID,I7Sequence,I5IndexID,I5Sequence
 * Cs-WW-419124R-20150109-well-D1,D701,ATTACTCG,D508,GTACTGAC
 * Cs-WW-419124R-20150104-well-D1,D701,ATTACTCG,D508,GTACTGAC
 * =================================================================
 *
 * Author: Aakash B <bhansali.aakash@outlook.com>
 *
 * Copyrights 2015 reserved - Agribio
 *
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SampleImportRequest;
use App\I7Index;
use App\Sample;
use DB;
use File;
use Illuminate\Support\Facades\Request;
use Input;
use Redirect;
use Session;
use Validator;

/**
 * Class ImportSampleController
 * @package App\Http\Controllers
 */
class ImportSampleController extends Controller
{
    protected $errorTitles = [
        'header',
        'sampleIdAlreadyExists',
        'sampleIdMissing',
        'sampleIdDuplicate',
        'missingI7Pair',
        'i7IndexSeqNotMatch',
        'missingI7Index',
        'missingI5',
        'i5IndexSeqNotMatch',
        'missingI5Index',
    ];
    /**
     * @var array
     */
    protected $errorArray = array(
        'header' => array(),
        'sampleIdAlreadyExists' => array(),
        'sampleIdMissing' => array(),
        'sampleIdDuplicate' => array(),
        'missingI7Pair' => array(),
        'i7IndexSeqNotMatch' => array(),
        'missingI7Index' => array(),
        'missingI5' => array(),
        'i5IndexSeqNotMatch' => array(),
        'missingI5Index' => array(),
    );

    protected $stringErrors = array();

    /**
     * @var array
     */
    protected $uniqueSamples = [];
    /**
     * @var array
     */
    protected $samplesList = [];
    /**
     * @var array
     */
    protected $i7Indexes = [];

    /**
     * @var array
     */
    protected $i5Indexes = [];

    /**
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
     * @param  Request $request
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     */
    public function process()
    {

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function validateFile(Request $request)
    {
        $file = array('sampleFile' => Input::file('sampleFile'));

        $this->i7Indexes = I7Index::lists('sequence', 'index');
        $this->i5Indexes = I7Index::lists('sequence', 'index');
        $this->samplesList = DB::table('samples')->lists('sample_id');
        // setting up rules
        $rules = array('sampleFile' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errorBag
            return Redirect::to('import')->withInput()->withErrors($validator);
        } else {
            // checking file is valid.
            if (Input::file('sampleFile')->isValid()) {

                $this->csvToArray(Request::file('sampleFile'));
                $this->generateErrors();
                if (Count($this->stringErrors)) {
                    Session::flash('error', $this->stringErrors);
                } else {
                    Session::flash('success', "File Upload Successful");
                    $this->addData(Request::file('sampleFile'));
                }
                return Redirect::to('import');
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('import');
            }
        }
    }

    /**
     * @param $filename
     * @param string $delimiter
     * @return array|bool
     */
    public function csvToArray($filename, $delimiter = ',')
    {
        $count = 1;
        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
                if (!$header) {
                    if ($this->checkHeaders($row) !== FALSE) {
                        $header = $row;
                    } else {
                        return FALSE;
                    }
                } else {
                    $this->checkSampleId($row[0], $count);
                    $this->checkI7Index($row[1], $row[2], $count);
                    $this->checkI5Index($row[3], $row[4], $count);
                    $data[] = array_combine($header, $row);
                }
                $count++;
            }
            fclose($handle);
        }
        return $data;
    }

    /**
     * @param $header
     * @return bool
     */
    public function checkHeaders($header)
    {
        if(Count($header) > 5) {
            array_push($this->errorArray['header'], 'Extra header columns, please check the format of the CSV file.');
            return FALSE;
        }
        if (strtolower($header[0]) != 'sampleid') {
            array_push($this->errorArray[$this->errorTitles[0]], 'Column 1 header should be SampleID');
            return FALSE;
        }
        if (strtolower($header[1]) != 'i7indexid') {
            array_push($this->errorArray[$this->errorTitles[0]], 'Column 2 header should be I7IndexID');
            return FALSE;
        }
        if (strtolower($header[2]) != 'i7sequence') {
            array_push($this->errorArray[$this->errorTitles[0]], 'Column 3 header should be I7IndexID');
            return FALSE;
        }
        if (strtolower($header[3]) != 'i5indexid') {
            array_push($this->errorArray[$this->errorTitles[0]], 'Column 4 header should be  I5IndexID');
            return FALSE;
        }
        if (strtolower($header[4]) != 'i5sequence') {
            array_push($this->errorArray[$this->errorTitles[0]], 'Column 5 header should be I5Sequence');
            return FALSE;
        }
    }

    /**
     * @param $sampleId
     * @param $line
     * @return bool
     */
    public function checkSampleId($sampleId, $line)
    {
        if ($sampleId != "") {
            if (!in_array($sampleId, $this->uniqueSamples)) {
                if (array_search($sampleId, $this->samplesList)) {
                    array_push($this->errorArray[$this->errorTitles[1]], $line);
                    return FALSE;
                } else {
                    array_push($this->uniqueSamples, $sampleId);
                    return TRUE;
                }
            } else {
                array_push($this->errorArray[$this->errorTitles[2]], $line);
                return FALSE;
            }
        } else {
            array_push($this->errorArray[$this->errorTitles[3]], $line);
            return FALSE;
        }
    }

    /**
     * @param $indexId
     * @param $sequenceId
     * @param $line
     * @return bool
     */
    public function checkI7Index($indexId, $sequenceId, $line)
    {
        if ($indexId == "" || $sequenceId == "") {
            array_push($this->errorArray[$this->errorTitles[4]], $line);
            return FALSE;
        } else {
            if (isset($this->i7Indexes[$indexId])) {
                if ($sequenceId == $this->i7Indexes[$indexId]) {
                    return TRUE;
                } else {
                    array_push($this->errorArray[$this->errorTitles[5]], $line);
                    return FALSE;
                }
            } else {
                array_push($this->errorArray[$this->errorTitles[6]], $line);
            }
        }
    }

    /**
     * @param $indexId
     * @param $sequenceId
     * @param $line
     * @return bool
     */
    public function checkI5Index($indexId, $sequenceId, $line)
    {
        if($indexId == "" && $sequenceId == "") {
            return TRUE;
        } elseif ($indexId != "" && $sequenceId != "") {
            if (isset($this->i5Indexes[$indexId])) {
                if ($sequenceId == $this->i5Indexes[$indexId]) {
                    return TRUE;
                } else {
                    array_push($this->errorArray[$this->errorTitles[7]], $line);
                    return FALSE;
                }
            } else {
                array_push($this->errorArray[$this->errorTitles[8]], $line);
                return FALSE;
            }
        } else {
            array_push($this->errorArray[$this->errorTitles[9]], $line);
            return FALSE;
        }
    }

    /**
     * @param $filename
     * @param string $delimiter
     * @return bool
     */
    public function addData($filename, $delimiter = ',')
    {
        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
                if (!$header) {
                    if ($this->checkHeaders($row) !== FALSE) {
                        $header = $row;
                    } else {
                        return FALSE;
                    }
                } else {
                    //TODO Check with
                    $sample = Sample::create(array(
                        'batch_id' => '1',
                        //TODO Take the user project group id
                        'project_group_id',
                        'sample_id' => $row[0],
                        //TODO Add fields for plate and well
                        'plate' => NULL,
                        'well' => NULL,
                        'i7_index_id',
                        'i5_index_id',
                        //TODO Add a field in the form to add the description
                        'description' => "Imported",
                        //TODO Add a field in the form to add the runs_remaining
                        'runs_remaining' => 100,
                        //TODO Add a field in the form to add the instrument_lane
                        'instrument_lane' => 0));

                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
    }

    public function generateErrors() {
        foreach ($this->errorArray as $key=>$value) {
            if(Count($value) > 0) {
                if ($key == $this->errorTitles[0]) {
                    array_push($this->stringErrors, $value);
                } elseif ($key == $this->errorTitles[1]) {
                    $this->errorStringHelper($value, "The Sample ID present in lines ", " already exists in the database");
                } elseif ($key == $this->errorTitles[2]) {
                    $this->errorStringHelper($value, "Column Sample ID is empty for lines ");
                } elseif ($key == $this->errorTitles[3]) {
                    $this->errorStringHelper($value, "Two or more entries have same Sample ID, check the lines ");
                } elseif ($key == $this->errorTitles[4]) {
                    $this->errorStringHelper($value, "Column I7Index and I7Sequence is empty for lines ");
                } elseif ($key == $this->errorTitles[5]) {
                    $this->errorStringHelper($value, "The I7Index and I7Sequence entries are not matching for lines ");
                } elseif ($key == $this->errorTitles[6]) {
                    $this->errorStringHelper($value, "Column I7Index is missing from the database for lines ");
                } elseif ($key == $this->errorTitles[7]) {
                    $this->errorStringHelper($value, "The I5Index and I5Sequence can't be blank for lines ");
                } elseif ($key == $this->errorTitles[8]) {
                    $this->errorStringHelper($value, "The I5Index and I5Sequence pair don't match for lines ");
                } elseif ($key == $this->errorTitles[9]) {
                    $this->errorStringHelper($value, "Column I5Index is missing from the database for lines ");
                }
            }
        }
    }

    public function errorStringHelper($value, $startString = '', $endString = '') {
        $string = $startString;
        $lastItem = array_pop($value);
        foreach ($value as $line) {
            $string .= $line . ", ";
        }
        $string .= $lastItem;
        $string .= $endString;
        array_push($this->stringErrors, $string);
    }
}
