@extends('app')
@section('content')
@include('partials.navbar')
<div class="heading-container">
    <h1>Create Sample</h1>
</div>
@if (count($user->batches))
    <div class="form-container">
        <h3>Select a batch to add samples to:</h3>
        <div class="col-md-8">{!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}</div>
        @include('partials.batchSelect')
        <p>or</p>
        <h3><a href="{!! route('batches.create') !!}">Create A New Batch</a></h3>
        <br/>
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
