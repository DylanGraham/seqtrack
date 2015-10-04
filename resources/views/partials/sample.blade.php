<div class="row">
    @if($formName === "Create Sample")
        <div class="form-group @if ($errors->has('sample_id')) has-error @endif">
            <div class="col-md-3">
                {!! Form::label('sample_id', 'Sample ID') !!}
            </div>
            <div class="col-md-9">
                {!! Form::text('sample_id', null, ['data-toggle'=>'tooltip', 'title'=>'Sample name','class'=>'form-control', 'placeholder'=>'Sample name']) !!}
            </div>
        </div>
    @endif   
        <div class="from-group @if ($errors->has('plate')) has-error @endif">
            <div class="col-md-3">
                {!! Form::label('plate', 'Plate') !!}
            </div>
            <div class="col-md-9">
                {!! Form::text('plate', null, ['data-toggle'=>'tooltip', 'title'=>'Plate','class'=>'form-control', 'placeholder'=>'Plate']) !!}
            </div>
        </div>
        <div class="form-group @if ($errors->has('well')) has-error @endif">
            <div class="col-md-3">
                {!! Form::label('well', 'Well') !!}
            </div>
            <div class="col-md-9">
                {!! Form::text('well', null, ['data-toggle'=>'tooltip', 'title'=>'Well','class'=>'form-control', 'placeholder'=>'Well']) !!}
            </div>
        </div>
    @if ($formName === "Create Sample")
        <div class="form-group @if ($errors->has('index_set')) has-error @endif">
            <div class="col-md-3">
                {!! Form::label('index_set', 'Index Set', ['data-toggle'=>'tooltip', 'title'=>'Index set']) !!}
            </div>
            <div class="col-md-9">
                {!! Form::select('index_set', $iSet, null, ['data-toggle'=>'tooltip', 'title'=>'Index set','class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group @if ($errors->has('i7_index_id')) has-error @endif">
            <div class="col-md-3">
                {!! Form::label('i7_index_id', 'i7 Index ID') !!}
            </div>
            <div class="col-md-9">
                {!! Form::select('i7_index_id', $i7, ['name'=>'i7_index_id'], ['data-toggle'=>'tooltip', 'title'=>'I7 Index','class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group @if ($errors->has('i5_index_id')) has-error @endif">
            <div class="col-md-3">
                {!! Form::label('i5_index_id', 'i5 Index ID',array('id' => 'i5_label')) !!}
            </div>
            <div class="col-md-9">
                {!! Form::select('i5_index_id', $i5, ['name'=>'i5_index_id'], ['data-toggle'=>'tooltip', 'title'=>'I5 index','class'=>'form-control']) !!}
            </div>
        </div>
    @endif
        <div class="form-group @if ($errors->has('description')) has-error @endif">
            <div class="col-md-3">
                {!! Form::label('description', 'Description') !!}
            </div>
            <div class="col-md-9">
                {!! Form::text('description', null, ['title'=>'Description','class'=>'form-control', 'placeholder'=>'Description']) !!}
            </div>
        </div>
        <div class="form-group @if ($errors->has('runs_remaining')) has-error @endif">
            <div class="col-md-3">
                @if ($formName === "Create Sample")
                    {!! Form::label('runs_remaining', 'Number of runs') !!}
                @else
                    {!! Form::label('runs_remaining', 'Number of runs remaining') !!}
                @endif
            </div>
            <div class="col-md-9">
                {!! Form::number('runs_remaining', null, ['data-toggle'=>'tooltip', 'title'=>'Runs','class'=>'form-control', 'placeholder'=>'Number of runs']) !!}
            </div>
        </div>
    <div class="col-md-offset-3 col-md-9">
        {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
    </div>
</div>
