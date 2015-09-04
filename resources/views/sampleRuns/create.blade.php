@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a>
    {!! Form::open(['url'=>'runs', 'class'=>'form-inline']) !!}
    <br/>
    <p>Add batches to a run</p>
    <br/>
    <p> Select run
    @include('partials.runSelect')
    or <a href="{!! route('runs.create') !!}"> create a new run</a></p>

    <hr/>

    @foreach($batches as $batch)

     {{ ($batch->id)}}  {{ ($batch->batch_name) }}  {{ $batch->sample_id }}
        <br/>

    @endforeach



    {!! Form::close() !!}
    @include('errors.list')

@endsection

@section('footer')

@endsection
