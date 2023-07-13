<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminloginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        return view('admin.login');
    }
    public function adminLogin(AdminloginRequest $request)
    {
        $request->validated();
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }


    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("registration")->withSuccess('You have signed-in');
    }

    public function registration()
    {
        return view('admin.registration');
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            //dd(auth()->user());
            $TotalUsers= User::count();
            return view('admin.dashboard')->with(['TotalUsers'=>$TotalUsers]);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
