<table class="table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($type->requirements as $requirement)
    <tr>
        <td>{{$requirement->id}}</td>
        <td>{{$requirement->name}}</td>
        <td>{{$requirement->status}}</td>
        <td><button requirementid = "{{$requirement->id}}" requirementname = "{{$requirement->name}}" class="btn btn-warning btnupdate"> Update </button></td>
    </tr>
    @endforeach
    </tbody>
</table>


<script>
    $('.btnupdate').click(function () {

        $('#reqaddbtn').html("Edit");
        $('#reqaddbtn').attr({
            "method":"Edit"
        });
        $('#reqname').val($(this).attr('requirementname'));
        $('#requirement_id').val($(this).attr('requirementid'));

    });
</script>
