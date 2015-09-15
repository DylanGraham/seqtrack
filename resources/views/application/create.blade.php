@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a>



    <br/>
    <h3>Applications</h3>

    <table class="table table-striped">

        <tr>
            <th>Value</th>
            <th>Default</th>

        </tr>

        @foreach ($applications as $app)
            <tr>
                <td>{{($app->application)}}</td>
                <td>{{($app->default)}}</td>

            </tr>
        @endforeach


    </table>
    {!! Form::open(['url'=>'application', 'class'=>'form-inline']) !!}

        <span class="group @if ($errors->has('application')) has-error @endif">
            {!! Form::label('application', 'application', ['class'=>'sr-only']) !!}
            {!! Form::text('application', null, ['data-toggle'=>'tooltip', 'title'=>'Application','class'=>'form-control', 'placeholder'=>'Application']) !!}
        </span>
    {!! Form::label('default', 'default', ['class'=>'sr-only']) !!}
    {!! Form::select('default', $defaults, null, ['class'=>'form-control']) !!}

        {!! Form::submit("Save", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    @include('errors.list')
@endsection

@section('footer')

@endsection