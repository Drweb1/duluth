<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ScheduleController extends Controller
{
    public function view(Request $req)
    {
        $schedules = schedule::with('get_client', 'get_nurse', 'get_caregiver') ->get();
        $caregivers = user::where('type', 'caregiver')->get();
        $nurses = user::where('type', 'nurse')->get();
        $clients = user::where('type', 'client')->get();
        return view('appointment.view',compact('caregivers','clients','nurses','schedules'));
    }
    public function add(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'client' => 'required|string',
            'staff_type' => 'required|in:nurse,caregiver',
            'nurse' => 'required_if:staff_type,nurse',
            'caregiver' => 'required_if:staff_type,caregiver',
            'date' => 'required|date',
            'visit_type'=>'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'notes' => 'nullable|string',
            'recurring_visit' => 'nullable',
            'frequency' => 'required_if:recurring_visit,true'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed...!');
        }
        try {
            $schedule = new Schedule();

            $schedule->client_id = $req->client;
            $schedule->staff_type = $req->staff_type;

            if ($req->staff_type === 'nurse') {
                $schedule->nurse_id = $req->nurse;
                $schedule->caregiver_id = null;
            } elseif ($req->staff_type === 'caregiver') {
                $schedule->caregiver_id = $req->caregiver;
                $schedule->nurse_id = null;
            }

            $schedule->date = $req->date;
            $schedule->start_time = $req->start_time;
            $schedule->end_time = $req->end_time;
            $schedule->notes = $req->notes ?? null;
            $schedule->recurring_visit = $req->recurring_visit ?? null;
            $schedule->frequency = $req->frequency ?? null;

            $schedule->save();
            return redirect()->back()->with(['success' => 'Schedule added successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error'=>'Failed to add schedule'.$e->getMessage()], 500);
        }
    }
    public function delete($id)
    {
        $sc = schedule::findOrFail($id);
        $sc->delete();
        return redirect()->back()->with('success', 'Schedule deleted successfully.');
    }
    public function edit($id, Request $req)
        {
            $schedule = schedule::findOrFail($id);
            if ($req->method() == 'POST') {
                $validator = Validator::make($req->all(), [
                    'client' => 'required|string',
                    'staff_type' => 'required|in:nurse,caregiver',
                    'nurse' => 'required_if:staff_type,nurse',
                    'caregiver' => 'required_if:staff_type,caregiver',
                    'date' => 'required|date',
                    'visit_type'=>'required',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'notes' => 'nullable|string',
                    'recurring_visit' => 'nullable',
                    'frequency' => 'required_if:recurring_visit,true'
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed...!');
                }
                try {
                    $schedule->client_id = $req->client;
                    $schedule->staff_type = $req->staff_type;

                    if ($req->staff_type === 'nurse') {
                        $schedule->nurse_id = $req->nurse;
                        $schedule->caregiver_id = null;
                    } elseif ($req->staff_type === 'caregiver') {
                        $schedule->caregiver_id = $req->caregiver;
                        $schedule->nurse_id = null;
                    }

                    $schedule->date = $req->date;
                    $schedule->start_time = $req->start_time;
                    $schedule->end_time = $req->end_time;
                    $schedule->notes = $req->notes ?? null;
                    $schedule->recurring_visit = $req->recurring_visit ?? null;
                    $schedule->frequency = $req->frequency ?? null;

                    $schedule->save();
                    return redirect()->back()->with(['success' => 'Schedule updated successfully']);
                } catch (\Exception $e) {
                    return redirect()->back()->with(['error'=>'Failed to updated schedule'.$e->getMessage()], 500);
                }
            }
            $caregivers = user::where('type', 'caregiver')->get();
            $nurses = user::where('type', 'nurse')->get();
            $clients = user::where('type', 'client')->get();

            return view('appointment.edit', compact('schedule', 'clients', 'nurses', 'caregivers'));
        }

}
