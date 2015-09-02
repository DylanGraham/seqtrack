<div class="form-group">
    <h4>Batch</h4>

    <span class="group @if ($errors->has('batch_name')) has-error @endif">
        {!! Form::label('batch_name', 'batch_name', ['class'=>'sr-only']) !!}
        {!! Form::text('batch_name', null, ['data-toggle'=>'tooltip', 'title'=>'Batch name', 'class'=>'form-control', 'placeholder'=>'Batch name']) !!}
    </span>
    <span class="group @if ($errors->has('concentration')) has-error @endif">
        {!! Form::label('concentration', 'concentration', ['class'=>'sr-only']) !!}
        {!! Form::number('concentration', null, ['data-toggle'=>'tooltip', 'title'=>'Concentration','step'=>'0.1', 'class'=>'form-control', 'placeholder'=>'Concentration']) !!}
    </span>
    <span class="group @if ($errors->has('volume')) has-error @endif">
        {!! Form::label('volume', 'volume', ['class'=>'sr-only']) !!}
        {!! Form::number('volume', null, ['data-toggle'=>'tooltip', 'title'=>'Volume','step'=>'0.1', 'class'=>'form-control', 'placeholder'=>'Volume']) !!}
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
        {!! Form::number('tape_station_length', null, ['data-toggle'=>'tooltip', 'title'=>'Tape station length','class'=>'form-control', 'placeholder'=>'Tape station length']) !!}
    </span>
    <span class="group @if ($errors->has('charge_code')) has-error @endif">
        {!! Form::label('charge_code', 'charge_code', ['class'=>'sr-only']) !!}
        {!! Form::text('charge_code', null, ['data-toggle'=>'tooltip', 'title'=>'Charge code','class'=>'form-control', 'placeholder'=>'Charge code']) !!}
    </span>
    <span class="group @if ($errors->has('sample_id')) has-error @endif">
        {!! Form::label('project_group_idproject_group_id', 'project_group_id', ['class'=>'sr-only']) !!}
        {!! Form::select('project_group_id', $pg, null, ['data-toggle'=>'tooltip', 'title'=>'Project group','class'=>'form-control', 'placeholder'=>'BASC Project']) !!}
     </span>


    <hr/>
    <h4>Sample</h4>

    <span class="group @if ($errors->has('sample_id')) has-error @endif">
        {!! Form::label('sample_id', 'sample_id', ['class'=>'sr-only']) !!}
        {!! Form::text('sample_id', null, ['data-toggle'=>'tooltip', 'title'=>'Sample name','class'=>'form-control', 'placeholder'=>'Sample name']) !!}
    </span>
    <span class="group @if ($errors->has('plate')) has-error @endif">
        {!! Form::label('plate', 'plate', ['class'=>'sr-only']) !!}
        {!! Form::text('plate', null, ['data-toggle'=>'tooltip', 'title'=>'Plate','class'=>'form-control', 'placeholder'=>'Plate']) !!}
    </span>
    <span class="group @if ($errors->has('well')) has-error @endif">
        {!! Form::label('well', 'well', ['class'=>'sr-only']) !!}
        {!! Form::text('well', null, ['data-toggle'=>'tooltip', 'title'=>'Well','class'=>'form-control', 'placeholder'=>'Well']) !!}
    </span>
    <span class="group @if ($errors->has('index_set')) has-error @endif">
        {!! Form::label('index_set', 'index_set', ['data-toggle'=>'tooltip', 'title'=>'Index set', 'class'=>'sr-only']) !!}
        {!! Form::select('index_set', $iSet, null, ['data-toggle'=>'tooltip', 'title'=>'Index set','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('i7_index_id')) has-error @endif">
        {!! Form::label('i7_index_id', 'i7_index_id', ['class'=>'sr-only']) !!}
        {!! Form::select('i7_index_id', ['name'=>''], null, ['data-toggle'=>'tooltip', 'title'=>'I7 Index','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('i5_index_id')) has-error @endif">
        {!! Form::label('i5_index_id', 'i5_index_id', ['class'=>'sr-only']) !!}
        {!! Form::select('i5_index_id', ['name'=>''], null, ['data-toggle'=>'tooltip', 'title'=>'I5 index','class'=>'form-control']) !!}
    </span>
    <span class="group @if ($errors->has('description')) has-error @endif">
        {!! Form::label('description', 'description', ['class'=>'sr-only']) !!}
        {!! Form::text('description', null, ['data-toggle'=>'tooltip', 'title'=>'Description','class'=>'form-control', 'placeholder'=>'Description']) !!}
    </span>
    <span class="group @if ($errors->has('runs')) has-error @endif">
        {!! Form::label('runs', 'runs', ['class'=>'sr-only']) !!}
        {!! Form::number('runs', null, ['data-toggle'=>'tooltip', 'title'=>'Runs','class'=>'form-control', 'placeholder'=>'Runs']) !!}
    </span>
    <span class="group @if ($errors->has('instrument_lane')) has-error @endif">
        {!! Form::label('instrument_lane', 'instrument_lane', ['class'=>'sr-only']) !!}
        {!! Form::number('instrument_lane', null, ['data-toggle'=>'tooltip', 'title'=>'Instrument lane','class'=>'form-control', 'placeholder'=>'Instrument lane']) !!}
    </span>
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
</div>
