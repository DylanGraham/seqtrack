@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a>



    <br/>
    <h3>Chemistry</h3>

    <table class="table table-striped">
        <tr>
            <th>Adaptor</th>
            <th>Default</th>

        </tr>
        @foreach ($adaptors as $adaptor)
            <tr>
                <td>{{($adaptor->value)}}</td>
                <td>{{($adaptor->default)}}</td>

            </tr>
        @endforeach
    </table>

@endsection

@section('footer')

@endsection