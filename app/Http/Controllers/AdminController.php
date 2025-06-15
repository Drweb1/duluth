<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemsImport;
use App\Models\item;
use App\Models\customer;
use App\Models\affiliate;
use App\Models\cart;
use App\Models\company;
use App\Models\language;
use App\Models\user_language;
use App\Models\order;
use App\Models\special_requirement;
use App\Models\medical_condition;
use App\Models\client_special_requirement;
use App\Models\client_medical_condition;
use App\Models\user;
use App\Models\document;
use App\Models\specialization;
use App\Helpers\UserHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\schedule;
class AdminController extends Controller
{
    public function login(Request $req)
    {
        if($req->isMethod("post")) {
            $req->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
          $user = user::where('email', $req->email)->where('password', $req->password)
                         ->first();

            if (!$user) {
                return redirect()->back()->with("login_msg", 'Incorrect Email or Password!');
            }

            Auth::login($user);
            session()->put('admin_id', $user->id);
            session()->put('company_id', "1");
            $req->session()->regenerate();
            if($user->type=="reseller_user"){
                return redirect()->route("reseller.dashboard");
            }
            return redirect()->route('dashboard');
        }

        return view('admin.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin_login');
    }

    public function dashboard() {
    //     $schedules=[];
    //     // dd(Auth::user());

    // if (UserHelper::currentUserType() === 'nurse') {
    //        $schedules = schedule::where(function($query) {
    //                 $query->where('nurse_id', session('admin_id'));
    //             })->where('company_id',session('company_id'))
    //             ->with('get_client', 'get_tasks')
    //             ->orderByRaw("CASE WHEN status = 'Completed' THEN 1 ELSE 0 END")
    //             ->latest()
    //             // ->take(10)
    //             ->get();
    //     }
        $medics=medical_condition::all();
        $requires=special_requirement::all();
        $specializations=specialization::all();
        $languages=language::all();
         if (UserHelper::currentUserType()  === 'admin' ){
              $schedules = schedule::where('company_id',session('company_id'))
        ->with('get_client', 'get_tasks')
        ->orderByRaw("CASE WHEN status = 'Completed' THEN 1 ELSE 0 END")
        ->latest()
        ->take(10)
        ->get();
         }
         else{
 $schedules = schedule::where(function($query) {
            $query->where('caregiver_id', session('admin_id'))
                  ->orWhere('nurse_id', session('admin_id'));
        })->where('company_id',session('company_id'))
        ->with('get_client', 'get_tasks')
        ->orderByRaw("CASE WHEN status = 'Completed' THEN 1 ELSE 0 END")
        ->latest()
        ->take(10)
        ->get();

         }

        if ($schedules->count() < 8) {
        $additionalNeeded = 8 - $schedules->count();
        $additional = schedule::where(function($query) {
                        $query->where('caregiver_id', session('admin_id'))
                      ->orWhere('nurse_id', session('admin_id'));
            })
            ->with('get_client', 'get_tasks')
            ->latest()->where('company_id',session('company_id'))
            ->take($additionalNeeded)
            ->get();

            $schedules = $schedules->merge($additional)->take(8);
        }
        $clients = user::where('type', 'client')->where('company_id',session('company_id'))->count();
        $docs=document::where('company_id',session('company_id'))->count();
       $nurses = user::where('type', 'nurse')->where('company_id',session('company_id'))->count();
         return view('admin.dashboard',compact('requires','medics','languages','specializations','schedules','clients','docs','nurses'));
    }

        public function reseller_dashboard(){
            // return session()->all();
            $companies=company::all();
            // $appointments= schedule::count();
            // $nurses = user::where('type','nurse')->count();
            // $caregivers = user::where('type','caregiver')->count();
            // $clients = user::where('type','client')->count();
            // $appointmentsGrowth = 10;
            // $nursesGrowth = 5;
            // $caregiversGrowth = 7;
            // $clientsGrowth = 4;
            return view("admin.companies",compact('companies'));
        }
     public function signup(Request $request)
{
    if ($request->isMethod('POST')) {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'role' => 'required|string|in:caregiver,nurse',
            'password' => [
                'required',
                'confirmed',
            ],
            'terms' => 'accepted'
        ]);
        // dd("wegd");
        $user = new user();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->role = $validated['role'];
        $user->password = $validated['password'];
        $user->save();
        return redirect()->back()
            ->with('success', 'Registration successful! Please login.');
    }

    return view('admin.signup');
}
}
