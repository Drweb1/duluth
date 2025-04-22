<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    public function sign_up(Request $req)
    {
        if ($req->isMethod('post')) {
            $validatedData = $req->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:100|unique:customers',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Create the new customer
            $customer = new customer();
            $customer->name = $validatedData['name'];
            $customer->email = $validatedData['email'];
            $customer->password =($validatedData['password']);
            $customer->save();
            return redirect()->back()->with('success', 'Account created successfully!');
        }

        // Show the signup form
        return view('signup');
    }
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $customer = customer::where('email', $request->email)->first();
        if ($customer && $request->password== $customer->password) {
            Auth::login($customer, $request->remember);
            session()->put('customer_id',$customer->id);
            return redirect()->route('index');
        }
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
         }
         return view('login');
    }
    public function info(){
        $customer = null;
        if (session('customer_id')) {
            $customerId = session('customer_id');
            $customer = customer::find($customerId);
        }
    return view('customer_info_form', compact('customer'));
    }
    public function store_info(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'password' => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:50',
            'state' => 'nullable|string|max:50',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:50',
            'social_security_no' => 'nullable|string|unique:customers,social_security_no',
            'dob' => 'nullable|date',
            'ssn_doc_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'id_doc_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'utility_bill_doc_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        // Check if customer_id is in session
        $customerId = session('customer_id');
        if ($customerId) {
            // If customer_id exists in session, update the existing customer
            $customer = Customer::find($customerId);
            if (!$customer) {
                return redirect()->back()->withErrors(['error' => 'Customer not found']);
            }
        } else {
            // Create a new customer record
            $customer = new Customer();
        }

        // Update or set customer details
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = $request->password ? bcrypt($request->password) : $customer->password;
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->postal_code = $request->postal_code;
        $customer->country = $request->country;
        $customer->social_security_no = $request->social_security_no;
        $customer->dob = $request->dob;

        // Handle file uploads
        if ($request->hasFile('ssn_doc_path')) {
            $customer->ssn_doc_path = $request->file('ssn_doc_path')->store('documents');
        }
        if ($request->hasFile('id_doc_path')) {
            $customer->id_doc_path = $request->file('id_doc_path')->store('documents');
        }
        if ($request->hasFile('utility_bill_doc_path')) {
            $customer->utility_bill_doc_path = $request->file('utility_bill_doc_path')->store('documents');
        }

        // Save the customer record
        $customer->save();

        // Store customer_id in session if newly created
        if (!$customerId) {
            session()->put('customer_id', $customer->id);
        }

        return redirect()->back()->with('success', 'Customer details saved successfully');
    }

}
