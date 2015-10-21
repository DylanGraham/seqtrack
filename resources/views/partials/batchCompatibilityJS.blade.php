<script>
/*
* Script checks batch compatibility on client side
* if i5 are used in one sample they must be used in all samples in run
* AND all samples must have a unique i5, i7 pair combination
* AND i5 sequences must be of all the same length
* AND i7 sequences must be of all the same length
*
*/

    var selectedBatches = document.getElementsByName('batch_check_id');

    var selectBatchesLabel = document.getElementById('selected_batches_label');


    function checkSelectedBatches() {

        var $count = 0;
        var $selected = [];
        var $notselected = [];

        // get list of selected batches as $selected
        $("input:checkbox[id=batch_check_id]:checked").each(function () {

            $selected.push($(this).val());
            $count++;
        });


        // get list of batches that have not been selected and redisplay all checkboxes until compatibility rechecked
        $("input:checkbox[id=batch_check_id]").each(function () {
            if (this.checked == false) {

                $notselected.push($(this).val());
                this.style.display = 'block';
            }

        });

        document.getElementById('errors_label').innerHTML = ' ';

        var $used_sequences = {'': 1};
        var $repeated_sequences = {'': 1};
        var $compatible;
        var $i7_length;
        var $i5_length;
        var $i7_length_first;
        var $i5_length_first;
        var $used_pairs = '';

        // find first selected batch
        @foreach($batches as $batch)
            if ($selected[0] == '{{($batch->id)}}') {
            <?php
               // check first i7 sequence length in batch. all sequences in batch should be same length
               // NOTE all sample i5,i7 lengths checked on server side before saving not just first in each batch
                    $i7_length = strlen($batch->samples[0]->i7_index->sequence);

                // check first sample uses an i5 and get its length
                if ($batch->samples[0]->i5_index_id) {
                   $i5_length = strlen($batch->samples[0]->i5_index->sequence);
                   $i5_used = true;

                 } else {
                   $i5_length = 0;
                   $i5_used = false;

                }
                ?>
                {{-- length of first sample i5 and i7 sequences    --}}
                $i7_length_first = '{{$i7_length}}';
                $i5_length_first = '{{$i5_length}}';

            }
        @endforeach


        @foreach($batches as $batch)

            $compatible = true;
            var $batch_sequences = {'': 1};

        //  if the batch has been selected to be added to run
        if ($selected.indexOf('{{($batch->id)}}') > -1) {
            <?php
            // find first sample in batch and gets is i7 sequence length
            $i7_length = strlen($batch->samples[0]->i7_index->sequence);

            // find first sample in batch then see if it uses a i5 index and gets is i5 sequence length
            if ($batch->samples[0]->i5_index_id ){

                $i5_length = strlen($batch->samples[0]->i5_index->sequence);
                $i5_used = true;
            }else{
                $i5_length = 0;
                $i5_used = false;
            }
            ?>
            // make sure i5 and i7 indexes are same length as first selected batch used as comparison
            if ($i5_length_first != '{{($i5_length)}}' || $i7_length_first != '{{($i7_length)}}') {
                $compatible = false;
                document.getElementById('errors_label').innerHTML = 'Error incompatable batch selected';
            }

            // for each sample in the selected batch
            @foreach($batch->samples as $sample)

                <?php
                    // concatenate i7 sequence and i5 sequence if used
                    if ($i5_used){
                        $key = ($sample->i7_index->sequence).' / '.($sample->i5_index->sequence);

                    }else{
                        $key = ($sample->i7_index->sequence);
                    }
                ?>
                // see if sample i7,i5 combination has been used before and if it has batch is not compatible
                // otherwise add combination to list of used sequences
                if ($used_sequences.hasOwnProperty('{{ $key}}')) {

                    $repeated_sequences['{{$key}}'] = 1;
                    $compatible = false;

                } else {

                    $used_sequences['{{ $key }}'] = 1;
                }
            @endforeach
            //set error message if an incompatible batch has been selected
            if (!$compatible) {
                document.getElementById('errors_label').innerHTML = 'Error incompatable batch selected';
            }
        }

        @endforeach

        // check which un selected batches are compatible and remove check boxes from those that are not compatible
        @foreach($batches as $batch)


            $compatible = true;
            // if batch has not been selected
            if ($notselected.indexOf('{{($batch->id)}}') >= 0 && $selected.length > 0) {
                <?php
                // get length of first sample i5 index in unselected batch
                if ($batch->samples[0]->i5_index_id){

                   $i5_length = strlen($batch->samples[0]->i5_index->sequence);
                   $i5_used = true;

               }else{
                   $i5_length = 0;
                   $i5_used = false;
                }
                // get length of i7 index of first sample in unselected batch
                $i7_length = strlen($batch->samples[0]->i7_index->sequence);
                ?>


               // if length of unselected batch i7 and i5 is the same as those already selected
               if ($i7_length_first == '{{ ($i5_length)}}' && $i5_length_first == '{{($i5_length)}}') {
                    //check all the samples if i5 ,i7 combination has already been used
                    @foreach($batch->samples as $sample)
                        <?php
                            // concatenate the i5,i7 index sequence
                            if ($i5_used ){

                                $key = ($sample->i7_index->sequence).' / '.($sample->i5_index->sequence);
                            }else{

                                $key = ($sample->i7_index->sequence);
                            }
                        ?>
                        // if the concatenated sequence is already in used sequences from selected batches the this
                        // batch is not compatible
                        if ($used_sequences.hasOwnProperty('{{($key) }}')) {

                            $compatible = false;
                        }
                    @endforeach

               } else {
                    $compatible = false;
               }

                // if the unselected batch is not compatible remove the checkbox to prevent it from being selected
                if (!$compatible) {
                    $("input:checkbox[id=batch_check_id]").each(function () {
                        if ($(this).val() == '{{($batch->id)}}')
                            this.style.display = 'none';

                    });
                }

            }

        @endforeach


    }
    // make sure script is run if back button is used on browser to return to the page
    $(document).ready(function(e) {
        checkSelectedBatches();
    });




</script>
