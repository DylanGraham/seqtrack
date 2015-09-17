<div class="form-group">
    <h4>Create sample</h4>

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
    <span class="group @if ($errors->has('runs_remaining')) has-error @endif">
        {!! Form::label('runs_remaining', 'Runs_remaining', ['class'=>'sr-only']) !!}
        {!! Form::number('runs_remaining', null, ['data-toggle'=>'tooltip', 'title'=>'Runs','class'=>'number-field', 'placeholder'=>'Runs']) !!}
    </span>
    <span class="group @if ($errors->has('instrument_lane')) has-error @endif">
        {!! Form::label('instrument_lane', 'instrument_lane', ['class'=>'sr-only']) !!}
        {!! Form::number('instrument_lane', null, ['data-toggle'=>'tooltip', 'title'=>'Instrument lane','class'=>'number-field', 'placeholder'=>'Instrument lane']) !!}
    </span>
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
</div>
