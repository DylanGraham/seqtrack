@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Add Instrument</h1>
    <div class ="table-container">

    <table class="table table-striped">
        <tr>
            <th>Instruments</th>
        </tr>
        @foreach ($instruments as $instrument)
            <tr>
                <td>{{($instrument->name)}}</td>
            </tr>
        @endforeach
    </table>
        </div>
    {!! Form::open(['url'=>'instrument', 'class'=>'form-inline']) !!}
    <div class="form-container">

        <span class="group @if ($errors->has('instrument')) has-error @endif">
            {!! Form::label('name', 'Instrument name') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Instrument name']) !!}
        </span>

        {!! Form::submit("Save", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
    @include('errors.list')
@endsection

@section('footer')

@endsection
