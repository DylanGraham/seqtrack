<script>
$(function() {
    var setID = $('#index_set');
    var i7ID = $('#i7_index_id');
    var i5ID = $('#i5_index_id');

    function i7Init() {
        i5ID.hide();
        i7ID.empty();
        @if ( Form::oldInputIsEmpty())

            @foreach ($iAll->find(1)->I7Indexes as $x)
                i7ID.append("<option value={{ $x['id'] }}>{{ $x['index'] }} {{ $x['sequence'] }}</option>");
            @endforeach
        @else
            @foreach ($iAll->find(old('index_set'))->I7Indexes as $x)
                 i7ID.append("<option @if (old('i7_index_id')==$x['id'])' selected ' @endif value={{ $x['id'] }}>{{ $x['index'] }} {{ $x['sequence'] }}</option>");
            @endforeach

            @if (count($iAll->find(old('index_set'))->I5Indexes) > 0)
                i5ID.show();

                @foreach ($iAll->find(old('index_set'))->I5Indexes as $x)
                     i5ID.append("<option @if (old('i5_index_id')==$x['id'])' selected ' @endif value={{ $x['id'] }}>{{ $x['index'] }} {{ $x['sequence'] }}</option>");
                @endforeach
            @endif
        @endif
    }

    i7Init();

    setID.change(function() {
        i7ID.empty();

        @for ($i=1; $i<=$iSet->count(); $i++)
            if (setID.prop('selectedIndex') == {{ $i-1 }}) {
                @foreach ($iAll->find($i)->I7Indexes as $x)
                    i7ID.append("<option  value={{ $x['id'] }}> {{ $x['index'] }} {{ $x['sequence'] }} </option>");
                @endforeach

                @if (count($iAll->find($i)->i5Indexes))
                    i5ID.empty();
                    i5ID.show();
                    @foreach ($iAll->find($i)->I5Indexes as $y)
                        i5ID.append("<option  value={{ $y['id'] }}> {{ $y['index'] }} {{ $y['sequence'] }} </option>");
                    @endforeach
                @else
                    i5ID.hide();
                @endif
            }
        @endfor
    })
})
</script>
