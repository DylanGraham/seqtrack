@extends('app')
@section('content')
    <h1><a href='/'>SeqTrack</a> - Import Samples</h1>
    <hr/>
    @if(Session::has('success'))
        <div class="alert-box success">
            <h2>{!! Session::get('success') !!}</h2>
        </div>
    @endif

    {!! Form::open(['url'=>'import/validateFile', 'files'=>true, 'method'=>'POST', 'class'=>'form-inline', ]) !!}
    {!! Form::label('sampleFile','File',array('id'=>'','class'=>'')) !!}
    {!! Form::file('sampleFile','',array('id'=>'','class'=>'')) !!}
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    @include('errors.list')

    <p class="errors">{!!$errors->first('image')!!}</p>
    @if(Session::has('error'))
        @foreach (Session::get('error') as $error)
            <p class="errors">{!! $error !!}</p>
        @endforeach
    @endif

@endsection