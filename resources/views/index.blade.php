@extends('app')
@section('content')
    @include('partials.logo')<br><br>
    <a href="{!! route('batches.create') !!}">Create batch</a><br>
    <a href="{!! route('batches.index') !!}">View batches</a><br><br>
    <a href="{!! route('samples.create') !!}">Create sample</a><br><br>
    <a href="{!! route('import.index') !!}">Import samples</a><br><br>
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


    <h2>Temporary pages</h2>
    <a href="./batchesRunsRemaining">View batches with runs remaining</a><br>
    <a href="./samplesRunsRemaining">View samples with runs remaining</a><br>


    @include('errors.list')

@endsection

