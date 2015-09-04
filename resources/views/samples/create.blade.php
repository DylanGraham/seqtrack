@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a> 

@if (count($user->batches))

    <br><br>
    Select a batch to add samples to:

    @include('partials.batchSelect')
    
    <hr/>

    {!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}

    @include('partials.sample', ['submitButtonText'=>'Submit'])

    {!! Form::close() !!}

@else

    <br><br>
    Please <a href="{!! route('batches.create') !!}">Create a batch</a> before
    adding samples.

@endif

    @include('errors.list')

@endsection

@section('footer')
    @include('partials.js')
@endsection
