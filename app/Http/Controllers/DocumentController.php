<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\folder;
use Illuminate\Http\Request;
use App\Models\document;
class DocumentController extends Controller
{
    public function view(Request $req)
    {
        $folders = folder::where('company_id',session('company_id'))->get();
        return view('documents.view',compact('folders'));
    }

    public function add_folder(Request $req)
    {
        if ($req->method() == 'POST') {
            try {
                $validator = Validator::make($req->all(), [
                    'name' => 'required|string',
                    'description' => 'nullable|string',
                    'type' => 'required|string',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $folder = new folder();
                $folder->name = $req->name;
                $folder->external_id = "folder_" . substr((string) Str::uuid(), 0, 6);
                $folder->company_id = session("company_id");
                $folder->description = $req->description;
                $folder->type = $req->type;
                $folder->status="active";
                $folder->save();

                return redirect()->back()->with('success', 'Folder added successfully.');

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Something went wrong while adding the folder.'.$e->getMessage());
            }
        }
     return view("documents.add_folder");
    }
    public function delete($id)
    {
        $folder = folder::findOrFail($id);
        $folder->delete();
        return redirect()->back()->with('success', 'Folderr deleted successfully.');
    }
    public function edit_folder(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'id' => 'required|exists:folders,id',
                'name' => 'required|string',
                'description' => 'nullable|string',
                'type' => 'required|string',
                 'status' => 'nullable|in:active,inactive',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $folder = folder::findOrFail($req->id);
            $folder->name = $req->name;
            $folder->description = $req->description;
            $folder->type = $req->type;
            $folder->status = $req->status;
            $folder->save();

            return redirect()->back()->with('success', 'Folder updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while updating the folder. '.$e->getMessage());
        }
    }
    public function add(Request $req){
        if($req->method()=="POST"){
        try {
                $validator = Validator::make($req->all(), [
                    'name' => 'required|string',
                    'description' => 'nullable|string',
                    'file' => 'required',
                    'folder_id'=>'required|exists:folders,id'
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $folder = folder::where('id',$req->folder_id)->first();

                $allowedMimeTypes = [];

                if ($folder->type === 'pdf') {
                    $allowedMimeTypes = ['application/pdf'];
                } elseif ($folder->type === 'word') {
                    $allowedMimeTypes = [
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ];
                }

                $fileMimeType = $req->file('file')->getMimeType();

                if (!in_array($fileMimeType, $allowedMimeTypes)) {
                    return redirect()->back()->withErrors([
                        'file' => 'The uploaded file must be a ' . strtoupper($folder->type) . ' file.',
                    ])->withInput();
                }

                $doc = new document();
                $doc->name = $req->name;
               $doc->external_id = "doc_" . substr((string) Str::uuid(), 0, 6);
                $doc->company_id = session("company_id");
                $doc->description = $req->description;
                $doc->file= $req->file('file')->store('public/documents');
                $doc->folder_id=$req->folder_id;
                $doc->save();

                return redirect()->back()->with('success', 'Document added successfully.');

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Something went wrong while adding the document.'.$e->getMessage());
            }
        }
        $folders=folder::where('company_id',session('company_id'))->get();
        return view('documents.add_doc',compact('folders'));
    }
    public function documents($id){
        $docs=document::where('folder_id',$id)->where('company_id',session('company_id'))->get();
        return view('documents.document',compact('docs'));
    }
    public function delete_doc($id){
       $doc=document::find($id);
       if($doc->delete()){
            return redirect()->back()->with('success', 'Document deleted successfully.');
       }
    }
}
