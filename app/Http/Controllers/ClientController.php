<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\User;
use App\Models\user_profile;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Log;
use App\Models\special_requirement;
use App\Models\medical_condition;
use App\Models\client_special_requirement;
use App\Models\client_medical_condition;
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
        $validated = $req->validate([
            'name'                      => 'required|string|max:255',
            'email'                     => 'required|email|unique:users,email',
            'phone'                     => 'required|string|max:20',
            'dob'                       => 'required|date',
            'address'                   => 'nullable|string|max:255',
            'emergency_contact_name'    => 'required|string|max:255',
            'emergency_phone'           => 'required|string|max:20',
            'emergency_relationship'    => 'required|string|max:100',
            'emergency_email'           => 'nullable|email|max:255',
            'care_type'                 => 'required|string|in:Daily Care,Weekly,Respite,Specialized',
            'frequency'                 => 'required|string|max:100',
            'start_date'                => 'required|date',
            'medical_requirements'      => 'required|array',
            'medical_requirements.*'    => 'exists:special_requirements,id',
            'medical_conditions'        => 'required|array',
            'medical_conditions.*'      => 'exists:medical_conditions,id',
            'insurance_provider'        => 'required|string|max:255',
            'policy_number'             => 'required|string|max:100',
            'medicare_number'           => 'nullable|string|max:100',
            'group_number'              => 'nullable|string|max:100',
            'insurance_card'            => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try {
            $client = new User();
            $client->name = $req->name;
            $client->email = $req->email;
            $client->phone = $req->phone;
            // $client->company_id= "1"; // Optional line
            $client->type = 'client';
            $client->password = Str::random(6);
             $client->role = "client";
            $client->external_id = Str::uuid();

            if ($client->save()) {
                $profile = new user_profile();
                $profile->user_id = $client->id;
                $profile->care_type = $req->care_type;
                $profile->care_frequency = $req->frequency;
                $profile->start_date = $req->start_date;
                $profile->insurance_provider = $req->insurance_provider;
                $profile->policy_number = $req->policy_number;
                $profile->medicare_number = $req->medicare_number;
                $profile->group_number = $req->group_number;
                $profile->insurance_card = $req->hasFile('insurance_card')
                    ? $req->file('insurance_card')->store('insurance_cards')
                    : null;
                $profile->date_of_birth = $req->dob;
                $profile->address = $req->address;
                $profile->emergency_contact_name = $req->emergency_contact_name;
                $profile->emergency_phone = $req->emergency_phone;
                $profile->emergency_relation = $req->emergency_relationship;
                $profile->emergency_email = $req->emergency_email;

                $profile->save();
                // dd("hgdjd");
                // Save medical conditions
                // return $req->medical_conditions;
                foreach ($req->medical_conditions as $conditionId) {
                    $conditionId = (int) $conditionId;
                    $medi = new client_medical_condition();
                    $medi->user_id = $client->id;
                    $medi->medical_condition_id = $conditionId;
                    $medi->created_at = now();
                    $medi->save();
                }

                // Save special requirements
                foreach ($req->medical_requirements as $requirementId) {
                    $requirementId = (int) $requirementId;
                    $requirement = new client_special_requirement();
                    $requirement->user_id = $client->id;
                    $requirement->special_requirement_id = $requirementId;
                    $requirement->created_at = now();
                    $requirement->save();
                }
            }

            // Return success message
            return redirect()->back()->with('success', 'Client added successfully!');

        } catch (\Exception $e) {
            Log::error('Error adding client: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->with('error', 'An error occurred while adding the client. Please try again.' . $e->getMessage());
        }
    }

}
