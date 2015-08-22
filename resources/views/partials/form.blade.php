@inject('IndexSet', 'App\IndexSet')

<div class="form-group">
{!! Form::label('basc_group_id', 'basc_group_id', ['class'=>'sr-only']) !!}
{!! Form::text('basc_group_id', null, ['class'=>'form-control', 'placeholder'=>'BASC Project']) !!}

{!! Form::label('sample_id', 'sample_id', ['class'=>'sr-only']) !!}
{!! Form::text('sample_id', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}

{!! Form::label('index_set', 'index_set', ['class'=>'sr-only']) !!}
{!! Form::select('index_set', $IndexSet->sets(), ['class'=>'form-control', 'placeholder'=>'Index Set']) !!}

{!! Form::label('i7_index_id', 'i7_index_id', ['class'=>'sr-only']) !!}
{!! Form::select('i7_index_id', $IndexSet->I7Indexes(), ['class'=>'form-control', 'placeholder'=>'i7']) !!}

{!! Form::label('i5_index_id', 'i5_index_id', ['class'=>'sr-only']) !!}
{!! Form::select('i5_index_id', $IndexSet->I5Indexes(), ['class'=>'form-control', 'placeholder'=>'i5']) !!}

{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
</div>
