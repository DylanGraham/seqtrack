@extends('app')
@section('content')
    @include('partials.navbar')

    <br/>
    <h3>Adaptors</h3>
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

        <span class="group @if ($errors->has('adaptor')) has-error @endif">
            {!! Form::label('value', 'value', ['class'=>'sr-only']) !!}
            {!! Form::text('value', null, ['data-toggle'=>'tooltip', 'title'=>'Adaptor','class'=>'form-control', 'placeholder'=>'Adaptor']) !!}
        </span>
    {!! Form::label('default', 'default', ['class'=>'sr-only']) !!}
    {!! Form::select('default', $defaults, null, ['class'=>'form-control']) !!}

        {!! Form::submit("Save", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    @include('errors.list')
@endsection

@section('footer')

@endsection
