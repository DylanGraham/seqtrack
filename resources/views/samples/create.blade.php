@extends('app')
@section('content')
    <h1><a href='/'>SeqTrack</a> - Enter samples</h1>
    <hr/>

    {!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}
        <div class="form-group">
        {!! Form::label('basc_group', 'BASC Project', ['class'=>'sr-only']) !!}
        {!! Form::text('basc_group', null, ['class'=>'form-control', 'placeholder'=>'BASC Project']) !!}
        {!! Form::label('name', 'Name', ['class'=>'sr-only']) !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
        {!! Form::label('i7_id', 'i7_id', ['class'=>'sr-only']) !!}
        {!! Form::text('i7_id', null, ['class'=>'form-control', 'placeholder'=>'i7']) !!}
        {!! Form::label('i5_id', 'i5_id', ['class'=>'sr-only']) !!}
        {!! Form::text('i5_id', null, ['class'=>'form-control', 'placeholder'=>'i5']) !!}
        {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif
@endsection
