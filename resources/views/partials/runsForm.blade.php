<div class="heading-container">
    <h1>Create run</h1>
</div>
<div class="form-container">
    <div class="row">
        <div class="group @if ($errors->has('experiment_name')) has-error @endif">
           <div class="col-md-3">{!! Form::label('experiment_name', 'Experiment Name') !!}</div>
           <div class="col-md-9">{!! Form::text('experiment_name', null, ['data-toggle'=>'tooltip', 'title'=>'Experiment Name', 'class'=>'form-control', 'placeholder'=>'Experiment Name']) !!}</div>
        </div>

        <div class="group @if ($errors->has('description')) has-error @endif">
           <div class="col-md-3">{!! Form::label('description', 'Description') !!}</div>
           <div class="col-md-9">{!! Form::text('description', null, ['data-toggle'=>'tooltip', 'title'=>'Description', 'class'=>'form-control', 'placeholder'=>'Description']) !!}</div>
        </div>

        <div class="group @if ($errors->has('read1')) has-error @endif">
            <div class="col-md-3">{!! Form::label('read1', 'Read 1') !!}</div>
            <div class="col-md-9">{!! Form::number('read1', null, ['data-toggle'=>'tooltip', 'title'=>'Read 1','class'=>'form-control', 'placeholder'=>'Read 1']) !!}</div>
        </div>

        <div class="group @if ($errors->has('read2')) has-error @endif">
            <div class="col-md-3">{!! Form::label('read2', 'Read 2') !!}</div>
            <div class="col-md-9">{!! Form::number('read2', null, ['data-toggle'=>'tooltip', 'title'=>'Read 2','class'=>'form-control', 'placeholder'=>'Read 2']) !!}</div>
        </div>
        <div class="group @if ($errors->has('flow_cell')) has-error @endif">
            <div class="col-md-3">{!! Form::label('flow_cell', 'Flow cell') !!}</div>
            <div class="col-md-9">{!! Form::text('flow_cell', null, ['data-toggle'=>'tooltip','title'=>'Flow cell','class'=>'form-control', 'placeholder'=>'Flow cell']) !!}</div>
        </div>
        <div class="group @if ($errors->has('adaptor_id')) has-error @endif">
            <div class="col-md-3">{!! Form::label('adaptor_id', 'Adaptor', ['data-toggle'=>'tooltip', 'title'=>'Adaptor']) !!}</div>
            <div class="col-md-9">{!! Form::select('adaptor_id', $adaptor, $default_adaptor_id, ['data-toggle'=>'tooltip','title'=>'Adaptor','class'=>'form-control']) !!}</div>
        </div>
        <div class="group @if ($errors->has('work_flow_id')) has-error @endif">
            <div class="col-md-3">{!! Form::label('work_flow_id', 'Work Flow', ['data-toggle'=>'tooltip', 'title'=>'Work Flow']) !!}</div>
            <div class="col-md-9">{!! Form::select('work_flow_id', $work_flow, $default_work_flow_id, ['data-toggle'=>'tooltip','title'=>'Work Flow','class'=>'form-control']) !!}</div>
        </div>
        <div class="group @if ($errors->has('iem_file_version_id')) has-error @endif">
            <div class="col-md-3">{!! Form::label('iem_file_version_id', 'IEM file version', ['data-toggle'=>'tooltip', 'title'=>'IEM file version']) !!}</div>
            <div class="col-md-9">{!! Form::select('iem_file_version_id', $iem_file_version, $default_iem_file_version_id, ['data-toggle'=>'tooltip','title'=>'IEM file version','class'=>'form-control']) !!}</div>
        </div>
        <div class="group @if ($errors->has('application_id')) has-error @endif">
            <div class="col-md-3">{!! Form::label('application_id', 'Application', ['data-toggle'=>'tooltip', 'title'=>'Application']) !!}</div>
            <div class="col-md-9">{!! Form::select('application_id', $application, $default_application_id, ['data-toggle'=>'tooltip','title'=>'Application','class'=>'form-control']) !!}</div>
        </div>
        <div class="group @if ($errors->has('chemistry_id')) has-error @endif">
            <div class="col-md-3">{!! Form::label('chemistry_id', 'Chemistry', ['data-toggle'=>'tooltip', 'title'=>'Chemistry']) !!}</div>
            <div class="col-md-9">{!! Form::select('chemistry_id', $chemistry, $default_chemistry_id, ['data-toggle'=>'tooltip','title'=>'Chemistry','class'=>'form-control']) !!}</div>
        </div>
        <div class="group @if ($errors->has('instrument_id')) has-error @endif">
            <div class="col-md-3">{!! Form::label('instrument_id', 'Instrument', ['data-toggle'=>'tooltip', 'title'=>'Instrument']) !!}</div>
            <div class="col-md-9">{!! Form::select('instrument_id', $instrument, null, ['data-toggle'=>'tooltip','title'=>'Instrument','class'=>'form-control']) !!}</div>
        </div>
        <div class="group @if ($errors->has('assay_id')) has-error @endif">
            <div class="col-md-3">{!! Form::label('assay_id', 'Assay', ['data-toggle'=>'tooltip', 'title'=>'Assay']) !!}</div>
            <div class="col-md-9">{!! Form::select('assay_id', $assay, $default_assay_id, ['data-toggle'=>'tooltip','title'=>'Assay','class'=>'form-control']) !!}</div>
        </div>
        <div class="group @if ($errors->has('project_group_id')) has-error @endif">
            <div class="col-md-3">{!! Form::label('project_group_id', 'Project Group', ['data-toggle'=>'tooltip', 'title'=>'Project Group']) !!}</div>
            <div class="col-md-9">{!! Form::select('project_group_id', $projectGroup, $default_project_id, ['data-toggle'=>'tooltip','title'=>'Project Group','class'=>'form-control']) !!}</div>
        </div>

        <div class="group @if ($errors->has('run_date')) has-error @endif">
            <div class="col-md-3">{!! Form::label('run_date', 'Date', ['data-toggle'=>'tooltip', 'title'=>'Date']) !!}</div>
            <div class="col-md-9">{!! Form::select('run_date', $run_date, null, ['data-toggle'=>'tooltip','title'=>'Date','class'=>'form-control']) !!}</div>
        </div>

        {!!Form::hidden('run_status_id',$default_run_status_id) !!}
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>
