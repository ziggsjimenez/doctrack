@extends('layouts.auth')


@section('customCss')

    @include('layouts.css.datables')

@endsection


@section('content')


    <div class="container-fluid">

        <h2>Documents</h2>

        <a class="btn btn-primary btn-lg" href="{{route('documents.create')}}"><i class="fas fa-plus-circle fa-2x"></i> ADD</a>

        <hr/>

        <table id="datatable" class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Office</th>
                <th>Type</th>
                <th>Documentstatus</th>
                <th>Requirements</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{$document->id}}</td>
                    <td>{{$document->description}}</td>
                    <td style="text-align: right;">{{number_format($document->amount,2,'.',',')}}</td>
                    <td>{{$document->office->name}}</td>
                    <td>{{$document->type->name}}</td>
                    <td>{{$document->documentstatus->name}}</td>
                    <td>
                        <ol>
                        @foreach($document->requirements as $docrequirement)
                        <li>{{$docrequirement->requirement->name}} -

                            @if($docrequirement->requirementstatus->name=="Complied")
                                <button class="btn btnstatusupdate"><i class="fas fa-check-circle" color="green"></i></button>
                            @endif

                            @if($docrequirement->requirementstatus->name=="Not Complied")
                                <button class="btn btnstatusupdate"><i class="fas fa-times-circle" color="tomato"></i></button>
                            @endif

                        </li>
                        @endforeach
                        </ol>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('documents.edit',$document->id)}}"><i class="fas fa-pen-alt"></i> Edit</a>
                        <a class="btn btn-primary" href="{{route('documents.show',$document->id)}}"><i class="fas fa-search"></i> View</a>
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





