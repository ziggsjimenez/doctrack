@extends('layouts.auth')

@section('content')

    <div class="container-fluid">

        <h2>Document - Add</h2>

        <a class="btn btn-primary btn-lg" href="{{route('documents.index')}}"><i class="fas fa-arrow-alt-circle-left fa-2x"></i> Back</a>

        <hr/>

        {!! Form::open(['route' => 'documents.store']) !!}

        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description',null,['class'=>'form-control','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('amount', 'Amount') !!}
            {!! Form::number('amount',null,['class'=>'form-control','required'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('office_id', 'Office') !!}
            {!! Form::select('office_id',$offices,null,['class'=>'form-control','placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('type_id', 'Type') !!}
            {!! Form::select('type_id',$types,null,['class'=>'form-control','placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('documentstatus_id', 'Document Status') !!}
            {!! Form::select('documentstatus_id',$documentstatuses,null,['class'=>'form-control','placeholder'=>'Select...'])!!}
        </div>

        {!! Form::submit('Add',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

@endsection