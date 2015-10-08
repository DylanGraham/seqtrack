@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Add Application</h1>
    <div class="table-container">
    <table class="table table-striped">

        <tr>
            <th>Value</th>
            <th>Default</th>

        </tr>

        @foreach ($applications as $app)
            <tr>
                <td>{{($app->application)}}</td>
                <td>
                    @if( $app->default== 1)
                        Default
                    @endif
                </td>

            </tr>
        @endforeach


    </table>
    </div>
    {!! Form::open(['url'=>'application', 'class'=>'form-inline']) !!}
    <div class="form-container">
        <div class="group @if ($errors->has('application')) has-error @endif">
            {!! Form::label('application', 'Application') !!}
            {!! Form::text('application', null, ['class'=>'form-control', 'placeholder'=>'Application']) !!}
        </div>
    {!! Form::label('default', 'Default') !!}
    {!! Form::select('default', $defaults, null, ['class'=>'form-control']) !!}

        {!! Form::submit("Save", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    </div>
    @include('errors.list')
@endsection

@section('footer')

@endsection
