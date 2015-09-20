@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a> 

<<<<<<< HEAD

=======
>>>>>>> 3dc6631a07f03f7d8c5114fe4ec16a8fbb38bb64
    <h1> {{ $batch->batch_name }}</h1>

    {!! Form::model($batch, ['method'=>'PATCH', 'action'=>['BatchesController@update', $batch->id], 'class'=>'form-inline']) !!}

    @include('partials.batch', ['formName'=>'Edit Batch', 'submitButtonText'=>'Update'])

    {!! Form::close() !!}

    @include('errors.list')

@endsection

@section('footer')
@endsection
