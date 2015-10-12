@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Adaptors</h1>
    <div class ="table-container">

    <table class="table table-striped">
        <tr>
            <th>Adaptor</th>
            <th>Default</th>

        </tr>
        @foreach ($adaptors as $adaptor)
            <tr>
                <td>{{($adaptor->value)}}</td>
                <td>
                @if( $adaptor->default== 1)
                    Default
                    @endif
                </td>

            </tr>
        @endforeach
    </table>
    </div>
@endsection

@section('footer')

@endsection
