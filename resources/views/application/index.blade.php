@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Applications</h1>
    <div class ="table-container">

    <table class="table table-striped">

        <tr>
            <th>Value</th>
            <th>Default</th>

        </tr>

        @foreach ($applications as $app)
            <tr>
                <td>{{($app->application)}}</td>
                <td>
                    @if( $app->default== 1)
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
