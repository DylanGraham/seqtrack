<script>
$(function() {
    var setID = $('#index_set');
    var i7ID = $('#i7_index_id');
    var i5ID = $('#i5_index_id');

    function i7Init() {
        i5ID.hide();
        i7ID.empty();
        @foreach ($i7All->find(1)->I7Indexes as $x)
            i7ID.append("<option>{{ $x['sequence'] }}</option>");
        @endforeach
    }

    i7Init();

    setID.change(function() {
        i7ID.empty();

        @for ($i=1; $i<=$i7Set->count(); $i++)
            if (setID.prop('selectedIndex') == {{ $i-1 }}) {
                @foreach ($i7All->find($i)->I7Indexes as $x)
                    i7ID.append("<option>{{ $x['sequence'] }}</option>");
                @endforeach

                @if (count($i5All->find($i)))
                    i5ID.empty();
                    i5ID.show();
                    @foreach ($i5All->find($i)->I5Indexes as $y)
                        i5ID.append("<option>{{ $y['sequence'] }}</option>");
                    @endforeach
                @else
                    i5ID.hide();
                @endif
            }
        @endfor
    })
})
</script>
