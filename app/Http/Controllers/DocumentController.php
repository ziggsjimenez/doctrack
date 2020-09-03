<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){

        $documents = Document::get()->all();

        return view('documents.index',compact('documents'));

    }
}
