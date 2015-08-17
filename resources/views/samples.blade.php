@extends('app')
@section('content')
    <h1><a href='/'>SeqTrack</a> - Samples</h1>
    <hr/>    
    <table class="table table-striped">
    <thead>
        <tr>
            <th>BASC Project</th>
            <th>Sample name</th>
            <th>i7 index</th>
            <th>i5 index</th>
        </tr>
    </thead>
    @foreach ($samples as $s)
    <tr>
        <td>{{ $s->basc_group_id }}</td>
        <td>{{ $s->name }}</td>
        <td>{{ $s->i7_index_id }}</td>
        <td>{{ $s->i5_index_id }}</td>
    </tr> 
    @endforeach
    </table>
@endsection
