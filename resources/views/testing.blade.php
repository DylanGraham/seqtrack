@inject('IndexSet', 'App\IndexSet')
@extends('app')

@section('content')

<div class="form-group">
<form>
<select id="set">
    <option>Select Index Set</option>
@foreach($IndexSet->sets() as $set)
    <option>{{ $set }}</option>
@endforeach
</select>
<select id="seq">
    <option></option>
</select>
</form>
</div>

@endsection

@section('footer')
<script>
$(function() {
    var set = $('#set');  
    var seq = $('#seq');  
    set.change(function() {
        seq.empty();
@for ($i=0; $i<=$IndexSet->sets()->count(); $i++)
        if (set.prop('selectedIndex') == {{ $i }}) {
            seq.append('<option>{{ $i }}</option>');
        }
@endfor
    })
})

</script>
@endsection
