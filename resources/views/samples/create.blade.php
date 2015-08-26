@extends('app')
@section('content')
    <h1><a href='/'>SeqTrack</a> - Enter samples</h1>
    <hr/>

    {!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}

    @include('partials.form', ['submitButtonText'=>'Submit'])

    {!! Form::close() !!}

    @include('errors.list')

@endsection

@section('footer')
<script>
$(function() {
    var set = $('#index_set'); 
    var i7 = $('#i7_index_id'); 
    var i5 = $('#i5_index_id'); 

    set.change(function() {
        i7.empty();
        i5.empty();
@for ($i=0; $i<=$i7Set->count(); $i++)
        if (set.prop('selectedIndex') == {{ $i }}) {
            i7.append('<option>{{ $i }}</option>');
        }
@endfor
    })
})

</script>
@endsection
