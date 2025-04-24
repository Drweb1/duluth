<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\User;
use App\Models\user_profile;
use App\Models\user_availability;
use Illuminate\Support\Str;
use App\Models\specialization;
use App\Models\user_specialization;
use Illuminate\Support\Facades\Log;
use App\Models\special_requirement;
use App\Models\medical_condition;
use App\Models\client_special_requirement;
use App\Models\client_medical_condition;
use Illuminate\Support\Facades\Validator;
class CareGiverController extends Controller
{
    public function view(Request $request)
    {
       $caregivers = user::where('type', 'caregiver')->with('get_profile','get_availabilities','get_specialities.get_speciality')->get();
        return view('caregivers.view', compact('caregivers'));
    }
    public function add(Request $req)
    {
        //  return $req->background_check_file;
        $validator = Validator::make($req->all(), [
            'c_name'                      => 'required|string|max:255',
            'c_email'                     => 'required|email|unique:users,email',
            'c_phone'                     => 'required|string|max:20',
            'c_dob'                       => 'required|date',
            'availabilities'              => 'required|array',
            'c_address'                   => 'nullable|string|max:255',
            'c_emergency_contact_name'    => 'required|string|max:255',
            'c_emergency_phone'           => 'required|string|max:20',
            'c_emergency_relationship'    => 'required|string|max:100',
            'c_emergency_email'           => 'nullable|email|max:255',
            'c_care_type'                 => 'nullable|string|in:Daily Care,Weekly,Respite,Specialized',
            'c_experience_years'          => 'nullable|numeric|min:0',
            'certifications'            => 'nullable|array',
            'background_check_file'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'cpr_certification_file'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'tb_test_file'              => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'drivers_license_file'      => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $caregiver = new User();
            $caregiver->name = $req->c_name;
            $caregiver->email = $req->c_email;
            $caregiver->phone = $req->c_phone;
            $caregiver->type = 'caregiver';
            $caregiver->role = 'caregiver';
            $caregiver->password = Str::random(6);
            $caregiver->external_id = "caregiver_".substr((string) Str::uuid(), 0, 6);
            if($caregiver->save()){

                $profile = new user_profile();
                $profile->user_id = $caregiver->id;
                $profile->date_of_birth = $req->c_dob;
                $profile->address = $req->c_address;
                $profile->experience_years = $req->experience;
                $profile->certification = $req->certification;
                $profile->schedule = $req->preferred_schedule;
                $profile->start_date= $req->start_date;
                $profile->emergency_contact_name = $req->c_emergency_contact_name;
                $profile->emergency_phone = $req->c_emergency_phone;
                $profile->emergency_relation = $req->c_emergency_relationship;
                $profile->care_type = $req->care_type;

                if ($req->hasFile('background_check_file')) {
                    // dd("jehgdywfd");
                    $profile->background_check = $req->file('background_check_file')->store('caregiver_docs');
                }

                if ($req->hasFile('cpr_certification_file')) {
                    $profile->cpr_certification = $req->file('cpr_certification_file')->store('caregiver_docs');
                }

                if ($req->hasFile('tb_test_file')) {
                    $profile->tb_test = $req->file('tb_test_file')->store('caregiver_docs');
                }

                if ($req->hasFile('drivers_license_file')) {
                    $profile->licence = $req->file('drivers_license_file')->store('caregiver_docs');
                }
        $profile->save();

                if ($profile->save()) {
                    foreach ($req->availabilities as $availabilityData) {
                        $availability = new user_availability();
                        $availability->user_id = $caregiver->id;
                        $availability->day = $availabilityData;
                        $availability->created_at = now();
                        $availability->save();
                    }


                    foreach ($req->specializations as $specializationId) {
                        $specialization = new user_specialization();
                        $specialization->user_id = $caregiver->id;
                        $specialization->specialization_id = $specializationId;
                        $specialization->created_at = now();
                        $specialization->save();
                    }
                }

            }
            return response()->json(['message' => 'Caregiver added successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to add caregiver. Please try again later.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function delete($id)
    {
        $client = User::where('type', 'caregiver')->findOrFail($id);
        $client->delete();
        return redirect()->back()->with('success', 'Caregiver deleted successfully.');
    }
}
