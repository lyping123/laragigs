<?php

namespace App\Http\Controllers;

use App\Models\members;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class membersController extends Controller
{

    public function showfeedback(){
        return view("feedbacklist",[
            "members"=>members::all()
        ]);
    }
    public function showcreate(){
        return view("membersurvay");
    }

    public function create(Request $request){
        
        $formFields=$request->validate([
            "name"=>"required",
            "email"=>["required","email"],
            "age"=>"required",
            "feedback"=>"required",
            "rate"=>"required",
        ]);
        
        members::create($formFields);
        return redirect("/member/add")->with('message','member feedback submited successfully');
    }
}
