<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function view(Request $req)
    {
        return view('documents.view');
    }
}
