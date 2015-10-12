@extends('app')
@section('content')
    @include('partials.navbar')

    <h1>Assays</h1>
    <div class="table-container">
        <table class="table table-striped">
            <tr>
                <th>Assay</th>
                <th>Default</th>

            </tr>
            @foreach ($assays as $assay)
                <tr>
                    <td>{{($assay->name)}}</td>
                    <td>
                        @if( $assay->default== 1)
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
