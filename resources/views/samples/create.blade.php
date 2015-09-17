@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a> 

@if (count($user->batches))

    <br><br>
    Select a batch to add samples to:

    {!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}

    @include('partials.batchSelect')
    or <a href="{!! route('batches.create') !!}">create a new batch</a>
    
    <hr/>

    @include('partials.sample', ['submitButtonText'=>'Submit'])

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
