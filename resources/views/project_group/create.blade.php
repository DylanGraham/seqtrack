@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Add Project Group</h1>
    <div class ="table-container">

    <table class="table table-striped">
        <tr>
            <th>Project Group</th>


        </tr>
        @foreach ($project_groups as $project)
            <tr>
                <td>{{($project->name)}}</td>


            </tr>
        @endforeach
    </table>
        </div>
    {!! Form::open(['url'=>'project_groups', 'class'=>'form-inline']) !!}
    <div class="form-container">

        <span class="group @if ($errors->has('chemistry')) has-error @endif">
            {!! Form::label('name', 'name', ['class'=>'sr-only']) !!}
            {!! Form::text('name', null, ['data-toggle'=>'tooltip', 'title'=>'Project name','class'=>'form-control', 'placeholder'=>'Project group name']) !!}
        </span>

        {!! Form::submit("Save", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
    @include('errors.list')
@endsection

@section('footer')

@endsection
