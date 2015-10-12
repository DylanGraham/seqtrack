@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Work flows</h1>
    <div class ="table-container">

    <table class="table table-striped">

        <tr>
            <th>Value</th>
            <th>Default</th>

        </tr>

        @foreach ($workflows as $workflow)
            <tr>
                <td>{{($workflow->value)}}</td>
                <td>
                    @if( $workflow->default== 1)
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
