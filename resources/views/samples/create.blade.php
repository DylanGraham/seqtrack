@extends('app')
@section('content')
@include('partials.navbar')

@if (count($user->batches))
    <div class="box-container">
        <h4>Select a batch to add samples to:<h4>
        <div class="col-md-8">{!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}</div>
        @include('partials.batchSelect')
        <p>or</p> 
        <a href="{!! route('batches.create') !!}">Create A New Batch</a>
    </div>
    

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
