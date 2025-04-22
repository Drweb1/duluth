<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function view(Request $req)
    {
        return view('appointment.view');
    }
}
