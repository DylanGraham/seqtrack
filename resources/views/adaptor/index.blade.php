@extends('app')
@section('content')
    @include('partials.navbar')

    <br/>
    <h3>Adaptor</h3>
    <div class ="table-container">

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
    </div>
@endsection

@section('footer')

@endsection
