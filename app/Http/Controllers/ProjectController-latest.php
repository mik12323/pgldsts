<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Department;
use App\Models\Office;
use App\Models\Transaction;
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
            'referenceNumber' => 'required_without:location',
            'location' => 'required_without:referenceNumber'
        ]);
        if($request->referenceNumber!=null){
            $projects = Project::where('referenceNumber','=',$request->referenceNumber)->first();
        } else{
            $projects = Project::where('location', '=', $request->location)->first();
        }
        // $projects = Project::where('referenceNumber','=',$request->referenceNumber)->first();
        $activities = Activity::where('id', '=',$request->activity_id)->first();
        $offices = Office::where('id', '=',$request->office_id)->first();
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        if($projects!=null){
            $transactions = Transaction::where('project_id', '=', $projects->id)->get();
            return view('trackProject', compact('projects', 'data', 'transactions', 'activities', 'offices'));
            }else{
                return back()->with('fail', 'Information entered does not match anything!');
            }
    }
    public function trackProjectGuest(Request $request){
        $request->validate([
            'referenceNumber' => 'required'
        ]);
        $projects = Project::where('referenceNumber','=',$request->referenceNumber)->first();


        if($projects){
            $transactions = Transaction::where('project_id', '=', $projects->id)->get();
            return view('trackingProjectGuest', compact('projects', 'transactions'));
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

        // $projectsWork = Project::where(['department_id' => $data->department_id, 'status' => $data->office_id])
        $projectsWork = Project::where(['department_id' => $data->department_id])
        ->take(1)
        ->first();
        // @dd($projectsWork->status);

        if($projectsWork != '[]'){
            //BAC
            if($projectsWork->status >= 4 && $projectsWork->status <= 10){
                // @dd('BAC');
            }
            //PGO
            elseif(($projectsWork->status >= 8 && $projectsWork->status <= 13) || $projectsWork->status == 15){

            }
                // @dd('PGO');
            //Accounting
            elseif($projectsWork->status == 8 || $projectsWork->status == 16){

            }
                // @dd('Accounting');
            //PTO
            elseif($projectsWork->status == 12 || $projectsWork->status == 15){

            }
                // @dd('PTO');
            //Cashier's Office
            elseif($projectsWork->status == 14 || $projectsWork->status == 16){

            }
                // @dd('Cashier\'s Office');

            else{
                // @dd('Soloist');
            }
        }

        // @dd($projectsWork);
        if($projectsWork == '[]'){
            //   $transactions = Transaction::all();
              $transactions = Transaction::all();
        }else{
              $transactions = Transaction::where(['project_id' => $projectsWork->id, 'user_id'=>$data->office_id])->orderBy('created_at', 'desc')->first();

        }
        // $projectsDone = Project::where(['department_id' => $data->department_id, 'status' => $data->office_id+1]) -> get();
        // $projectsDone = Project::where(['department_id' => $data->department_id, 'status' => $data->office_id+1]) -> get();
        $projectsDone = Project::whereDepartmentId($data->department_id)
        ->where('status', '>', $data->office_id)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
        $projectsDone = $projectsDone->reverse();
        // if($projectsWork->activity_id>3 && $projectsWork->activity_id<11){

        // }
        if($data->office_id==1){
            return view('project-add', compact('data', 'projectsWork', 'projectsDone', 'transactions'));
        } else{
            return view('projects', compact('projectsWork','data','projectsDone', 'transactions'));
        }


    }


    public function projectStore(Request $request){
        $data = array();

        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $request->validate([
            // 'department_id' => 'required',
            'projectName' => 'required',
            'referenceNumber' => 'required|unique:projects',
            'location' => 'required'
        ]);
        $projects = new Project();
        $projects->department_id = $data->department_id;
        $projects->projectName = $request->projectName;
        $projects->office_id = 1;
        $projects->activity_id = 1;
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
