@extends('layouts.auth')

@section('content')


    <div class="container-fluid">

        <h2>Document Types</h2>

        <a class="btn btn-primary btn-lg" href="{{route('types.create')}}"><i class="fas fa-plus-circle fa-2x"></i> ADD</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name}} <a href="{{route('types.show',$type->id)}}"><i class="fas fa-binoculars"></i>View</a></td>
                <td>
                    <a class="btn btn-warning" href="{{route('types.edit',$type->id)}}"><i class="fas fa-pen-alt"></i> Edit</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>


    </div>


@endsection



