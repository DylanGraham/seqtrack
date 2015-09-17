@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a>
<br/><br/>
    <h4>List of batches with samples that have runs remaining</h4>
<br/>
    <table class="table table-striped">
    <thead>
    <tr>
        <th>Batch id</th>
        <th>Batch name</th>
        <th>Number of samples with Runs Remaining</th>
        <th>Max Runs Remaining for a sample</th>
        <th>User Name</th>
    </tr>
    </thead>


    @foreach($batches as $batch)
            <?php
            $count =0;
            $max=0;
            ?>

        @foreach($batch->samples as $sample)

           @if ($sample->runs_remaining >0)
                <?php
                  $count++;
               ?>
           @endif
           @if ($sample->runs_remaining >$max)
                <?php
                   $max = $sample->runs_remaining;
                ?>
           @endif
        @endforeach
        <tr>
            <td> {{ ($batch->id)}}    </td>
            <td> {{ ($batch->batch_name)}}    </td>
            <td> {{ ($count)}}    </td>
            <td> {{ ($max) }}    </td>
            <td> {{ ($batch->user->name) }}    </td>
        </tr>

    @endforeach

</table>
    @include('errors.list')

@endsection

@section('footer')

@endsection
