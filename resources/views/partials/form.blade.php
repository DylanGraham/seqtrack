<div class="form-group">
<h4>Batch</h4>
{!! Form::label('batch_name', 'batch_name', ['class'=>'sr-only']) !!}
{!! Form::text('batch_name', null, ['data-toggle'=>'tooltip', 'title'=>'Batch name', 'class'=>'form-control', 'placeholder'=>'Batch name']) !!}

{!! Form::label('concentration', 'concentration', ['class'=>'sr-only']) !!}
{!! Form::number('concentration', null, ['step'=>'0.1', 'class'=>'form-control', 'placeholder'=>'Concentration']) !!}

{!! Form::label('volume', 'volume', ['class'=>'sr-only']) !!}
{!! Form::number('volume', null, ['step'=>'0.1', 'class'=>'form-control', 'placeholder'=>'Volume']) !!}

{!! Form::label('tube_bar_code', 'tube_bar_code', ['class'=>'sr-only']) !!}
{!! Form::text('tube_bar_code', null, ['class'=>'form-control', 'placeholder'=>'Tube bar code']) !!}

{!! Form::label('tube_location', 'tube_location', ['class'=>'sr-only']) !!}
{!! Form::text('tube_location', null, ['class'=>'form-control', 'placeholder'=>'Tube location']) !!}

{!! Form::label('tape_station_length', 'tape_station_length', ['class'=>'sr-only']) !!}
{!! Form::number('tape_station_length', null, ['class'=>'form-control', 'placeholder'=>'Tape station length']) !!}

{!! Form::label('charge_code', 'charge_code', ['class'=>'sr-only']) !!}
{!! Form::text('charge_code', null, ['class'=>'form-control', 'placeholder'=>'Charge code']) !!}

{!! Form::label('project_group_id', 'project_group_id', ['class'=>'sr-only']) !!}
{!! Form::select('project_group_id', $pg, null, ['class'=>'form-control', 'placeholder'=>'BASC Project']) !!}
<hr/>
<h4>Sample</h4>
{!! Form::label('sample_id', 'sample_id', ['class'=>'sr-only']) !!}
{!! Form::text('sample_id', null, ['class'=>'form-control', 'placeholder'=>'Sample name']) !!}

{!! Form::label('plate', 'plate', ['class'=>'sr-only']) !!}
{!! Form::text('plate', null, ['class'=>'form-control', 'placeholder'=>'Plate']) !!}

{!! Form::label('well', 'well', ['class'=>'sr-only']) !!}
{!! Form::text('well', null, ['class'=>'form-control', 'placeholder'=>'Well']) !!}

{!! Form::label('index_set', 'index_set', ['data-toggle'=>'tooltip', 'title'=>'Index set', 'class'=>'sr-only']) !!}
{!! Form::select('index_set', $iSet, null, ['class'=>'form-control']) !!}

{!! Form::label('i7_index_id', 'i7_index_id', ['class'=>'sr-only']) !!}
{!! Form::select('i7_index_id', ['name'=>''], null, ['class'=>'form-control']) !!}

{!! Form::label('i5_index_id', 'i5_index_id', ['class'=>'sr-only']) !!}
{!! Form::select('i5_index_id', ['name'=>''], null, ['class'=>'form-control']) !!}

{!! Form::label('description', 'description', ['class'=>'sr-only']) !!}
{!! Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Description']) !!}

{!! Form::label('runs', 'runs', ['class'=>'sr-only']) !!}
{!! Form::number('runs', null, ['class'=>'form-control', 'placeholder'=>'Runs']) !!}

{!! Form::label('instrument_lane', 'instrument_lane', ['class'=>'sr-only']) !!}
{!! Form::number('instrument_lane', null, ['class'=>'form-control', 'placeholder'=>'Instrument lane']) !!}

{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
</div>
