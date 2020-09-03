@extends('layouts.auth')

@section('content')


    <div class="container-fluid">

        <h2>Document Type - {{$type->name}}</h2>

        <a class="btn btn-primary btn-lg" href="{{route('types.index')}}"><i class="fas fa-arrow-circle-left fa-2x"></i>
            Back</a>

        <hr/>

        <h3>Requirements</h3>

        <div class="form-group">
            <input class="form-control" type="text" id="reqname" placeholder="Requirement name...">
            <input type="hidden" id="type_id" value="{{$type->id}}"/>
            <input type="hidden" id="requirement_id" value=""/>
        </div>
        <button class="btn btn-primary" id="reqaddbtn" method="Add">ADD</button>

        <div id="requirementstable">

        </div>


    </div>


@endsection

@section('customScripts')

    @include('layouts.js.jquery')

    <script>

        $(document).ready(function () {

            function loadrequirements() {

                var type_id = '{{$type->id}}';

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    /* the route pointing to the post function */
                    url: '{{route('requirements.list')}}',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, type_id: type_id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */

                    success: function (data) {
                        $("#requirementstable").html(data);
                    }
                });

            }

            loadrequirements();


            $('#reqaddbtn').click(function () {


                if ($('#reqaddbtn').attr('method') == "Edit") {

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    var type_id = $('#type_id').val();
                    var reqname = $('#reqname').val();
                    var requirement_id = $('#requirement_id').val();

                    if (reqname == "") {
                        alert('Blank field!')
                    } else {
                        $.ajax({

                            url: '{{route('requirements.editrequirement')}}',
                            type: 'POST',

                            data: {_token: CSRF_TOKEN, type_id: type_id, reqname: reqname,requirement_id:requirement_id},
                            dataType: 'JSON',

                            success: function (data) {

                                $('#reqname').val("");
                                $('#reqaddbtn').html("Add");
                                $('#reqaddbtn').attr({
                                    "method":"Add"
                                });

                                $('#requirement_id').val("");
                                loadrequirements();

                            }
                        });
                    }
                }
                if ($('#reqaddbtn').attr('method') == "Add") {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    var type_id = $('#type_id').val();
                    var reqname = $('#reqname').val();

                    if (reqname == "") {
                        alert('Blank field!')
                    } else {
                        $.ajax({

                            url: '{{route('requirements.addrequirement')}}',
                            type: 'POST',

                            data: {_token: CSRF_TOKEN, type_id: type_id, reqname: reqname},
                            dataType: 'JSON',

                            success: function (data) {

                                $('#reqname').val("");
                                loadrequirements();

                            }
                        });
                    }
                }

            });

        });

    </script>

@endsection




