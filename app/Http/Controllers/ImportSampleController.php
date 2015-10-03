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
use App\Http\Requests\ImportSampleRequest;
use App\I7Index;
use App\I5Index;
use App\Batch;
use App\IndexSet;
use App\ProjectGroup;
use App\Sample;
use DB;
use File;
use Illuminate\Support\Facades\Auth;
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
    /**
     * @var array
     */
    protected $errorTitles = [
        'header',
        'sampleIdAlreadyExists',
        'sampleIdDuplicate',
        'sampleIdMissing',
        'missingI7Pair',
        'i7IndexSeqNotMatch',
        'missingI7Index',
        'missingI5',
        'i5IndexSeqNotMatch',
        'missingI5Index',
        'differentI7IndexSet',
        'differentI5IndexSet',
        'uniqueIndexes',
        'samplesCompatiblity',
    ];
    /**
     * @var array
     */
    protected $errorArray = array(
        'header' => array(),
        'sampleIdAlreadyExists' => array(),
        'sampleIdDuplicate' => array(),
        'sampleIdMissing' => array(),
        'missingI7Pair' => array(),
        'i7IndexSeqNotMatch' => array(),
        'missingI7Index' => array(),
        'missingI5' => array(),
        'i5IndexSeqNotMatch' => array(),
        'missingI5Index' => array(),
        'differentI7IndexSet' => array(),
        'differentI5IndexSet' => array(),
        'uniqueIndexes' => array(),
        'samplesCompatiblity' => array(),
    );

    /**
     * @var array
     */
    protected $stringErrors = array();

    /**
     * @var array
     */
    protected $uniqueSamples = [];

    /**
     * @var array
     */
    protected $uniqueIndexes = [];

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
    protected $i7IndexSetArray = [];

    /**
     * @var array
     */
    protected $i5IndexSetArray = [];

    /**
     * @var array
     */
    protected $i5Indexes = [];

    /**
     * @var int
     */
    protected $i5IndexSet = -1;

    /**
     * @var int
     */
    protected $i7IndexSet = -1;

    /**
     * @var int
     */
    protected $compatibilityChecker = -1;

    /**
     * @var int
     */
    protected $batchI7IndexSet = -1;

    /**
     * @var int
     */
    protected $batchI5IndexSet = -1;

    /**
     * @var int
     */
    protected $batchPairChecker = -1;

    protected $newBatch = 0;

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
        $user = Auth::user();
        $batches = $user->batches->lists('batch_name', 'id');

        return view('import.index', [
            'user' => $user,
            'batches' => $batches,
        ]);
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
     * @param Request $request
     * @return mixed
     */
    public function validateFile(ImportSampleRequest $request)
    {
        $instument_lane =1;

        $file = array('sampleFile' => Input::file('sampleFile'));
        // setting up rules
        /*$rules = array('sampleFile' => array('required', 'mimes:csv,txt'),
            'plate' => array('regex:/^[a-zA-Z0-9-]{1,120}$/' , 'max:120'),

            'well' => array('regex:/^[a-zA-Z0-9-]{1,120}$/', 'max:120'),

            'description' => array('regex:/^[a-zA-Z0-9-]{1,120}$/' , 'max:120'),

            'runs_remaining' => array('integer', 'between:1,60'),

            'instrument_lane' => array('integer', 'between:1,8'),
        );*/
         //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $rules = array();
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errorBag
            return Redirect::to('import')->withInput()->withErrors($validator);
        } else {
            // checking file is valid.
            //dd(Request::file('sampleFile')->getExtension());
            if (Input::file('sampleFile')->isValid()) {
                $this->i7Indexes = I7Index::lists('sequence', 'index');
                $this->i7IndexSetArray = I7Index::lists('index_set_id', 'index');
                $this->i5Indexes = I5Index::lists('sequence', 'index');
                $this->i5IndexSetArray = I5Index::lists('index_set_id', 'index');
                $this->samplesList = DB::table('samples')->lists('sample_id');
                $this->loadExistingSamples(Input::get()['batch_id']);
                $this->csvToArray(Request::file('sampleFile'));
                $this->generateErrors();
                if (Count($this->stringErrors)) {
                    Session::flash('error', $this->stringErrors);
                } else {
                    if($this->checkBatchCompatibility(Input::get()['batch_id'])) {
                        $this->addData(Request::file('sampleFile'), Input::get()['batch_id'], Input::get()['plate'],
                            Input::get()['well'], Input::get()['description'], Input::get()['runs_remaining'],
                            $instument_lane );
                        Session::flash('success', "File Upload Successful");
                    } else {
                        array_push($this->stringErrors, "File is not compatible with the batch selected.");
                        Session::flash('error', $this->stringErrors);
                    }
                }
                return Redirect::to('import')->withInput();
            } else {
                // sending back with error message.
                array_push($this->stringErrors, "Upload file is not valida.");
                Session::flash('error', $this->stringErrors);
                return Redirect::to('import')->withInput();
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
                    $this->setCompatiblityCheckers($row);
                    $this->checkSampleId($row[0], $count);
                    $this->checkI7Index($row[1], $row[2], $row[3], $count);
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
     * @param $row
     */
    private function setCompatiblityCheckers($row) {
        if($this->i7IndexSet == -1) {
            if(isset($this->i7IndexSetArray[$row[1]])) {
                $this->i7IndexSet = $this->i7IndexSetArray[$row[1]];
            }
        }
        if($this->i5IndexSet == -1) {
            if(isset($this->i5IndexSetArray[$row[3]])) {
                $this->i5IndexSet = $this->i5IndexSetArray[$row[3]];
            }
        }
        if($this->compatibilityChecker == -1) {
            if($row[3] == "") {
                $this->compatibilityChecker = 0;
            } else {
                $this->compatibilityChecker = 1;
            }
        }
    }

    /**
     * @param $header
     * @return bool
     */
    private function checkHeaders($header)
    {
        if(Count($header) > 5) {
            array_push($this->errorArray[$this->errorTitles[0]], 'Extra header columns, please check the format of the CSV file. Required format: sampleid, i7indexid, i7sequence, i5indexid, i5sequence');
            return FALSE;
        }
        if(Count($header) < 5) {
            array_push($this->errorArray[$this->errorTitles[0]], 'Missing header columns, please check the format of the CSV file. Required format: sampleid, i7indexid, i7sequence, i5indexid, i5sequence');
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
            array_push($this->errorArray[$this->errorTitles[0]], 'Column 3 header should be I7Sequence');
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
    private function checkSampleId($sampleId, $line)
    {
        if ($sampleId != "") {
            if (!in_array($sampleId, $this->uniqueSamples)) {
                array_push($this->uniqueSamples, $sampleId);
                if (array_search($sampleId, $this->samplesList)) {
                    array_push($this->errorArray[$this->errorTitles[1]], $line);
                    return FALSE;
                } else {
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
    private function checkI7Index($indexId, $sequenceId, $i5index, $line)
    {
        if ($indexId == "" || $sequenceId == "") {
            array_push($this->errorArray[$this->errorTitles[4]], $line);
            return FALSE;
        } else {
            if (isset($this->i7Indexes[$indexId])) {
                $indexString = $indexId.$i5index;
                if(!in_array($indexString, $this->uniqueIndexes)) {
                    array_push($this->uniqueIndexes, $indexString);
                    if ($sequenceId == $this->i7Indexes[$indexId]) {
                        if(($this->i7IndexSet != $this->i7IndexSetArray[$indexId]) ||
                            ($this->newBatch == 0 && $this->batchI7IndexSet != $this->i7IndexSetArray[$indexId])) {
                            array_push($this->errorArray[$this->errorTitles[10]], $line);
                            return FALSE;
                        }
                        return TRUE;
                    } else {
                        array_push($this->errorArray[$this->errorTitles[5]], $line);
                        return FALSE;
                    }
                } else {
                    array_push($this->errorArray[$this->errorTitles[12]], $line);
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
    private function checkI5Index($indexId, $sequenceId, $line)
    {
        if($indexId == "" && $sequenceId == "") {
            if($this->compatibilityChecker == 0) {
                return TRUE;
            } else {
                array_push($this->errorArray[$this->errorTitles[13]], $line);
                return FALSE;
            }
        } elseif ($indexId != "" && $sequenceId != "") {
            if(!$this->compatibilityChecker == 1) {
                array_push($this->errorArray[$this->errorTitles[13]], $line);
                return FALSE;
            }
            if (isset($this->i5Indexes[$indexId])) {
                if ($sequenceId == $this->i5Indexes[$indexId]) {
                    if(($this->i5IndexSet != $this->i5IndexSetArray[$indexId]) ||
                        ($this->newBatch == 0 && $this->batchI5IndexSet != $this->i5IndexSetArray[$indexId])) {
                        array_push($this->errorArray[$this->errorTitles[11]], $line);
                        return FALSE;
                    }
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
     * @param $batchId
     * @param $projectId
     * @param $plate
     * @param $well
     * @param string $description
     * @param int $runs
     * @param int $lanes
     * @param string $delimiter
     * @return bool
     */
    private function addData($filename, $batchId, $plate = '', $well = '', $description = '',
                            $runs = 0, $lanes = 0, $delimiter = ',')
    {
        $header = NULL;
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
                if (!$header) {
                    if ($this->checkHeaders($row) !== FALSE) {
                        $header = $row;
                    } else {
                        return FALSE;
                    }
                } else {
                    //TODO Check for compatiblity
                    $this->getI7IndexId($row[1]);
                    $sample = Sample::create(array(
                        'batch_id' => $batchId,
                        'sample_id' => $row[0],
                        'plate' => $plate,
                        'well' => $well,
                        'i7_index_id' => $this->getI7IndexId($row[1]),
                        'i5_index_id' => $this->getI5IndexId($row[3]),
                        'description' => $description,
                        'runs_remaining' => $runs,
                        'instrument_lane' => $lanes));
                }
            }
            fclose($handle);
        }
    }

    /**
     * @param $index
     * @return mixed
     */
    private function getI7IndexId($index)
    {
        $index = I7Index::where('index', 'LIKE', $index)->get();
        return $index[0]['id'];
    }

    /**
     * @param $index
     * @return mixed
     */
    private function getI5IndexId($index)
    {
        $index = I5Index::where('index', 'LIKE', $index)->get();
        if(isset($index[0])) {
            return $index[0]['id'];
        } else {
            return NULL;
        }
    }

    /**
     * @param $batchId
     * @return mixed
     */
    private function getBatchSamples($batchId) {
        $batch = Batch::find($batchId);
        return $batch->samples;
    }

    /**
     *
     */
    private function checkBatchCompatibility($batchId) {
        $samples = $this->getBatchSamples($batchId);
        if(Count($samples) > 0) {
            if ($this->batchPairChecker == $this->compatibilityChecker) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        return TRUE;
    }

    /**
     *
     */
    private function loadExistingSamples($batchId) {
        $samples = $this->getBatchSamples($batchId);
        foreach ($samples as $sample) {
            if($this->batchI5IndexSet == -1) {
                if($sample->i5_Index != "") {
                    $this->batchPairChecker = 1;
                    $this->batchI5IndexSet = $sample->i5_index->index_set_id;
                } else {
                    $this->batchI5IndexSet = -2;
                    $this->batchPairChecker = 0;
                }
            }
            if($this->batchI7IndexSet == -1) {
                $this->batchI7IndexSet = $sample->i7_index->index_set_id;
            }
            if($sample->i5_index == NULL) {
                $string = $sample->i7_index->index;
            } else {
                $string = $sample->i7_index->index.$sample->i5_index->index;
            }
            array_push($this->uniqueIndexes, $string);
        }
        if(Count($samples) == 0) {
            $this->newBatch = 1;
        }
    }

    /**
     *
     */
    private function generateErrors() {
        foreach ($this->errorArray as $key=>$value) {
            if(Count($value) > 0) {
                if ($key == $this->errorTitles[0]) {
                    $this->stringErrors = array_merge($this->stringErrors, $value);
                } elseif ($key == $this->errorTitles[1]) {
                    $this->errorStringHelper($value, "The Sample ID already exists in the database in lines ");
                } elseif ($key == $this->errorTitles[2]) {
                    $this->errorStringHelper($value, "Two or more entries have same Sample ID, check the lines ");
                } elseif ($key == $this->errorTitles[3]) {
                    $this->errorStringHelper($value, "Column Sample ID is empty for lines ");
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
                } elseif ($key == $this->errorTitles[10]) {
                    $this->errorStringHelper($value, "The I7Index Set doesn't matches on lines ");
                } elseif ($key == $this->errorTitles[11]) {
                    $this->errorStringHelper($value, "The I5Index Set doesn't matches on lines ");
                } elseif ($key == $this->errorTitles[12]) {
                    $this->errorStringHelper($value, "Following lines should have unique i7/i5 pairs ");
                } elseif ($key == $this->errorTitles[13]) {
                    $this->errorStringHelper($value, "The samples are not compatible on lines ");
                }
            }
        }
    }

    /**
     * @param $value
     * @param string $startString
     * @param string $endString
     */
    private function errorStringHelper($value, $startString = '', $endString = '') {
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
