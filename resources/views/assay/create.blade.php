@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Add Assay</h1>
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
    <div class="form-container">

    <span class="group @if ($errors->has('assay')) has-error @endif">
        {!! Form::label('name', 'Assay name') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Assay name']) !!}
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
