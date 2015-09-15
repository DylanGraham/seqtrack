@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a>
    @if(Session::has('success'))
        <div class="alert-box success">
            <h2>{!! Session::get('success') !!}</h2>
        </div>
    @endif

    {!! Form::open(['url'=>'import/validateFile', 'files'=>true, 'method'=>'POST', 'class'=>'form-inline', ]) !!}
    {!! Form::label('sampleFile','File',array('id'=>'','class'=>'')) !!}
    {!! Form::file('sampleFile','',array('id'=>'','class'=>'')) !!}
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    @include('errors.list')

    <p class="errors">{!!$errors->first('image')!!}</p>
    @if(Session::has('error'))
        <ul class="alert alert-danger">
        @foreach (Session::get('error') as $error)
                <li>{!! $error !!}</li>
        @endforeach
        </ul>
    @endif

@endsection