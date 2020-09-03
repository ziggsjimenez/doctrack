@extends('layouts.auth')

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')


    <div class="container-fluid">

        <h2>Document Types</h2>

        <a class="btn btn-primary btn-lg" href="{{route('types.create')}}"><i class="fas fa-plus-circle fa-2x"></i> ADD</a>

        <table id="datatable" class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Head</th>
                <th>Position</th>
                <th>Code</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offices as $office)
                <tr>
                    <td>{{$office->id}}</td>
                    <td>{{$office->name}} </td>
                    <td>{{$office->head}} </td>
                    <td>{{$office->position}} </td>
                    <td>{{$office->code}} </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('offices.edit',$office->id)}}"><i class="fas fa-pen-alt"></i> Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>


@endsection

@section('customScripts')

@include('layouts.js.datables')

<script>

    $(document).ready(function() {
        $('#datatable').DataTable();
    } );

</script>


@endsection
