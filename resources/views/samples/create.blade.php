@extends('app')
@section('content')
    <h1><a href='/'>SeqTrack</a> - Enter samples</h1>
    <hr/>

    {!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}

    @include('partials.form', ['submitButtonText'=>'Submit'])

    {!! Form::close() !!}

    @include('errors.list')

@endsection

{{-- dd($i7All->find(5)->I7Indexes->count()) --}}
{{-- dd($i7) --}}

@section('footer')
<script>
$(function() {
    var setID = $('#index_set'); 
    var i7ID = $('#i7_index_id'); 
    var i5ID = $('#i5_index_id'); 

    setID.change(function() {
        i7ID.empty();
        i5ID.empty();
@for ($i=0; $i<=$i7Set->count(); $i++)
        if (setID.prop('selectedIndex') == {{ $i }}) {
  @for ($j=1; $j<= $i7All->find($j)->I7Indexes->count(); $j++)
            i7ID.append('<option>{{ $i7All->find(7)->I7Indexes[$j] }}</option>');
  @endfor
        }
@endfor
    })
})

</script>
@endsection
