<script>

    var selectedBatches = document.getElementsByName('batch_check_id');
    var setbatches = $('#setbatches');
    var selectBatchesLabel = document.getElementById('selected_batches_label');


    function checkSelectedBatches() {

        var $count = 0;
        var $selected = [];
        var $notselected = [];

        $("input:checkbox[name=batch_check_id]:checked").each(function () {

            $selected.push($(this).val());
            $count++;
            this.style.display = 'block';

        });
        document.getElementById('selected_batches_label').innerHTML = 'batches selected ' + $selected;


        $("input:checkbox[name=batch_check_id]").each(function () {
            if (this.checked == false) {

                $notselected.push($(this).val());
            }

        });
        document.getElementById('unselected_batches_label').innerHTML = 'batches not selected ' + $notselected;


        var $used_sequences = [];
        var $repeated_sequences = [];
        var $compatible;
        var $i5_length;
        var $i5_used;
        var $key;

        @foreach($batches as $batch)


            $compatible = "Compatible";
            var $batch_sequences = [];
            if ($selected.indexOf('{{($batch->id)}}') > -1) {
                @foreach($batch->samples as $sample)

                    @if (count($batch->samples[0]->i5_index_id) != NULL )

                        $i5_length = "{{$sample->i5_index->sequence}}".length;
                        $i5_used = true;
                        $key = '{{($sample->i7_index->sequence)}}/{{($sample->i5_index->sequence)}}';

                    @else

                        $i5_length = 0;
                        $i5_used = false;
                        $key = "{{($sample->i7_index->sequence)}}";

                    @endif

                    if ($used_sequences.prop($key) == -1) {

                        $batch_sequences.push($key);

                    } else {

                        $repeated_sequences.push($key);
                        $compatible = "Not Compatible";

                    }

                @endforeach

                if ($compatible == "Compatible") {

                    Array.prototype.push.apply($used_sequences, $batch_sequences);
                }
            }



        @endforeach


        @foreach($batches as $batch)

            $compatible = "Compatible";

            if ($selected.indexof({{($batch->id)}})  < 0) {
                @foreach($batch->samples as $sample)
                    @if (count($batch->samples[0]->i5_index_id) != NULL )
                        $i5_length = strlen({{$batch->samples[0]->i5_index_id}});
                        $i5_used = true;
                        $key = '{{($sample->i7_index->sequence)}}/{{($sample->i5_index->sequence)}}';
                    @else
                        $i5_length = 0;
                        $i5_used = false;
                        $key = "{{($sample->i7_index->sequence)}}";
                    @endif

                    if ($used_sequences.prop($key) == -1) {
                        var $chks = document.querySelectorAll("input[type='checkbox'][value='{{($batch->id)}}']");
                        document.getElementById('selected_batches_label').innerHTML = 'uncompatible batch found';
                        $compatible = "Not Compatible";
                        $chks.style.display = 'none';

                    }
                @endforeach
            }

        @endforeach

    };

</script>
