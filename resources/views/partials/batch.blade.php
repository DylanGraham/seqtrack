
<div class ="heading-container">
    <h1>{{ $formName }}</h1>
</div>
    <div class="form-container">
    <div class="row">
        <br/>
    @if ($formName === "Create Batch")
        <div class="form-group @if ($errors->has('batch_name')) has-error @endif">
            <div class="col-md-3">
            {!! Form::label('batch_name', 'Batch Name') !!}
            </div>
            <div class="col-md-9">
            {!! Form::text('batch_name', null, ['title'=>'Batch name', 'class'=>'form-control', 'placeholder'=>'Batch name']) !!}
            </div>
        </div>
        <br/>
    @endif
        <div class="form-group @if ($errors->has('concentration')) has-error @endif">
            <div class="col-md-3">
            {!! Form::label('concentration', 'Concentration') !!}
            </div>
            <div class="col-md-9">
            {!! Form::number('concentration', null, ['title'=>'Concentration','step'=>'0.1', 'class'=>'form-control', 'placeholder'=>'Concentration']) !!}
            </div>
        </div>
        <br/>
        <div class="form-group @if ($errors->has('volume')) has-error @endif">
            <div class="col-md-3">{!! Form::label('volume', 'Volume') !!}</div>
            <div class="col-md-9">
            {!! Form::number('volume', null, ['title'=>'Volume','step'=>'0.1', 'class'=>'form-control', 'placeholder'=>'Volume']) !!}
            </div>
        </div>
        <div class="form-group @if ($errors->has('tube_bar_code')) has-error @endif">
            <div class="col-md-3">{!! Form::label('tube_bar_code', 'Tube Bar Code') !!}</div>
            <div class="col-md-9">
            {!! Form::text('tube_bar_code', null, ['title'=>'Tube bar code','class'=>'form-control', 'placeholder'=>'Tube bar code']) !!}
            </div>
        </div>
        <div class="form-group @if ($errors->has('tube_location')) has-error @endif">
            <div class="col-md-3">{!! Form::label('tube_location', 'Tube Location') !!}</div>
            <div class="col-md-9">
            {!! Form::text('tube_location', null, ['title'=>'Tube location','class'=>'form-control', 'placeholder'=>'Tube location']) !!}
            </div>
        </div>
        <div class="form-group @if ($errors->has('tape_station_length')) has-error @endif">
            <div class="col-md-3">{!! Form::label('tape_station_length', 'Tape Station Length') !!}</div>
            <div class="col-md-9">
            {!! Form::number('tape_station_length', null, ['title'=>'Tape station length','class'=>'form-control', 'placeholder'=>'Tape station length']) !!}
            </div>
        </div>
        <div class="form-group @if ($errors->has('charge_code')) has-error @endif">
            <div class="col-md-3">{!! Form::label('charge_code', 'Charge Code') !!}</div>
            <div class="col-md-9">
            {!! Form::text('charge_code', $charge, ['title'=>'Charge code','class'=>'form-control', 'placeholder'=>'Charge code']) !!}
            </div>
        </div>
        
        <div class="form-group @if ($errors->has('project_group_id')) has-error @endif">
            <div class="col-md-3">{!! Form::label('project_group_id', 'Project Group ID') !!}</div>
            <div class="col-md-9">
            {!! Form::select('project_group_id', $pg, $my_group, ['title'=>'Project group','class'=>'form-control', 'placeholder'=>'BASC Project']) !!}
            </div>
        </div>
        
        <div class="col-md-offset-3 col-md-9">
        {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>


