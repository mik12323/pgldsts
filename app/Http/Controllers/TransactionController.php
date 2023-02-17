<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Mail\emailProject;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    //

    public function addTransaction(Request $request){
        $transactions = Transaction::all();
        $transaction = new Transaction;
        $transaction->project_id = $request->project_id;
        $transaction->user_id = $request->user_id;
        $transaction->department_id = $request->department_id;
        $transaction->office_id = $request->office_id;
        $transaction->activity_id = $request->activity_id;
        $transaction->project_id = $request->project_id;
        $transaction->timeIn = $request->timeIn;
        $transaction->timeOut = '00-00-00 00:00:00';
        // @dd($transactions);
        // $projects = Project::where('id', '=', $transaction->project_id)->first();
        // $transaction->project->status = 1;
        // Project::updateOrCreate(
        //     ['id' => $transaction->project_id],
        //     ['status' => 1]
        // );
        // $project = Project::find($transaction->project_id);
        // $status = $project->status + 1 ?? 1;

        // Project::updateOrCreate(
        //     ['id' => $transaction->project_id],
        //     ['status' => $status,
        //     'office_id' => $status,]
        // );



        $transaction->save();
        return back();
    }

    public function timeOutButton(Request $request){
        $transaction = new Transaction;
        // @dd($request->timeOut);
        $transaction->project_id = $request->project_id;
        $transaction->user_id = $request->user_id;
        $transaction->department_id = $request->department_id;
        $transaction->office_id = $request->office_id;
        $transaction->activity_id = $request->activity_id;
        $transaction->project_id = $request->project_id;
        $transaction->timeIn = $request->timeIn;
        $transaction->timeOut = $request->timeOut;

        // $transaction->project->status = $request->status;

        $project = Project::find($transaction->project_id);
        // $data = User::find($transaction->office_id+1);
        // $user = User::where('office_id', '=', $transaction->office_id+1)->first();
        // @dd($data->email);
        $status = $project->status + 1 ?? 1;
        Project::updateOrCreate(
            ['id' => $transaction->project_id],
            ['timeOut' => $request->timeOut,
            'status' => $status,
            'activity_id' => $status]
        );
        $transaction->save();
        // Mail::to($transaction->user->email)->send(new emailProject($data, $transaction, $project));

        return back();
        // Transaction::updateOrCreate(
        //     ['id' => $transaction->id],
        //     ['timeOut' =>$request->timeOut]
        // );
    }
}
