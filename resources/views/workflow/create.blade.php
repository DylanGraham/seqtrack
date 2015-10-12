@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Add Work flow</h1>
    <div class ="table-container">

    <table class="table table-striped">

        <tr>
            <th>Value</th>
            <th>Default</th>

        </tr>

        @foreach ($workflows as $workflow)
            <tr>
                <td>{{($workflow->value)}}</td>
                <td>
                    @if( $workflow->default== 1)
                        Default
                    @endif
                </td>

            </tr>
        @endforeach


    </table>
        </div>
    {!! Form::open(['url'=>'workflow', 'class'=>'form-inline']) !!}

    <div class="form-container">
        <span class="group @if ($errors->has('adaptor')) has-error @endif">
            {!! Form::label('value', 'Work flow name') !!}
            {!! Form::text('value', null, ['class'=>'form-control', 'placeholder'=>'Work flow name']) !!}
        </span>
    {!! Form::label('default', 'Default') !!}
    {!! Form::select('default', $defaults, null, ['class'=>'form-control']) !!}

        {!! Form::submit("Save", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
    @include('errors.list')
@endsection

@section('footer')

@endsection
