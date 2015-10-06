@extends('app')
@section('content')
@include('partials.navbar')
<div class="form-container">
    <h1>Edit Batch: {{ $batch->batch_name }}</h1>

    {!! Form::model($batch, ['method'=>'PATCH', 'action'=>['BatchesController@update', $batch->id], 'class'=>'form-inline']) !!}

    @include('partials.batch', ['formName'=>'Edit Batch', 'submitButtonText'=>'Update'])

    {!! Form::close() !!}
</div>
    @include('errors.list')

@endsection

@section('footer')
@endsection
