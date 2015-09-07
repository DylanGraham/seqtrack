<script>

    var selectedBatches = document.getElementsByName('batch_check_id');

    var selectBatchesLabel = document.getElementById('selected_batches_label');


    function checkSelectedBatches() {

        var $count = 0;
        var $selected = [];
        var $notselected = [];

        $("input:checkbox[name=batch_check_id]:checked").each(function () {

            $selected.push($(this).val());
            $count++;


        });
        document.getElementById('selected_batches_label').innerHTML = 'batches selected ' + $selected;


        $("input:checkbox[name=batch_check_id]").each(function () {
            if (this.checked == false) {

                $notselected.push($(this).val());
                this.style.display = 'block';
            }

        });
        document.getElementById('unselected_batches_label').innerHTML = 'batches not selected ' + $notselected;


        var $used_sequences ={init:1} ;
        var $repeated_sequences ={init:1} ;
        var $compatible;
        var $i7_length;
        var $i5_length;
        var $i7_length_first;
        var $i5_length_first;

        @foreach($batches as $batch)
            if ($selected[0] =='{{($batch->id)}}') {
            <?php
                   // check first sequnce length in batch. all sequences in batch should be same length
                   $i7_length = strlen($batch->samples[0]->i7_index->sequence);

                   if (count($batch->samples[0]->i5_index_id) != NULL) {
                       $i5_length = strlen($batch->samples[0]->i5_index->sequence);
                       $i5_used = true;

                   } else {
                       $i5_length = 0;
                       $i5_used = false;

                   }
                   ?>

                $i7_length_first = '<?php  echo $i7_length;?>';
                $i5_length_first = '<?php  echo $i5_length;?>';

        }
        @endforeach

           @foreach($batches as $batch)


                $compatible = "Compatible";
                var $batch_sequences ={init:1} ;
                if ($selected.indexOf('{{($batch->id)}}') > -1) {
                @foreach($batch->samples as $sample)

                    <?php

                    $i7_length = strlen($sample->i7_index->sequence);
                    if (count($batch->samples[0]->i5_index_id) != NULL ){

                        $i5_length = strlen($sample->i5_index->sequence);
                        $i5_used = true;
                        $key = ($sample->i7_index->sequence).'/'.($sample->i5_index->sequence);

                    }else{

                        $i5_length = 0;
                        $i5_used = false;
                        $key = ($sample->i7_index->sequence);

                    }
                    ?>

                     $i5_length = '<?php  echo $i5_length; ?>';
                     $i7_length = '<?php  echo $i7_length; ?>';

                    if ($used_sequences.hasOwnProperty('<?php echo $key; ?>') ) {

                        $repeated_sequences[ '<?php echo $key; ?>'] = 1 ;
                        $compatible = "Not Compatible";


                    } else {

                        $batch_sequences[ '<?php echo $key; ?>' ] = 1;

                    }

                @endforeach

                if ($compatible == "Compatible") {


                    for (var attrname in $batch_sequences) { $used_sequences[attrname] = $batch_sequences[attrname]; }
                }else {
                    document.getElementById('errors_label').innerHTML = 'Error '+ $compatible;
                }
            }
        @endforeach


        @foreach($batches as $batch)



            if ($notselected.indexOf('{{($batch->id)}}')  >= 0 && $selected.length >0) {
                @foreach($batch->samples as $sample)
                    <?php
                    if (count($batch->samples[0]->i5_index_id) != NULL ){
                        $i5_length = strlen($sample->i5_index->sequence);

                        $i5_used = true;
                        $key = ($sample->i7_index->sequence).'/'.($sample->i5_index->sequence);
                    }else{
                        $i5_length = 0;
                        $i5_used = false;
                        $key = ($sample->i7_index->sequence);
                    }
                    $i7_length = strlen($sample->i7_index->sequence);
                    ?>

                    if ($used_sequences.hasOwnProperty('<?php echo $key ?>')    ||
                                    $i7_length_first != '<?php echo $i5_length; ?>' ||
                                    $i5_length_first != '<?php echo $i5_length; ?>'   )
                    {
                       $("input:checkbox[name=batch_check_id]").each(function () {
                            if($(this).val()=='{{($batch->id)}}' )
                           this.style.display = 'none';

                        });




                    }
                @endforeach
            }

        @endforeach

    }

</script>
