@extends('app')
@section('content')
    @include('partials.navbar')
    <a href='/'>@include('partials.logo')</a>



    <br/>
    <h3>Chemistry</h3>
    <div class="table-container">
        <table class="table table-striped">

            <tr>
                <th>Chemistry</th>
                <th>Default</th>

            </tr>

            @foreach ($chemistry as $chem)
                <tr>
                    <td>{{($chem->chemistry)}}</td>
                    <td>{{($chem->default)}}</td>

                </tr>
            @endforeach


        </table>
    </div>
    {!! Form::open(['url'=>'chemistry', 'class'=>'form-inline']) !!}

    <span class="group @if ($errors->has('chemistry')) has-error @endif">
            {!! Form::label('chemistry', 'chemistry', ['class'=>'sr-only']) !!}
        {!! Form::text('chemistry', null, ['data-toggle'=>'tooltip', 'title'=>'Chemistry','class'=>'form-control', 'placeholder'=>'Chemisrty']) !!}
        </span>
    {!! Form::label('default', 'default', ['class'=>'sr-only']) !!}
    {!! Form::select('default', $defaults, null, ['class'=>'form-control']) !!}

    {!! Form::submit("Save", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    @include('errors.list')
@endsection

@section('footer')

@endsection