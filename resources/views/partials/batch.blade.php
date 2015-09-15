<div class="form-group">
    <h4>Create Batch</h4>

    <span class="group @if ($errors->has('batch_name')) has-error @endif">
        {!! Form::label('batch_name', 'batch_name', ['class'=>'sr-only']) !!}
        {!! Form::text('batch_name', null, ['data-toggle'=>'tooltip', 'title'=>'Batch name', 'class'=>'form-control', 'placeholder'=>'Batch name']) !!}
    </span>
    <span class="group @if ($errors->has('concentration')) has-error @endif">
        {!! Form::label('concentration', 'concentration', ['class'=>'sr-only']) !!}
        {!! Form::number('concentration', null, ['data-toggle'=>'tooltip', 'title'=>'Concentration','step'=>'0.1', 'class'=>'number-field', 'placeholder'=>'Concentration']) !!}
    </span>
    <span class="group @if ($errors->has('volume')) has-error @endif">
        {!! Form::label('volume', 'volume', ['class'=>'sr-only']) !!}
        {!! Form::number('volume', null, ['data-toggle'=>'tooltip', 'title'=>'Volume','step'=>'0.1', 'class'=>'number-field', 'placeholder'=>'Volume']) !!}
    </span>
    <span class="group @if ($errors->has('tube_bar_code')) has-error @endif">
        {!! Form::label('tube_bar_code', 'tube_bar_code', ['class'=>'sr-only']) !!}
        {!! Form::text('tube_bar_code', null, ['data-toggle'=>'tooltip', 'title'=>'Tube bar code','class'=>'form-control', 'placeholder'=>'Tube bar code']) !!}
    </span>
    <span class="group @if ($errors->has('tube_location')) has-error @endif">
        {!! Form::label('tube_location', 'tube_location', ['class'=>'sr-only']) !!}
        {!! Form::text('tube_location', null, ['data-toggle'=>'tooltip', 'title'=>'Tube location','class'=>'form-control', 'placeholder'=>'Tube location']) !!}
    </span>
    <span class="group @if ($errors->has('tape_station_length')) has-error @endif">
        {!! Form::label('tape_station_length', 'tape_station_length', ['class'=>'sr-only']) !!}
        {!! Form::number('tape_station_length', null, ['data-toggle'=>'tooltip', 'title'=>'Tape station length','class'=>'number-field', 'placeholder'=>'Tape station length']) !!}
    </span>
    <span class="group @if ($errors->has('charge_code')) has-error @endif">
        {!! Form::label('charge_code', 'charge_code', ['class'=>'sr-only']) !!}
        {!! Form::text('charge_code', $charge, ['data-toggle'=>'tooltip', 'title'=>'Charge code','class'=>'form-control', 'placeholder'=>'Charge code']) !!}
    </span>
    <span class="group @if ($errors->has('project_group_id')) has-error @endif">
        {!! Form::label('project_group_id', 'project_group_id', ['class'=>'sr-only']) !!}
        {!! Form::select('project_group_id', $pg, $my_group, ['data-toggle'=>'tooltip', 'title'=>'Project group','class'=>'form-control', 'placeholder'=>'BASC Project']) !!}
     </span>

    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
</div>
