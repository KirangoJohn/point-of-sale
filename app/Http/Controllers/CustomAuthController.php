<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

class CustomAuthController extends Controller
{
    public function registration()
    {
        $rights = DB::table("rights")->pluck("rights", "id");
        return view('auth.registration',compact('rights'));
    }

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'is_permission' => 'required',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect()->back();
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'phone' => $data['phone'],
        'email' => $data['email'],
        'is_permission' => $data['is_permission'],
        'password' => Hash::make($data['password'])
      ]);
    }    
}
