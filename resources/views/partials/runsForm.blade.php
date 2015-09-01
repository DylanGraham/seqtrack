<div class="form-group">
    <h4>Run</h4>
    {!! Form::label('experiment_name', 'Experiment Name', ['class'=>'sr-only']) !!}
    {!! Form::text('experiment_name', null, ['data-toggle'=>'tooltip', 'title'=>'Experiment Name', 'class'=>'form-control', 'placeholder'=>'Experiment Name']) !!}

    {!! Form::label('description', 'Description', ['class'=>'sr-only']) !!}
    {!! Form::text('description', null, ['data-toggle'=>'tooltip', 'title'=>'Description', 'class'=>'form-control', 'placeholder'=>'Description']) !!}

    {!! Form::label('read1', 'Read 1', ['class'=>'sr-only']) !!}
    {!! Form::number('read1', null, ['data-toggle'=>'tooltip', 'title'=>'Read 1','class'=>'form-control', 'placeholder'=>'Read 1']) !!}


    {!! Form::label('read2', 'Read 2', ['class'=>'sr-only']) !!}
    {!! Form::number('read2', null, ['data-toggle'=>'tooltip', 'title'=>'Read 2','class'=>'form-control', 'placeholder'=>'Read 2']) !!}

    {!! Form::label('flow_cell', 'Flow cell', ['class'=>'sr-only']) !!}
    {!! Form::text('flow_cell', null, ['data-toggle'=>'tooltip','title'=>'Flow cell','class'=>'form-control', 'placeholder'=>'Flow cell']) !!}

    {!! Form::label('adaptor_id', 'Adaptor', ['data-toggle'=>'tooltip', 'title'=>'Adaptor', 'class'=>'sr-only']) !!}
    {!! Form::select('adaptor_id', $adaptor, null, ['data-toggle'=>'tooltip','title'=>'Adaptor','class'=>'form-control']) !!}

    {!! Form::label('work_flow_id', 'Work Flow', ['data-toggle'=>'tooltip', 'title'=>'Work Flow', 'class'=>'sr-only']) !!}
    {!! Form::select('work_flow_id', $work_flow, null, ['data-toggle'=>'tooltip','title'=>'Work Flow','class'=>'form-control']) !!}


    {!! Form::label('iem_file_version_id', 'IEM file version', ['data-toggle'=>'tooltip', 'title'=>'IEM file version', 'class'=>'sr-only']) !!}
    {!! Form::select('iem_file_version_id', $iem_file_version, null, ['data-toggle'=>'tooltip','title'=>'IEM file version','class'=>'form-control']) !!}

    {!! Form::label('application_id', 'Application', ['data-toggle'=>'tooltip', 'title'=>'Application', 'class'=>'sr-only']) !!}
    {!! Form::select('application_id', $application, null, ['data-toggle'=>'tooltip','title'=>'Application','class'=>'form-control']) !!}

    {!! Form::label('chemistry_id', 'Chemistry', ['data-toggle'=>'tooltip', 'title'=>'Chemistry', 'class'=>'sr-only']) !!}
    {!! Form::select('chemistry_id', $chemistry, null, ['data-toggle'=>'tooltip','title'=>'Chemistry','class'=>'form-control']) !!}

    {!! Form::label('run_status_id', 'Run Status', ['data-toggle'=>'tooltip', 'title'=>'Run Status', 'class'=>'sr-only']) !!}
    {!! Form::select('run_status_id', $run_status, null, ['data-toggle'=>'tooltip','title'=>'Run Status','class'=>'form-control']) !!}

    {!! Form::label('instrument_id', 'Instrument', ['data-toggle'=>'tooltip', 'title'=>'Instrument', 'class'=>'sr-only']) !!}
    {!! Form::select('instrument_id', $instrument, null, ['data-toggle'=>'tooltip','title'=>'Instrument','class'=>'form-control']) !!}

    {!! Form::label('assay_id', 'Assay', ['data-toggle'=>'tooltip', 'title'=>'Assay', 'class'=>'sr-only']) !!}
    {!! Form::select('assay_id', $assay, null, ['data-toggle'=>'tooltip','title'=>'Assay','class'=>'form-control']) !!}

    {!! Form::label('project_group_id', 'Project Group', ['data-toggle'=>'tooltip', 'title'=>'Project Group', 'class'=>'sr-only']) !!}
    {!! Form::select('project_group_id', $projectGroup, null, ['data-toggle'=>'tooltip','title'=>'Project Group','class'=>'form-control']) !!}


    {!! Form::label('date', 'Date', ['data-toggle'=>'tooltip', 'title'=>'Date', 'class'=>'sr-only']) !!}
    {!! Form::select('date', $date, null, ['data-toggle'=>'tooltip','title'=>'Date','class'=>'form-control']) !!}

    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}

</div>