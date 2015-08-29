<div class="form-group">
{!! Form::label('concentration', 'concentration', ['class'=>'sr-only']) !!}
{!! Form::number('concentration', null, ['class'=>'form-control', 'placeholder'=>'Concentration']) !!}

{!! Form::label('volume', 'volume', ['class'=>'sr-only']) !!}
{!! Form::number('volume', null, ['class'=>'form-control', 'placeholder'=>'Volume']) !!}

{!! Form::label('tube_bar_code', 'tube_bar_code', ['class'=>'sr-only']) !!}
{!! Form::text('tube_bar_code', null, ['class'=>'form-control', 'placeholder'=>'Tube bar code']) !!}

{!! Form::label('tube_location', 'tube_location', ['class'=>'sr-only']) !!}
{!! Form::text('tube_location', null, ['class'=>'form-control', 'placeholder'=>'Tube location']) !!}

{!! Form::label('tape_station_length', 'tape_station_length', ['class'=>'sr-only']) !!}
{!! Form::number('tape_station_length', null, ['class'=>'form-control', 'placeholder'=>'Tape station length']) !!}

{!! Form::label('charge_code', 'charge_code', ['class'=>'sr-only']) !!}
{!! Form::text('charge_code', null, ['class'=>'form-control', 'placeholder'=>'Charge code']) !!}

{!! Form::label('project_group_id', 'project_group_id', ['class'=>'sr-only']) !!}
{!! Form::text('project_group_id', null, ['class'=>'form-control', 'placeholder'=>'BASC Project']) !!}

{!! Form::label('sample_id', 'sample_id', ['class'=>'sr-only']) !!}
{!! Form::text('sample_id', null, ['class'=>'form-control', 'placeholder'=>'Sample name']) !!}

{!! Form::label('index_set', 'index_set', ['class'=>'sr-only']) !!}
{!! Form::select('index_set', $i7Set, null, ['class'=>'form-control']) !!}

{!! Form::label('i7_index_id', 'i7_index_id', ['class'=>'sr-only']) !!}
{!! Form::select('i7_index_id', ['name'=>''], null, ['class'=>'form-control']) !!}

{!! Form::label('i5_index_id', 'i5_index_id', ['class'=>'sr-only']) !!}
{!! Form::select('i5_index_id', ['name'=>''], null, ['class'=>'form-control']) !!}

{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
</div>
