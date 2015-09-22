@extends('app')
@section('content')
@include('partials.navbar')

<<<<<<< HEAD
=======

>>>>>>> 34b7f9344b8c9dc8fc3493c5dc788a4fd98c17e4
<div class = "container-fluid"> 
	<div class = "content">
		@include('partials.logo')<br><br>
        <table class="home-menu-table">
            <tr>
                <td class="row-create"><h4>Create</h4></td>
                <td class="row-view"><h4>View</h4></td>
            </tr>
            <tr>
                <td>
                    <div class = "button">
                    <a class="btn btn-default" href="{!! route('batches.create') !!}" role="button">Create Batch</a>
                    </div>
                </td>
                <td>
                    <div class = "button">
                        <a class="btn btn-default" href="{!! route('batches.index') !!}" role="button">View Batch</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class = "button">  
                        <a class="btn btn-default" href="{!! route('samples.create') !!}" role="button">Create Sample</a>
                    </div>
                </td>
                <td>
                    <div class = "button">  
                        <a class="btn btn-default" href="{!! route('samples.index') !!}" role="button">View Sample</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class = "button">
                        <a class="btn btn-default" href="{!! route('runs.create') !!}" role="button">Create Run</a>
                    </div>
                </td>
                <td>
                    <div class = "button">
                        <a class="btn btn-default" href="{!! route('runs.index') !!}" role="button">View Run</a>
                    </div>
                </td>
            </tr>
        </table>
        <div class = "button">
                <a class="btn btn-default" href="{!! route('import.index') !!}" role="button">Import samples</a>
        </div>
        <div class = "button">  
            <a class="btn btn-default" href="{!! route('sampleRuns.create') !!}" role="button">Add Batches to Run</a>
        </div>
        </div> <!-- end content-->
    <h2>Temporary pages</h2>
<div class = "container-fluid"> 
	<div class = "content">

<<<<<<< HEAD
@include('partials.logo')<br><br>
=======
>>>>>>> 34b7f9344b8c9dc8fc3493c5dc788a4fd98c17e4
		<div class = "button">
			<a class="btn btn-default" href="{!! route('batches.create') !!}" role="button">Create batch</a>
		</div>
		<div class = "button">
			<a class="btn btn-default" href="{!! route('batches.index') !!}" role="button">View batches</a>
		</div>
		<div class = "button">
			<a class="btn btn-default" href="{!! route('import.index') !!}" role="button">Import samples</a>
		</div>
		<div class = "button">	
			<a class="btn btn-default" href="{!! route('samples.create') !!}" role="button">Create samples</a>
		</div>
		<div class = "button">	
			<a class="btn btn-default" href="{!! route('samples.index') !!}" role="button">View samples</a>
		</div>
		<div class = "button">
			<a class="btn btn-default" href="{!! route('runs.index') !!}" role="button">View runs</a>
		</div>
		<div class = "button">	
			<a class="btn btn-default" href="{!! route('sampleRuns.create') !!}" role="button">Add Batches to Run</a>
		</div>

		<h2>Temporary Pages</h2>
		<div class = "button">
			<a class ="btn btn-default" href="./batchesRunsRemaining" role="button">View batches with runs remaining</a>
		</div>
		<div class ="button">
			<a class ="btn btn-default" href="./samplesRunsRemaining" role="button">View samples with runs remaining</a>
		</div>

		@include('errors.list')
        
        <h2>OTHER</h2>
        <a href="./batchesRunsRemaining">View batches with runs remaining</a><br>
        <a href="./samplesRunsRemaining">View samples with runs remaining</a><br>

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
	</div> <!-- end of content-->
</div> <!-- end of container -->

@endsection
