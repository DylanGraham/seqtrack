<div class="row">
    <div class="col-md-3">
        {!! Form::label('batch_id', 'Batch name') !!}
    </div>
    <div class="col-md-9">
        {!! Form::select('batch_id', $batches, null, ['class'=>'form-control']) !!}
    </div>
</div>
