@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a> 
    <h4>Batches</h4>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Batch name</th>
            <th>User ID</th>
            <th>Charge code</th>
            <th>...</th>
        </tr>
    </thead>
    @foreach ($batches as $b)
    <tr>
        <td><a href="/batches/{{ $b->id }}/edit">{{ $b->batch }}</a></td>
        <td>{{ $b->user_id}}</td>
        <td>{{ $b->charge_code}}</td>
    </tr>
    @endforeach
    </table>
@endsection
