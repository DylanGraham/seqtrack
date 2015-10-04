@extends('app')
@section('content')
@include('partials.navbar')

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

        </div> <!-- end content-->

		@include('errors.list')
	</div> <!-- end of content-->
</div> <!-- end of container -->

@endsection
