<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Hash;
use Session;

class AuthController extends Controller
{
    //
    public function loginView(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('auth.login', compact('data'));
    }

    public function registerView(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('auth.register', compact('data'));
    }

    public function registerUser(Request $request){
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'dob' => 'required|min:10|max:10',
            'email' => 'required|email|unique:users',
            'phoneNumber' => 'required|unique:users',
            'department_id' => 'required',
            'office_id' => 'required',
            'password' => 'required|min:5|max:12'

        ]);
        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->dob = $request->dob;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->department_id = $request->department_id;
        $user->office_id = $request->office_id;
        $user->password = Hash::make($request->password);
        // if($request->office=='PEO'){
        //     $user->role = 2;
        // }

        $save_user = $user->save();
        if($save_user){
            return back()->with('success', 'Registered successfully!');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'

        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->Session()->put('loginId', $user->id);
                return redirect('/');
            }else{
                return back()->with('fail', 'Password does not match');
            }
        }else{
            return back()->with('fail', 'This email is not registered.');
        }
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function homeView(){
        $data = array();
        $projects = Project::all()->count();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('home', compact('data', 'projects'));
    }

    public function profileView(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('profile', compact('data'));
    }

}
