<div class="form-group">
{!! Form::label('basc_group_id', 'basc_group_id', ['class'=>'sr-only']) !!}
{!! Form::text('basc_group_id', null, ['class'=>'form-control', 'placeholder'=>'BASC Project']) !!}
{!! Form::label('name', 'Name', ['class'=>'sr-only']) !!}
{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
{!! Form::label('i7_index_id', 'i7_index_id', ['class'=>'sr-only']) !!}
{!! Form::text('i7_index_id', null, ['class'=>'form-control', 'placeholder'=>'i7']) !!}
{!! Form::label('i5_index_id', 'i5_index_id', ['class'=>'sr-only']) !!}
{!! Form::text('i5_index_id', null, ['class'=>'form-control', 'placeholder'=>'i5']) !!}
{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
</div>
