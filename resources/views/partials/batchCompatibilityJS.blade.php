<script>

    var selectedBatches = document.getElementsByName('batch_check_id');
    var setbatches = $('#setbatches');
    var selectBatchesLabel = document.getElementById('selected_batches_label');

    function Init() {
        document.getElementById('selected_batches_label').innerHTML = "tttt";

    }

    Init();

    selectedBatches.change(function () {

        document.getElementById('selected_batches_label').innerHTML = 'batches selected';
        alert("Name must be filled out");

    })

    function checkSelectedBatches() {
        $text ="";
        $count=0;
        $("input:checkbox[name=batch_check_id]:checked").each(function(){
            $text = $text + ($(this).val())+' ';
            $count ++;
        });
        document.getElementById('selected_batches_label').innerHTML = 'batches selected'+$text;

        $text ="";
        $("input:checkbox[name=batch_check_id]").each(function(){
            if (this.checked == false)
                $text = $text + ($(this).val())+' ';
        });
        document.getElementById('unselected_batches_label').innerHTML = 'unbatches selected'+$text;


        if ($count >=3)
        {
            $("input:checkbox[name=batch_check_id]").each(function(){
                if (this.checked == false)
                this.style.display = 'none';
            });
        }

        if ($count < 3)
        {
            $("input:checkbox[name=batch_check_id]").each(function(){
                if (this.checked == false)
                    this.style.display = 'block';
            });
        }
    }


</script>
