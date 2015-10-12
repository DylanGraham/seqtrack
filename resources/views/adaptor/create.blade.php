@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Add Adaptor</h1>
    <div class="table-container">
    <table class="table table-striped">

        <tr>
            <th>Value</th>
            <th>Default</th>

        </tr>

        @foreach ($adaptors as $adaptor)
            <tr>
                <td>{{($adaptor->value)}}</td>
                <td>
                    @if( $adaptor->default== 1)
                        Default
                    @endif
                </td>

            </tr>
        @endforeach


    </table>
    </div>

    {!! Form::open(['url'=>'adaptor', 'class'=>'form-inline']) !!}

    <div class="form-container">
        <div class="group @if ($errors->has('adaptor')) has-error @endif">
            {!! Form::label('value', 'Adaptor name') !!}
            {!! Form::text('value', null, ['class'=>'form-control', 'placeholder'=>'Adaptor name']) !!}
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
