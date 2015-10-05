@extends('app')
@section('content')
@include('partials.navbar')
    @if(Session::has('success'))
        <div class="alert-box success">
            <h2>{!! Session::get('success') !!}</h2>
        </div>
    @endif

    @if (count($user->batches))
    <div class="form-container">
    <h1>Import Samples</h1>

    <h4>Select a batch to add samples to, or
    <a href="{!! route('batches.create') !!}">create a new batch</a></h4>

        {!! Form::open(['url'=>'import/validateFile', 'files'=>true, 'method'=>'POST', 'class'=>'form-inline', ]) !!}

        @include('partials.batchSelectImport')

            <div class="group @if ($errors->has('plate')) has-error @endif">
            <div class="col-md-3">
            {!! Form::label('plate', 'Plate') !!}
            </div>
            <div class="col-md-9">
            {!! Form::text('plate', null, ['class'=>'form-control', 'placeholder'=>'Plate']) !!}
            </div>
            </div>
            <div class="group @if ($errors->has('well')) has-error @endif">
            <div class="col-md-3">
            {!! Form::label('well', 'Well') !!}
            </div>
            <div class="col-md-9">
            {!! Form::text('well', null, ['class'=>'form-control', 'placeholder'=>'Well']) !!}
            </div>
            </div>
            <div class="group @if ($errors->has('description')) has-error @endif">
            <div class="col-md-3">
            {!! Form::label('description', 'Description') !!}
            </div>
            <div class="col-md-9">
            {!! Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Description']) !!}
            </div>
            </div>
            <div class="group @if ($errors->has('runs_remaining')) has-error @endif">
            <div class="col-md-3">
            {!! Form::label('runs_remaining', 'Runs remaining') !!}
            </div>
            <div class="col-md-9">
            {!! Form::number('runs_remaining', null, ['class'=>'form-control', 'placeholder'=>'Runs']) !!}
            </div>
            </div>
            <div class="group @if ($errors->has('sampleFile')) has-error @endif">
            <div class="col-md-3">
            {!! Form::label('file', 'File') !!}
            </div>
            <div class="col-md-9">
                {!! Form::file('sampleFile', null, ['class'=>'form-control', 'placeholder'=>'Upload the file']) !!}
            </div>
            </div>
            <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>
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
