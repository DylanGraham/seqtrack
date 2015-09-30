@extends('app')
@section('content')
@include('partials.navbar')

@if (count($user->batches))

    <br>
    <h3>Create Samples</h3>

    Select a batch to add samples to:

    {!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}

    @include('partials.batchSelect')
    or <a href="{!! route('batches.create') !!}">create a new batch</a>
    
    <hr/>

    @include('partials.sample', ['formName'=>'Create Sample', 'submitButtonText'=>'Submit'])

    {!! Form::close() !!}

@else

    <br><br>
    Please <a href="{!! route('batches.create') !!}">create a batch</a> before
    adding samples.

@endif

    @include('errors.list')

@endsection

@section('footer')
    @include('partials.js')
@endsection
