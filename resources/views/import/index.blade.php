@extends('app')
@section('content')
@include('partials.navbar')
    @if(Session::has('success'))
        <div class="alert-box success">
            <h2>{!! Session::get('success') !!}</h2>
        </div>
    @endif

    @if (count($user->batches))

        <h3>Import Samples</h3>

        <p>Select a batch to add samples to:</p>

        {!! Form::open(['url'=>'import/validateFile', 'files'=>true, 'method'=>'POST', 'class'=>'form-inline', ]) !!}

        @include('partials.batchSelect')
        <span>or</span> <a href="{!! route('batches.create') !!}">create a new batch</a>

        <hr/>
        <div class="form-group">
            <span class="group @if ($errors->has('plate')) has-error @endif">
            {!! Form::label('plate', 'plate', ['class'=>'sr-only']) !!}
                {!! Form::text('plate', null, ['data-toggle'=>'tooltip', 'title'=>'Plate','class'=>'form-control', 'placeholder'=>'Plate']) !!}
            </span>
            <span class="group @if ($errors->has('well')) has-error @endif">
            {!! Form::label('well', 'well', ['class'=>'sr-only']) !!}
                {!! Form::text('well', null, ['data-toggle'=>'tooltip', 'title'=>'Well','class'=>'form-control', 'placeholder'=>'Well']) !!}
            </span>
            <span class="group @if ($errors->has('description')) has-error @endif">
            {!! Form::label('description', 'description', ['class'=>'sr-only']) !!}
                {!! Form::text('description', null, ['data-toggle'=>'tooltip', 'title'=>'Description','class'=>'form-control', 'placeholder'=>'Description']) !!}
            </span>
            <span class="group @if ($errors->has('runs_remaining')) has-error @endif">
            {!! Form::label('runs_remaining', 'Runs_remaining', ['class'=>'sr-only']) !!}
                {!! Form::number('runs_remaining', null, ['data-toggle'=>'tooltip', 'title'=>'Runs','class'=>'form-control', 'placeholder'=>'Runs']) !!}
            </span>
            <br><br>
            <span class="group @if ($errors->has('sampleFile')) has-error @endif">
            {!! Form::label('file', 'file', ['class'=>'sr-only']) !!}
                {!! Form::file('sampleFile', null, ['data-toggle'=>'tooltip', 'title'=>'Upload the file','class'=>'form-control', 'placeholder'=>'Upload the file']) !!}
            </span>
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>
            {!! Form::close() !!}
        
    @else

        <br><br>
        Please <a href="{!! route('batches.create') !!}">create a batch</a> before
        adding samples.

    @endif
            <br/>
    @include('errors.list')

    @if(Session::has('error'))
        <ul class="alert alert-danger">
            @foreach (Session::get('error') as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
@endsection
