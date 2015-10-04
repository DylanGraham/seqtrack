@extends('app')
@section('content')
    @include('partials.navbar')

    <br/>
    <br/>
    <h3>Assay</h3>
    <div class="table-container">

        <table class="table table-striped">
            <tr>
                <th>Assay</th>
                <th>Default</th>

            </tr>
            @foreach ($assays as $assay)
                <tr>
                    <td>{{($assay->name)}}</td>
                    <td>
                        @if( $assay->default== 1)
                            Default
                        @endif
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
    {!! Form::open(['url'=>'assay', 'class'=>'form-inline']) !!}

    <span class="group @if ($errors->has('assay')) has-error @endif">
            {!! Form::label('name', 'name', ['class'=>'sr-only']) !!}
        {!! Form::text('name', null, ['data-toggle'=>'tooltip', 'title'=>'Assay','class'=>'form-control', 'placeholder'=>'Assay']) !!}
        </span>
    {!! Form::label('default', 'default', ['class'=>'sr-only']) !!}
    {!! Form::select('default', $defaults, null, ['class'=>'form-control']) !!}

    {!! Form::submit("Save", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    @include('errors.list')
@endsection

@section('footer')

@endsection
