@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Chemistry</h1>
    <div class ="table-container">

    <table class="table table-striped">
        <tr>
            <th>Chemistry</th>
            <th>Default</th>

        </tr>
        @foreach ($chemistry as $chem)
            <tr>
                <td>{{($chem->chemistry)}}</td>
                <td>
                    @if( $chem->default== 1)
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
