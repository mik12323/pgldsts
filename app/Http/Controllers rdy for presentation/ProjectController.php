<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Project;

class ProjectController extends Controller
{
    //


    public function trackViewAdmin(){
        $data = array();
        // $projects = Project::all();
        // $project = Project::find($referenceNumber);
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view('tracking', compact('data'));
    }
    public function trackViewGuest(){

        return view('trackingGuest');
    }
    public function trackProjectAdmin(Request $request){
        $request->validate([
            'referenceNumber' => 'required'
        ]);
        $projects = Project::where('referenceNumber','=',$request->referenceNumber)->first();
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        if($projects){
            return view('trackProject', compact('projects', 'data'));
            }else{
                return back()->with('fail', 'Reference number not found!');
            }
    }
    public function trackProjectGuest(Request $request){
        $request->validate([
            'referenceNumber' => 'required'
        ]);
        $projects = Project::where('referenceNumber','=',$request->referenceNumber)->first();

        if($projects){
            return view('trackingProjectGuest', compact('projects'));
            }else{
                return back()->with('fail', 'Reference number found!');
            }
    }


    public function messageView(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('messages', compact('data'));
    }

    public function projectView(){

        $data = array();

        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        // $projectsWork = Project::where(['department_id', '=' , $data->department_id], ['office_id', '=' , $data->office_id])->get();
        $projectsOffice = Project::where('office_id', '=', $data->office_id);
        $projectsWork = Project::where('department_id', '=', '$data->department_id')->union($projectsOffice)->get();
        if($data->office_id==1){
            return view('project-add', compact('data', 'projectsWork', 'projectsOffice'));
        } else{
            return view('projects', compact('projectsWork','data', 'projectsOffice'));

        }


    }

    // public function projectAdd(){
    //     $data = array();
    //     if(Session::has('loginId')){
    //         $data = User::where('id', '=', Session::get('loginId'))->first();
    //     }
    //     $user = User::where('role', '=', $data->role)->get();
    //     if($user==1)
    //     return view('project-add', compact('data'));
    // }

    public function projectStore(Request $request){
        $data = array();

        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $request->validate([
            // 'department_id' => 'required',
            'projectname' => 'required',
            'referenceNumber' => 'required|unique:projects',
            'location' => 'required'
        ]);
        $projects = new Project();
        $projects->department_id = $data->department_id;
        $projects->projectname = $request->projectname;
        $projects->referenceNumber = $request->referenceNumber;
        $projects->location = $request->location;

        $save_project = $projects->save();
        if($save_project){
            return back()->with('success', 'Added successfully!');
        }else{
            return back()->with('fail', 'Something went wrong!');
        }

    }

}
