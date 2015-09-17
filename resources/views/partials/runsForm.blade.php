<div class="form-group">
    <h4>Create run</h4>
    <span class="group @if ($errors->has('experiment_name')) has-error @endif">
       {!! Form::label('experiment_name', 'Experiment Name', ['class'=>'sr-only']) !!}
       {!! Form::text('experiment_name', null, ['data-toggle'=>'tooltip', 'title'=>'Experiment Name', 'class'=>'form-control', 'placeholder'=>'Experiment Name']) !!}
    </span>

    <span class="group @if ($errors->has('description')) has-error @endif">
       {!! Form::label('description', 'Description', ['class'=>'sr-only']) !!}
       {!! Form::text('description', null, ['data-toggle'=>'tooltip', 'title'=>'Description', 'class'=>'form-control', 'placeholder'=>'Description']) !!}
    </span>

    <span class="group @if ($errors->has('read1')) has-error @endif">
        {!! Form::label('read1', 'Read 1', ['class'=>'sr-only']) !!}
        {!! Form::number('read1', null, ['data-toggle'=>'tooltip', 'title'=>'Read 1','class'=>'number-field', 'placeholder'=>'Read 1']) !!}
    </span>

    <span class="group @if ($errors->has('read2')) has-error @endif">
        {!! Form::label('read2', 'Read 2', ['class'=>'sr-only']) !!}
        {!! Form::number('read2', null, ['data-toggle'=>'tooltip', 'title'=>'Read 2','class'=>'number-field', 'placeholder'=>'Read 2']) !!}
    </span>
    <span class="group @if ($errors->has('flow_cell')) has-error @endif">
        {!! Form::label('flow_cell', 'Flow cell', ['class'=>'sr-only']) !!}
        {!! Form::text('flow_cell', null, ['data-toggle'=>'tooltip','title'=>'Flow cell','class'=>'form-control', 'placeholder'=>'Flow cell']) !!}
    </span>
    <span class="group @if ($errors->has('adaptor_id')) has-error @endif">
        {!! Form::label('adaptor_id', 'Adaptor', ['data-toggle'=>'tooltip', 'title'=>'Adaptor', 'class'=>'sr-only']) !!}
        {!! Form::select('adaptor_id', $adaptor, $default_adaptor_id, ['data-toggle'=>'tooltip','title'=>'Adaptor','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('work_flow_id')) has-error @endif">
        {!! Form::label('work_flow_id', 'Work Flow', ['data-toggle'=>'tooltip', 'title'=>'Work Flow', 'class'=>'sr-only']) !!}
        {!! Form::select('work_flow_id', $work_flow, $default_work_flow_id, ['data-toggle'=>'tooltip','title'=>'Work Flow','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('iem_file_version_id')) has-error @endif">
        {!! Form::label('iem_file_version_id', 'IEM file version', ['data-toggle'=>'tooltip', 'title'=>'IEM file version', 'class'=>'sr-only']) !!}
        {!! Form::select('iem_file_version_id', $iem_file_version, $default_iem_file_version_id, ['data-toggle'=>'tooltip','title'=>'IEM file version','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('application_id')) has-error @endif">
        {!! Form::label('application_id', 'Application', ['data-toggle'=>'tooltip', 'title'=>'Application', 'class'=>'sr-only']) !!}
        {!! Form::select('application_id', $application, $default_application_id, ['data-toggle'=>'tooltip','title'=>'Application','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('chemistry_id')) has-error @endif">
        {!! Form::label('chemistry_id', 'Chemistry', ['data-toggle'=>'tooltip', 'title'=>'Chemistry', 'class'=>'sr-only']) !!}
        {!! Form::select('chemistry_id', $chemistry, $default_chemistry_id, ['data-toggle'=>'tooltip','title'=>'Chemistry','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('run_status_id')) has-error @endif">
        {!! Form::label('run_status_id', 'Run Status', ['data-toggle'=>'tooltip', 'title'=>'Run Status', 'class'=>'sr-only']) !!}
        {!! Form::select('run_status_id', $run_status, $default_run_status_id, ['data-toggle'=>'tooltip','title'=>'Run Status','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('instrument_id')) has-error @endif">
        {!! Form::label('instrument_id', 'Instrument', ['data-toggle'=>'tooltip', 'title'=>'Instrument', 'class'=>'sr-only']) !!}
        {!! Form::select('instrument_id', $instrument, null, ['data-toggle'=>'tooltip','title'=>'Instrument','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('assay_id')) has-error @endif">
        {!! Form::label('assay_id', 'Assay', ['data-toggle'=>'tooltip', 'title'=>'Assay', 'class'=>'sr-only']) !!}
        {!! Form::select('assay_id', $assay, $default_assay_id, ['data-toggle'=>'tooltip','title'=>'Assay','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('project_group_id')) has-error @endif">
        {!! Form::label('project_group_id', 'Project Group', ['data-toggle'=>'tooltip', 'title'=>'Project Group', 'class'=>'sr-only']) !!}
        {!! Form::select('project_group_id', $projectGroup, $default_project_id, ['data-toggle'=>'tooltip','title'=>'Project Group','class'=>'form-control']) !!}
    </span>

    <span class="group @if ($errors->has('run_date')) has-error @endif">
        {!! Form::label('run_date', 'Date', ['data-toggle'=>'tooltip', 'title'=>'Date', 'class'=>'sr-only']) !!}
        {!! Form::select('run_date', $run_date, null, ['data-toggle'=>'tooltip','title'=>'Date','class'=>'form-control']) !!}
    </span>

        @foreach($batch_ids as $batch_id)
        {!! Form::hidden('batch_ids[]',$batch_id) !!}
        @endforeach


    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}

</div>
