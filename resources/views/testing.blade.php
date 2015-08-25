@inject('IndexSet', 'App\IndexSet')
@extends('app')

@section('content')

<div class="form-group">

<form>
<select name="dep">

    <option>Select Index Set</option>
@foreach($IndexSet->sets() as $set)
    <option>{{ $set }}</option>
@endforeach

</select>
    <select name="cname">
        <option></option>
    </select>
</form>

</div>


@endsection

@section('footer')
<script>
$(document).ready(function() {
    $department = $("select[name='dep']");
    $cname = $("select[name='cname']");
     
    $department.change(function() {

@for ($i=0; $i<$IndexSet->sets()->count(); $i++)
         
        if ($(this).selectedIndex == {{ $i }}) {
            $("select[name='cname'] option").remove();
            $("<option>{{ $i }}</option>").appendTo($cname);
        }

@endfor

    });
});

</script>
@endsection
