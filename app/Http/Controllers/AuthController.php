<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request\validate;
use Redirect;
class AuthController extends Controller
{
    public function loginview(){
        Redirect::setIntendedUrl(url()->previous());
        return view('login');

    }
    public function login(LoginRequest $request){
        $input=$request->all();
    // $validated=$request->validated();
    // dd($validated);
        if(auth()->attempt(['email'=>$input['email'], 'password'=>$input['password']])){
       
         if(auth()->user()->role==1){
            //  return redirect('users');
            return response()->json([
                'status'=>true,
                'role'=>'admin',
               
                                      ]);
         }else{
            //  return redirect('index'); 
// return redirect()->intended();
            return response()->json([
                'status'=>true,
                'role'=>'user',
                'mylocation'=>redirect()->intended()->getTargetUrl()
               
                                      ]);
         }
        }else{
            return response()->json([
                'status'=>false,
                
               
                                      ]);
         // return redirect()->back()->withErrors([
         //    'incorrect'=>'Email or password are incorrect'
         // ]);
        }
     }

     public function logout(){
        Auth::logout();
        return redirect()->intended();
      //   return redirect('index');
     }
     public function register(){
        return view('register');
     }
     public function registerUser(RegisterRequest $request){
$user=new User();
$user->name=$request->name;
$user->phone=$request->phone;
$user->address=$request->address;
$user->email=$request->email;
$user->password=Hash::make($request->password);
$user->city=$request->city;
$user->state=$request->state;
$user->country=$request->country;
$image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('userImage',$imagename);
$user->image=$imagename;
$user->save();
Auth::login($user);
// return redirect('index');
    return response()->json([
        'status'=>true,
        'msg'=>'successfully',
        'mylocation'=>redirect()->intended()->getTargetUrl()
       
                              ]);

   

     }
}

