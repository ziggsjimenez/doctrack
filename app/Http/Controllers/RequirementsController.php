<?php

namespace App\Http\Controllers;

use App\Requirement;
use App\Type;
use Illuminate\Http\Request;

class RequirementsController extends Controller
{
    public function addrequirement(){

        $name = $_POST['reqname'];
        $type_id = $_POST['type_id'];

        $requirement = new Requirement;

        $requirement->name = $name;
        $requirement->type_id = $type_id;
        $requirement->save();

        return response()->json(['message'=>'Requirements added!']);

    }

    public function loadrequirements(){

        $id = $_POST['type_id'];

        $type = Type::find($id);

        $view = view('tables.requirements',compact('type'))->render();

        return response()->json($view);
    }
}
