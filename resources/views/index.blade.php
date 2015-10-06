@extends('app')
@section('content')
    @include('partials.navbar')

    <div class="container-fluid">
        <div class="content">
            @include('partials.logo')<br><br>

            <div class="row home-btn">

                <br/>
                <br/>
                <br/>

                <p>
                    <a class="btn btn-default" href="{!! route('batches.index') !!}" role="button">View Batch</a>
                    <a class="btn btn-default" href="{!! route('batches.create') !!}" role="button">Create Batch</a>

                </p>
                <p>
                    <a class="btn btn-default" href="{!! route('samples.index') !!}" role="button">View Sample</a>
                    <a class="btn btn-default" href="{!! route('runs.index') !!}" role="button">View Run</a>


                </p>
                <p>
                    <a class="btn btn-default" href="{!! route('samples.create') !!}" role="button">Create Sample</a>
                    <a class="btn btn-default" href="{!! route('import.index') !!}" role="button">Import samples</a>




                </p>
                @if ($currentUserSuper)
                <p>
                    <a class="btn btn-default" href="{!! route('sampleRuns.create') !!}" role="button">Add Batches to Run</a>
                </p>
                @endif
            </div>

        </div>
        <!-- end content-->

        @include('errors.list')
    </div> <!-- end of content-->
    </div> <!-- end of container -->

@endsection
