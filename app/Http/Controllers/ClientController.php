<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\user;

class ClientController extends Controller
{
    public function view(Request $request)
    {
        $clients = user::where('type', 'client')

        ->get();
        return view('clients.view', compact('clients'));
    }
    public function add(Request $req)
    {
        return view('clients.add');
    }
}
