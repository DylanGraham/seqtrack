<div class="form-group">
{!! Form::label('basc_group_id', 'basc_group_id', ['class'=>'sr-only']) !!}
{!! Form::text('basc_group_id', null, ['class'=>'form-control', 'placeholder'=>'BASC Project']) !!}

{!! Form::label('sample_id', 'sample_id', ['class'=>'sr-only']) !!}
{!! Form::text('sample_id', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}

{!! Form::label('index_set', 'index_set', ['class'=>'sr-only']) !!}
{!! Form::select('index_set', $i7Set, null, ['class'=>'form-control']) !!}

{!! Form::label('i7_index_id', 'i7_index_id', ['class'=>'sr-only']) !!}
{!! Form::select('i7_index_id', ['name'=>''], null, ['class'=>'form-control']) !!}

{!! Form::label('i5_index_id', 'i5_index_id', ['class'=>'sr-only']) !!}
{!! Form::select('i5_index_id', ['name'=>''], null, ['class'=>'form-control']) !!}

{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
</div>
