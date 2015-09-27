@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a>



    <br/>
    <h3>Instruments</h3>
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

        <span class="group @if ($errors->has('instrument')) has-error @endif">
            {!! Form::label('name', 'name', ['class'=>'sr-only']) !!}
            {!! Form::text('name', null, ['data-toggle'=>'tooltip', 'title'=>'Instrument name','class'=>'form-control', 'placeholder'=>'Instrument name']) !!}
        </span>

        {!! Form::submit("Save", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    @include('errors.list')
@endsection

@section('footer')

@endsection