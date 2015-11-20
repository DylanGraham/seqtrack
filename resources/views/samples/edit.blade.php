@extends('app')
@section('content')
@include('partials.navbar')
<div class="form-container">
    <h1>Edit Sample: {{ $sample->sample_id }}-{{ $sample->sample_id_suffix }}</h1>

    {!! Form::model($sample, ['method'=>'PATCH', 'action'=>['SamplesController@update', $sample->id], 'class'=>'form-inline']) !!}

    @include('partials.sample', ['formName'=>'Edit Sample', 'submitButtonText'=>'Update'])

    {!! Form::close() !!}

</div>
   @include('errors.list') 

@endsection

@section('footer')

@endsection

@stop
