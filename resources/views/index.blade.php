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
                        <a class="btn btn-default" href="{!! route('sampleRuns.create') !!}" role="button">Add Batches to Run</a>
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
<<<<<<< HEAD
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
=======

        </div>
>>>>>>> 5c6331f87018b7594f921cc843f6c42aafcca61b

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
