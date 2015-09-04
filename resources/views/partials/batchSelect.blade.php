
{!! Form::open(['url'=>'batches', 'class'=>'form-inline']) !!}

{!! Form::label('batch', 'batch', ['class'=>'sr-only']) !!}
{!! Form::select('batch', $batches, null, ['class'=>'form-control']) !!}
