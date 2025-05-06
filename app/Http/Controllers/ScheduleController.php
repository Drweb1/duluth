<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\schedule;
use Illuminate\Http\Request;
use App\Models\task;
use App\Models\schedule_task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class ScheduleController extends Controller
{
    public function view(Request $request)
    {
        $caregivers = User::where('type', 'caregiver')->get();
        $nurses = User::where('type', 'nurse')->get();
        $clients = User::where('type', 'client')->get();

        $viewType = $request->get('view', 'week');
        if ($viewType === 'week') {
            $startDate = $request->has('start_date')
                ? Carbon::parse($request->start_date)
                : now()->startOfWeek();

            $endDate = $request->has('end_date')
                ? Carbon::parse($request->end_date)
                : $startDate->copy()->endOfWeek();
        } else {
            $startDate = $request->has('start_date')
                ? Carbon::parse($request->start_date)->startOfMonth()
                : now()->startOfMonth();

            $endDate = $request->has('end_date')
                ? Carbon::parse($request->end_date)->endOfMonth()
                : $startDate->copy()->endOfMonth();
        }

        $schedules = Schedule::with('get_client', 'get_nurse', 'get_caregiver')
            ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->get();
        $tasks=task::get();
        return view('appointment.view', compact('caregivers', 'clients','nurses','schedules', 'startDate','endDate','tasks'));
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
            'frequency' => 'required_if:recurring_visit,true',
            'tasks'=>'required|exists:tasks,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed...!');
        }
        try {
            $schedule = new schedule();

            $schedule->client_id = $req->client;
            $schedule->staff_type = $req->staff_type;

            if ($req->staff_type === 'nurse') {
                $schedule->nurse_id = $req->nurse;
                $schedule->caregiver_id = null;
            } elseif ($req->staff_type === 'caregiver') {
                $schedule->caregiver_id = $req->caregiver;
                $schedule->nurse_id = null;
            }
            $schedule->external_id = "sc_".substr((string) Str::uuid(), 0, 6);
            $schedule->visit_type= $req->visit_type;
            $schedule->date = $req->date;
            $schedule->start_time = $req->start_time;
            $schedule->end_time = $req->end_time;
            $schedule->status="Pending";
            $schedule->notes = $req->notes ?? null;
            $schedule->recurring_visit = $req->recurring_visit ?? null;
            $schedule->frequency = $req->frequency ?? null;
            $schedule->company_id=null;
            if($schedule->save()){
                foreach($req->tasks as $task){
                    $sc_task=new schedule_task();
                    $sc_task->task_id=$task;
                    $sc_task->schedule_id= $schedule->id;
                    $sc_task->status="pending";
                    $sc_task->save();
                }
                return redirect()->back()->with(['success' => 'Schedule added successfully']);
            }

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
        $schedule = schedule::where('id',$id)->with('get_tasks')->first();
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
                    'tasks'=>'required|exists:tasks,id',
                    'frequency' => 'required_if:recurring_visit,true'
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
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
                    $schedule->visit_type= $req->visit_type;
                    $schedule->date = $req->date;
                    $schedule->start_time = $req->start_time;
                    $schedule->end_time = $req->end_time;
                    $schedule->notes = $req->notes ?? null;
                    $schedule->recurring_visit = $req->recurring_visit ?? null;
                    $schedule->frequency = $req->frequency ?? null;

                    if($schedule->save()){
                        $taskIds = $req->tasks;
                        $schedule->get_tasks()->sync($taskIds);
                        return redirect()->back()->with(['success' => 'Schedule updated successfully']);
                    }
                } catch (\Exception $e) {
                    return redirect()->back()->with(['error'=>'Failed to updated schedule'.$e->getMessage()], 500);
                }
            }
            $caregivers = user::where('type', 'caregiver')->get();
            $nurses = user::where('type', 'nurse')->get();
            $clients = user::where('type', 'client')->get();
            $tasks=task::get();
            return view('appointment.edit', compact('schedule', 'clients', 'nurses', 'caregivers','tasks'));
    }
    public function add_task(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'title' => 'required|string',
                'description' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $task = new task();
            $task->title = $req->title;
            $task->external_id = "task_" . substr((string) Str::uuid(), 0, 6);
            $task->company_id = null;
            $task->description = $req->description;
            $task->save();

            return redirect()->back()->with('success', 'Task added successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while adding the task.');
        }
    }
    public function schedule_tasks($id){
        $schedule = schedule::find($id);
        $tasks = schedule_task::where('schedule_id',$schedule->id)->with('get_task')->get();
        return view('appointment.tasks' ,compact('tasks','schedule'));
    }
    public function update_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required|exists:schedules,id',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $schedule = schedule::find($request->schedule_id);
        $schedule->status = $request->status;
        $schedule->save();

        return redirect()->back()->with(['success' => 'Status updated']);
    }
    public function add_remarks_to_schedule(Request $req) {
        $validator = Validator::make($req->all(), [
            'remarks' => 'required|array',
            'remarks.*' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        foreach ($req->remarks as $taskId => $remark) {
            $schedule_task = schedule_task::find($taskId);
            if ($schedule_task) {
                $schedule_task->remarks = $remark;
                $schedule_task->save();
            }
        }

        return redirect()->back()->with(['success' => 'All remarks saved successfully!']);
    }
    public function add_signature(Request $request, $id)
    {
        $request->validate([
            'signature' => 'required|string',
        ]);

        try {
            $schedule = Schedule::findOrFail($id);
            $signatureData = $request->input('signature');
            $image = str_replace('data:image/png;base64,', '', $signatureData);
            $image = str_replace(' ', '+', $image);
            $imageName = 'signature_'.Str::random(10).'_'.time().'.png';
            $schedule->signature=Storage::disk('public')->put("signatures/{$imageName}", base64_decode($image));
            $schedule->save();
            return redirect()->back()->with('success', 'Signature saved successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                   ->with('error', 'Error saving signature: '.$e->getMessage())
                   ->withInput();
        }
    }
}
