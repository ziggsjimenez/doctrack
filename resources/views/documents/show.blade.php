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

                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$document->id}}</td>
                <td>{{$document->description}}</td>
                <td style="text-align: right;">{{number_format($document->amount,2,'.',',')}}</td>
                <td>{{$document->office->name}}</td>
                <td>{{$document->type->name}}</td>
                <td>{{$document->documentstatus->name}}</td>

                <td>
                    <a class="btn btn-warning" href="{{route('documents.edit',$document->id)}}"><i class="fas fa-pen-alt"></i> Edit</a>
                    <a class="btn btn-primary" href="{{route('documents.show',$document->id)}}"><i class="fas fa-search"></i> View</a>
                </td>
            </tr>
            </tbody>
        </table>

        <h3> REQUIREMENTS </h3>

        <table class="table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $count = 1;
            ?>
            @foreach($document->requirements as $docrequirement)
                <tr>
                    <td>{{$count++}}</td>
                    <td>{{$docrequirement->requirement->name}}</td>
                    <td>
                        @if($docrequirement->requirementstatus->name=="Complied")
                            <i class="fas fa-check-circle" color="green"></i>
                        @endif

                        @if($docrequirement->requirementstatus->name=="Not Complied")
                            <i class="fas fa-times-circle" color="tomato"></i>
                        @endif
                        {{$docrequirement->requirementstatus->name}}</td>
                    <td>

                        <button class="btn btnupdatecomplied" docrequirement_id = "{{$docrequirement->id}}"><i class="fas fa-check-circle" color="green"></i></button>
                        <button class="btn btnupdatenotcomplied" docrequirement_id = "{{$docrequirement->id}}"><i class="fas fa-times-circle" color="red"></i></button>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>




    </div>


@endsection

@section('customScripts')
    <script>

        $(document).ready(function() {

            $('.btnupdatecomplied').click(function () {

                var docrequirement_id = $(this).attr("docrequirement_id");

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    /* the route pointing to the post function */
                    url: '{{route('docrequirement.complied')}}',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, docrequirement_id: docrequirement_id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */

                    success: function (data) {
                        $("#requirementstable").html(data);
                    }
                });


            });

        //    main
        });

    </script>

@endsection





