@extends('app')
@section('content')
@include('partials.navbar')
@include('partials.logo')<br><br>
		<div class = "button">
			<a class="btn btn-default" href="{!! route('batches.create') !!}" role="button">Create batch</a>
		</div>
		<div class = "button">
			<a class="btn btn-default" href="{!! route('batches.index') !!}" role="button">View batches</a>
		</div>
		<div class = "button">	
			<a class="btn btn-default" href="{!! route('samples.create') !!}" role="button">Create samples</a>
		</div>
		<div class = "button">	
			<a class="btn btn-default" href="{!! route('samples.index') !!}" role="button">View samples</a>
		</div>
		<div class = "button">
			<a class="btn btn-default" href="{!! route('runs.create') !!}" role="button">Create run</a>
		</div>
		<div class = "button">
			<a class="btn btn-default" href="{!! route('runs.index') !!}" role="button">View runs</a>
		</div>
		<div class = "button">	
			<a class="btn btn-default" href="{!! route('sampleRuns.create') !!}" role="button">Add batches to run</a>
		</div>

		<h2>Temporary Pages</h2>
		<div class = "button">
			<a class ="btn btn-default" href="./batchesRunsRemaining" role="button">View batches with runs remaining</a>
		</div>
		<div class ="button">
			<a class ="btn btn-default" href="./samplesRunsRemaining" role="button">View samples with runs remaining</a>
		</div>

		@include('errors.list')
	</div> <!-- end of content-->
</div> <!-- end of container -->

@endsection

