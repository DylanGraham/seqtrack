@extends('app')
@section('content')
    @include('partials.navbar')

    <h4>ERRORS found in following batches see systems administrator</h4>
    <p>they may contain mixed sequence length or duplicate I7 and I5 combinations</p>
    <br/>
    <div class="table-container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Batch id</th>
                <th>Batch name</th>
                <th>Number samples</th>
            </tr>
            </thead>

            @foreach($batches as $batch)
                <tr>
                    <td> {{ ($batch->id)}}          </td>
                    <td> {{ ($batch->batch_name) }} </td>
                    <td> {{ count($batch->samples)}}</td>
                </tr>
            @endforeach

        </table>
    </div>

    @include('errors.list')
    @include('partials.batchCompatibilityJS')
@endsection

@section('footer')

@endsection

