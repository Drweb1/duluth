<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_profile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class NurseController extends Controller
{
    public function view(){
        $nurses = user::where('type', 'nurse')->with('get_profile')->orderBy('id', 'desc')->get();
        return view('nurses.manage_nurses',compact('nurses'));
    }
    public function add(Request $req){
        $validator = Validator::make($req->all(), [
            'name'                      => 'required|string|max:255',
            'email' =>'required|email|unique:users,email',
            'phone'                     => 'required|string|max:20',
            'dob'                       => 'required|date',
            'address'                   => 'nullable|string|max:255',
            'salary'=>'required|integer'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
           $nurse = new User();
           $nurse->name = $req->name;
           $nurse->email = $req->email;
           $nurse->phone = $req->phone;
            //$nurse->company_id= "1"; // Optional line
           $nurse->type = 'nurse';
           $nurse->password = Str::random(6);
            $nurse->role = "nurse";
            $nurse->external_id ="nurse_".substr((string) Str::uuid(), 0, 6);
            if ($nurse->save()) {
                $profile = new user_profile();
                $profile->user_id =$nurse->id;
                $profile->date_of_birth = $req->dob;
                $profile->address = $req->address;
                $profile->save();
            }
        return redirect()->back()->with(['success' => 'Nurse added successfully!'], 200);
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update client. Please try again later. ' . $e->getMessage());
        }
    }
}
