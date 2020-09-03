<?php

namespace App\Http\Controllers;

use App\Docrequirement;
use Illuminate\Http\Request;

class DocrequirementController extends Controller
{
    public function complied(){

        $docrequirement_id = $_POST['docrequirement_id'];

        $docreq = Docrequirement::find($docrequirement_id);

        $docreq->requirementstatus_id = 1;
        $docreq->save();

        return response()->json(['message'=>'Doc Requirement updated!']);

    }
}
