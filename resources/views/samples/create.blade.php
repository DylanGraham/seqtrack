@extends('app')
@section('content')
@include('partials.navbar')

@if (count($user->batches))

    <div class="form-container">
    <h1>Create Samples</h1>

    <h4>Select a batch to add samples to, or
    <a href="{!! route('batches.create') !!}">create a new batch</a></h4>


    {!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}

    @include('partials.batchSelect')
    @include('partials.sample', ['formName'=>'Create Sample', 'submitButtonText'=>'Submit'])

    {!! Form::close() !!}
    </div>

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
