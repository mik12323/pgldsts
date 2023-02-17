<?php

namespace App\Http\Controllers;

use App\Mail\emailProject;
use Session;
use App\Models\User;
use App\Models\Project;
use App\Models\Transaction;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function email(){
        // $data = array();
        // if(Session::has('loginId')){
        //     $data = User::where('id', '=', Session::get('loginId'))->first();
        // }
        // $transaction = Transaction::where('department_id','=',$data->department_id)->first();
        // $project = Project::find($transaction->project_id)->first();
        // return view('mail.project', compact('project', 'transaction', 'data'));
        return new emailProject();
    }
}
