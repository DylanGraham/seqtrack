<script>


    var selectedBatches = document.getElementsByName('batch_check_id');

    var selectBatchesLabel = document.getElementById('selected_batches_label');


    function checkSelectedBatches() {
//    }
//    function tempdisable(){
        var $count = 0;
        var $selected = [];
        var $notselected = [];

        $("input:checkbox[id=batch_check_id]:checked").each(function () {

            $selected.push($(this).val());
            $count++;


        });
        document.getElementById('selected_batches_label').innerHTML = 'batches selected ' + $selected;


        $("input:checkbox[id=batch_check_id]").each(function () {
            if (this.checked == false) {

                $notselected.push($(this).val());
                this.style.display = 'block';
            }

        });
        document.getElementById('unselected_batches_label').innerHTML = 'batches not selected ' + $notselected;
        document.getElementById('errors_label').innerHTML = ' ';

        var $used_sequences = {'': 1};
        var $repeated_sequences = {'': 1};
        var $compatible;
        var $i7_length;
        var $i5_length;
        var $i7_length_first;
        var $i5_length_first;
        var $used_pairs = '';

        @foreach($batches as $batch)
            if ($selected[0] == '{{($batch->id)}}') {
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

            $i7_length_first = '{{$i7_length}}';
            $i5_length_first = '{{$i5_length}}';

        }
        @endforeach

        @foreach($batches as $batch)

                $compatible = true;
        var $batch_sequences = {'': 1};
        if ($selected.indexOf('{{($batch->id)}}') > -1) {
            <?php
            $i7_length = strlen($batch->samples[0]->i7_index->sequence);
            if (count($batch->samples[0]->i5_index_id) != NULL ){

                $i5_length = strlen($batch->samples[0]->i5_index->sequence);
                $i5_used = true;
            }else{
                $i5_length = 0;
                $i5_used = false;
            }

            ?>
            if ($i5_length_first != '{{($i5_length)}}' || $i7_length_first != '{{($i7_length)}}') {
                $compatible = false;
                document.getElementById('errors_label').innerHTML = 'Error incompatable batch selected';
            }

            @foreach($batch->samples as $sample)

                <?php
                    if ($i5_used){
                        $key = ($sample->i7_index->sequence).' / '.($sample->i5_index->sequence);

                    }else{
                        $key = ($sample->i7_index->sequence);
                    }
                ?>

                    if ($used_sequences.hasOwnProperty('{{ $key}}')) {

                $repeated_sequences['{{$key}}'] = 1;
                $compatible = false;

            } else {

                $batch_sequences['{{ $key }}'] = 1;
            }
            @endforeach


        if ($compatible) {

                for (var attrname in $batch_sequences) {
                    $used_sequences[attrname] = $batch_sequences[attrname];
                    $used_pairs += attrname + '<br>';
                }
            } else {
                document.getElementById('errors_label').innerHTML = 'Error incompatable batch selected';
            }
        }
        document.getElementById('used_indexes').innerHTML = $used_pairs;
        @endforeach


        @foreach($batches as $batch)


            $compatible = true;
        if ($notselected.indexOf('{{($batch->id)}}') >= 0 && $selected.length > 0) {
            <?php
            if (count($batch->samples[0]->i5_index_id) != NULL ){

                   $i5_length = strlen($batch->samples[0]->i5_index->sequence);
                   $i5_used = true;

               }else{
                   $i5_length = 0;
                   $i5_used = false;
            }
            $i7_length = strlen($batch->samples[0]->i7_index->sequence);
            ?>
           if ($i7_length_first == '{{ ($i5_length)}}' && $i5_length_first == '{{($i5_length)}}') {
                @foreach($batch->samples as $sample)
                    <?php
                    if ($i5_used ){

                        $key = ($sample->i7_index->sequence).' / '.($sample->i5_index->sequence);
                    }else{

                        $key = ($sample->i7_index->sequence);
                    }
                    ?>

                    if ($used_sequences.hasOwnProperty('{{($key) }}')) {

                        $compatible = false;
                    }
                @endforeach

            } else {

                $compatible = false;
            }
            if (!$compatible) {
                $("input:checkbox[id=batch_check_id]").each(function () {
                    if ($(this).val() == '{{($batch->id)}}')
                        this.style.display = 'none';

                });
            }

        }

        @endforeach


    }




</script>
