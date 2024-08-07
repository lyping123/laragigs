<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;


class UserController extends Controller
{
    //show register page
    public function create(){
        return view("register");
    }

    
    public function store(Request $request){
        $formFields=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required|confirmed|min:6'
        ]);

        //hash password
        $formFields['password']=bcrypt($formFields['password']);
        $formFields["otp"]=rand(100000,999999);
        $formFields["is_verified"]=0;
        
        $userdetail=User::create($formFields);
        Mail::to($userdetail->email)->send(new WelcomeMail($userdetail));
        //auth()->login($userdetail);
        return redirect('/')->with('message','The otp number has been sent to your email, please verify it to complete registration');
    }


    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been Logged Out');
        
    }


    public function login(){
        return view("login");
    }

    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);


        $userattemp=Auth::attempt(['email' => $request->input("email"), 'password' => $request->input("password"), 'is_verified' => 1]);
        //dd($request->remember);
        
        if($userattemp){
            $request->session()->regenerate();

            return redirect("/")->with('message','Login success');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput("email");
    }
    
    public function registerWithemail(Request $request){
        $formFields=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required|confirmed|min:6'
        ]);

        $user=User::create([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'password' => bcrypt($formFields['password']),
        ]);
        event(new Registered($user));

        Auth::login($user);
    }

    public function verifyEmailPage(User $user){
        return view('verify-mail',[
            'user' => $user
        ]);
    }
    public function verifyEmail(User $user,Request $request){
        if($user->otp==$request->otp){
            $user->update(['is_verified'=>1]);
            return redirect('/login')->with('message','Email verified successfully, Please login to continue');
        }else{
            return back()->withErrors(['otp'=>'Invalid OTP, Please try again']);
        }
        
    }
}
