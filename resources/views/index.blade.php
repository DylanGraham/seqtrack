@extends('app')
@section('content')
<<<<<<< HEAD
=======
    @include('partials.logo')<br><br>
    <a href="{!! route('batches.create') !!}">Create batch</a><br>
    <a href="{!! route('batches.index') !!}">View batches</a><br><br>
    <a href="{!! route('samples.create') !!}">Create sample</a><br>
    <a href="{!! route('samples.index') !!}">View samples</a><br><br>

    <a href="{!! route('runs.index') !!}">View runs</a><br>
    <a href="{!! route('sampleRuns.create') !!}">Add Batches to run</a><br>
    <br>
    <h2>Drop down lists pages</h2>
    <a href="{!! route('chemistry.create') !!}">Add Chemistry to list</a><br>
    <a href="{!! route('chemistry.index') !!}">View list of Chemistry</a><br>
    <br>
    <a href="{!! route('project_groups.create') !!}">Add Project group name to list</a><br>
    <a href="{!! route('project_groups.index') !!}">View list of Project groups</a><br>
    <br>
    <a href="{!! route('adaptor.create') !!}">Add Adaptor to list</a><br>
    <a href="{!! route('adaptor.index') !!}">View list of Adaptors</a><br>
    <br>
    <a href="{!! route('assay.create') !!}">Add Assay to list</a><br>
    <a href="{!! route('assay.index') !!}">View list of Assays</a><br>
    <br>


    <a href="{!! route('workflow.create') !!}">Add Work flow to list</a><br>
    <a href="{!! route('workflow.index') !!}">View list of Work flows</a><br>
    <br>
    <a href="{!! route('instrument.create') !!}">Add Instrument to list</a><br>
    <a href="{!! route('instrument.index') !!}">View list of Instruments</a><br>
    <br>
    <a href="{!! route('application.create') !!}">Add Application to list</a><br>
    <a href="{!! route('application.index') !!}">View list of Applications</a><br>
    <br>
>>>>>>> 2789552b8a8a50c5946c9e9923efac3d4f34d240

@include('partials.navbar')

<<<<<<< HEAD
<div class = "container-fluid"> 
	<div class = "content">
		@include('partials.logo')<br><br>
=======
    <h2>Temporary pages</h2>
    <a href="./batchesRunsRemaining">View batches with runs remaining</a><br>
    <a href="./samplesRunsRemaining">View samples with runs remaining</a><br>
>>>>>>> 2789552b8a8a50c5946c9e9923efac3d4f34d240

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

