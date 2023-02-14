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
            $transactions = Transaction::where('project_id', '=', $projects->id)->orderBy('created_at', 'desc')->first();
            $offices = Office::where('id', '=', $transactions->user->office_id)->first();
            return view('trackingProjectGuest', compact('projects', 'transactions', 'offices'));
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

        $bac = array(4,5,6,7,8,10,12);
        $pgo = array(9, 11, 13, 16, 19);
        $accounting = array(14,21);
        $pto = array(15,18);
        $cashier = array(17,20);

        $data = array();

        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        // $projectsWork = Project::where(['department_id' => $data->department_id, 'status' => $data->office_id])
        $projectAvailable = Project::whereDepartmentId($data->department_id)
        ->where('status', '=', $data->office_id)
        ->orderBy('created_at', 'desc')
        ->first();
        // @dd($projectAvailable);
        if($projectAvailable==null){
            $transactions = Transaction::all();
            $projectsDone = Project::whereDepartmentId($data->department_id)
              ->where('status', '>', $data->office_id)
              ->orderBy('created_at', 'desc')
              ->take(5)
              ->get();
              $projectsDone = $projectsDone->reverse();
            // @dd($projectsDone);
            if($data->office_id==1){
                return view('project-add', compact('data', 'transactions', 'projectAvailable', 'projectsDone'));
              }
            return view('projects', compact('data', 'transactions', 'projectAvailable', 'projectsDone'));
        }
        else{
            $projectsWork = Project::whereDepartmentId($data->department_id)
            ->where('status', '=', $data->office_id)
            ->orderBy('created_at', 'desc')
            ->first();

            $statusProject = $projectsWork->status;
            $projectForMe = null;

            if($projectAvailable != '[]' || $projectForMe != null){
                // @dd($projectForMe = Project::where(['department_id' => $data->department_id, 'status'=>1])->first());
                // @dd($statusProject);
                if($statusProject == 1 && $data->office_id == 1){
                    // @dd('PEO');
                    $projectForMe = Project::where(['department_id' => $data->department_id, 'status'=>$data->office_id])->first();
                }
                if($statusProject == 2 && $data->office_id == 2){
                    // @dd('PPDO');
                    $projectForMe = Project::where(['department_id' => $data->department_id, 'status'=>$data->office_id])->first();
                }
                if($statusProject == 3 && $data->office_id == 3){
                    // @dd('PBO');
                    $projectForMe = Project::where(['department_id' => $data->department_id, 'status'=>$data->office_id])->first();
                }
                if((in_array($statusProject,$bac)) && $data->office_id == 4){
                    // @dd('BAC');
                    $projectForMe = Project::where(['department_id' => $data->department_id, 'status'=>$data->office_id])->first();
                }

                if((in_array($statusProject,$pgo) && $data->office_id == 5)){
                    // @dd('PGO');
                    $projectForMe = Project::where(['department_id' => $data->department_id, 'status'=>$data->office_id])->first();
                }

                if((in_array($statusProject,$accounting) && $data->office_id == 6)){
                    // @dd('ACCOUNTING');
                    $projectForMe = Project::where(['department_id' => $data->department_id, 'status'=>$data->office_id])->first();
                }

                if((in_array($statusProject,$pto) && $data->office_id == 7)){
                    // @dd('PTO');
                    $projectForMe = Project::where(['department_id' => $data->department_id, 'status'=>$data->office_id])->first();
                }

                if((in_array($statusProject,$cashier) && $data->office_id == 8)){
                    // @dd('Cashier\'s Office');
                    $projectForMe = Project::where(['department_id' => $data->department_id, 'status'=>$data->office_id])->first();
                }

            }
            if($projectForMe!=null){
                $transactions = Transaction::where(['project_id' => $projectForMe->id, 'activity_id'=>$projectForMe->status])->orderBy('created_at', 'desc')->first();
                // @dd($transactions);
            }else{
                $transactions = '[]';
            }
            // @dd($projectForMe);




              $projectsDone = Project::whereDepartmentId($data->department_id)
              ->where('status', '>', $data->office_id)
              ->orderBy('created_at', 'desc')
              ->take(5)
              ->get();
              $projectsDone = $projectsDone->reverse();
              // if($projectsWork->activity_id>3 && $projectsWork->activity_id<11){

                  // }
                  if($data->office_id==1){
                      return view('project-add', compact('data', 'projectsWork', 'projectsDone', 'projectForMe', 'transactions', 'projectAvailable'));
                    }else{
                        return view('projects', compact('data', 'projectsWork', 'projectsDone', 'projectForMe', 'transactions', 'projectAvailable'));
                    }
        }

        // @dd($projectsWork);



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
