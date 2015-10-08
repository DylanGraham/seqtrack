@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Add Chemistry</h1>
    <div class="table-container">
        <table class="table table-striped">

            <tr>
                <th>Chemistry</th>
                <th>Default</th>

            </tr>

            @foreach ($chemistry as $chem)
                <tr>
                    <td>{{($chem->chemistry)}}</td>
                    <td>
                        @if( $chem->default== 1)
                            Default
                        @endif
                    </td>

                </tr>
            @endforeach


        </table>
    </div>
    {!! Form::open(['url'=>'chemistry', 'class'=>'form-inline']) !!}
    <div class="form-container">

    <span class="group @if ($errors->has('chemistry')) has-error @endif">
            {!! Form::label('chemistry', 'Chemistry name') !!}
        {!! Form::text('chemistry', null, ['data-toggle'=>'tooltip', 'title'=>'Chemistry','class'=>'form-control', 'placeholder'=>'Chemisrty name']) !!}
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
