@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a>



    <br/>
    <h3>Instruments</h3>

    <table class="table table-striped">
        <tr>
            <th>Instruments</th>
        </tr>
        @foreach ($instruments as $instrument)
            <tr>
                <td>{{($instrument->name)}}</td>
            </tr>
        @endforeach
    </table>

@endsection

@section('footer')

@endsection