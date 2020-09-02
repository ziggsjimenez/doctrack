@extends('layouts.auth')

@section('content')


    <div class="container-fluid">

        <h2>Create Type</h2>

        <a class="btn btn-primary btn-lg" href="{{route('types.index')}}"><i class="fas fa-arrow-circle-left fa-2x"></i> BACK</a>

        {!! Form::model($type,['route' => ['types.update',$type->id]]) !!}

        @method('put')

        <div class="form-group">
            {!! Form::label('name', 'Document Type') !!}
            {!! Form::text('name',null,['class'=>'form-control'])!!}
        </div>
        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}


        {!! Form::close() !!}


    </div>


@endsection



