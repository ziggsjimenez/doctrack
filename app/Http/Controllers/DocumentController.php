<?php

namespace App\Http\Controllers;

use App\Docrequirement;
use App\Document;
use App\Documentstatus;
use App\Office;
use App\Type;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){

        $documents = Document::get()->all();

        return view('documents.index',compact('documents'));

    }

    public function create(){

        $offices = Office::pluck('name','id');
        $types = Type::pluck('name','id');
        $documentstatuses = Documentstatus::pluck('name','id');

        return view ('documents.create',compact('offices','types','documentstatuses'));

    }

    public function store(Request $request){

        $request->validate([
            'description'=>'required',
            'amount'=>'required',
            'office_id'=>'required',
            'type_id'=>'required',
            'documentstatus_id'=>'required'
        ]);

        $document = new Document;

        $document->fill($request->all());

        $document->save();

        $this->generaterequirements($request['type_id'],$document->id,2);

        return redirect(route('documents.index'));

    }

    private function generaterequirements($type_id,$doc_id,$reqstatus){

        $type = Type::find($type_id);

        foreach($type->requirements as $requirement){

            $docreq = new Docrequirement;

            $docreq->document_id = $doc_id;
            $docreq->requirement_id = $requirement->id;
            $docreq->requirementstatus_id = $reqstatus;
            $docreq->save();

        }

    }

    public function show($id){

        $document = Document::find($id);

        return view ('documents.show',compact('document'));

    }
}
