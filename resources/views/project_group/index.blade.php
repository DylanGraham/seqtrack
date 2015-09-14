@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a>



    <br/>
    <h3>Project Group</h3>

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

@endsection

@section('footer')

@endsection