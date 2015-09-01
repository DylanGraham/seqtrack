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

    {!! Form::label('adaptor', 'Adaptor', ['data-toggle'=>'tooltip', 'title'=>'Adaptor', 'class'=>'sr-only']) !!}
    {!! Form::select('adaptor', $adaptor, null, ['data-toggle'=>'tooltip','title'=>'Adaptor','class'=>'form-control']) !!}

    {!! Form::label('work_flow', 'Work Flow', ['data-toggle'=>'tooltip', 'title'=>'Work Flow', 'class'=>'sr-only']) !!}
    {!! Form::select('work_flow', $work_flow, null, ['data-toggle'=>'tooltip','title'=>'Work Flow','class'=>'form-control']) !!}


    {!! Form::label('iem_file_version', 'IEM file version', ['data-toggle'=>'tooltip', 'title'=>'IEM file version', 'class'=>'sr-only']) !!}
    {!! Form::select('iem_file_version', $iem_file_version, null, ['data-toggle'=>'tooltip','title'=>'IEM file version','class'=>'form-control']) !!}

    {!! Form::label('application', 'Application', ['data-toggle'=>'tooltip', 'title'=>'Application', 'class'=>'sr-only']) !!}
    {!! Form::select('application', $application, null, ['data-toggle'=>'tooltip','title'=>'Application','class'=>'form-control']) !!}

    {!! Form::label('chemistry', 'Chemistry', ['data-toggle'=>'tooltip', 'title'=>'Chemistry', 'class'=>'sr-only']) !!}
    {!! Form::select('chemistry', $chemistry, null, ['data-toggle'=>'tooltip','title'=>'Chemistry','class'=>'form-control']) !!}

    {!! Form::label('run_status', 'Run Status', ['data-toggle'=>'tooltip', 'title'=>'Run Status', 'class'=>'sr-only']) !!}
    {!! Form::select('run_status', $run_status, null, ['data-toggle'=>'tooltip','title'=>'Run Status','class'=>'form-control']) !!}

    {!! Form::label('instrument', 'Instrument', ['data-toggle'=>'tooltip', 'title'=>'Instrument', 'class'=>'sr-only']) !!}
    {!! Form::select('instrument', $instrument, null, ['data-toggle'=>'tooltip','title'=>'Instrument','class'=>'form-control']) !!}

    {!! Form::label('assay', 'Assay', ['data-toggle'=>'tooltip', 'title'=>'Assay', 'class'=>'sr-only']) !!}
    {!! Form::select('assay', $assay, null, ['data-toggle'=>'tooltip','title'=>'Assay','class'=>'form-control']) !!}

    {!! Form::label('projectGroup', 'Project Group', ['data-toggle'=>'tooltip', 'title'=>'Project Group', 'class'=>'sr-only']) !!}
    {!! Form::select('projectGroup', $projectGroup, null, ['data-toggle'=>'tooltip','title'=>'Project Group','class'=>'form-control']) !!}

    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}

</div>