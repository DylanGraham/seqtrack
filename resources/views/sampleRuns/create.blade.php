@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a>

    {!! Form::open(['url'=>'sampleRuns/runDetails', 'class'=>'form-inline']) !!}
    <br/>
    <p>Add batches to a run</p>
    <br/>

    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Batch id</th>
            <th>Batch name</th>
            <th>i7 Length</th>
            <th>i5 Length</th>
            <th>Number samples</th>

        </tr>
        </thead>

        @foreach($batches as $batch)
            <?php
                $first_i7_lenghth = strlen($batch->samples[0]->i7_index->sequence);

                if (count($batch->samples[0]->i5_index_id) != NULL) {
                    $first_i5_lenghth = strlen($batch->samples[0]->i5_index->sequence);
                } else $first_i5_lenghth = 0;
            ?>
            <tr>
                <td><input name="batch_check_id[]" id="batch_check_id" type="checkbox" value="{{($batch->id)}}" onchange="checkSelectedBatches()"/></td>
                <td> {{ ($batch->id)}}          </td>
                <td> {{ ($batch->batch_name) }} </td>
                <td> {{ $first_i7_lenghth }}    </td>
                <td> {{ $first_i5_lenghth }}    </td>
                <td> {{ count($batch->samples)}}</td>

            </tr>

        @endforeach

    </table>
    <br>
    {!! Form::label('selected_batches_label', 'none', [ 'id'=>'selected_batches_label'] ) !!}
    <br/>
    {!! Form::label('unselected_batches_label', 'none', [ 'id'=>'unselected_batches_label'] ) !!}
    <br/>
    <span style="color: red">
    {!! Form::label('errors_label', ' ', [ 'id'=>'errors_label'] ) !!}
        </span>
    <br/>

    {!! Form::submit("Next -> Enter run details", ['class'=>'btn btn-primary']) !!}

    <br/>
    <h4>Selected batches sequences</h4>
    {!! Form::label('used_indexes', 'none', [ 'id'=>'used_indexes'] ) !!}
    <br/>
    {!! Form::close() !!}


    @include('errors.list')
    @include('partials.batchCompatibilityJS')
@endsection

@section('footer')

@endsection

