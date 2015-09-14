<?php
/**
 * Created by PhpStorm.
 * User: phill
 * Date: 13/09/2015
 * Time: 12:28 PM
 */


                // check first sequnce length in batch. all sequences in batch should be same length
                $i7_lenghth = strlen($batch->samples[0]->i7_index->sequence);

                if (count($batch->samples[0]->i5_index_id) != NULL) {
                    $i5_lenghth = strlen($batch->samples[0]->i5_index->sequence);
                    $i5_used = true;

                } else {
                    $i5_lenghth = 0;
                    $i5_used = false;

                }

                // batch is not compatable if different to first batch it is compared to
                if ($first_i5_lenghth == $i5_lenghth && $first_i7_lenghth == $i7_lenghth)
                    $compatible = "Compatible";
                else  $compatible = "Not Compatible";


                $batch_sequences = array();
                // for each sample in batch check sequence
                foreach ($batch->samples as $sample) {
                    // set key as combination of i5 and i7 index sequence values
                    if ($i5_used == true) {
                        $key = $sample->i7_index->sequence . "/" . $sample->i5_index->sequence;
                    } else {
                        $key = $sample->i7_index->sequence;
                    }

                    // check if key has previously been used and if it has not add it to associative array as key
                    if (!array_key_exists($key, $used_sequences)) {
                        $batch_sequences[$key] = 1;

                    } else {
                        $repeated_sequences[$key] = 1;
                        $compatible = "Not Compatible";
                        $incompatible[$sample->sample_id] = $compatible . "&nbsp &nbsp Batch Name =" . $batch->batch_name . " &nbsp &nbsp Repeated Key pair =" . $key . " &nbsp &nbsp Sample id=" . $sample->sample_id;

                    }
                }
                if ($compatible == "Compatible")
                {
                    $used_sequences = array_merge($used_sequences,$batch_sequences);
                }

                ?>

<h3> used sequeces</h3>
<?php
foreach (array_keys($used_sequences) as $value)
    echo $value.'<br/>';

?>
<h3>Repeated sequeces</h3>
<?php
foreach (array_keys($repeated_sequences) as $value)
    echo $value.'<br/>';
?>
<h3>Incompatable samples</h3>
<?php
foreach ($incompatible as $value)
    echo $value.'<br/>';
?>
