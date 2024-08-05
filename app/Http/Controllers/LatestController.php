<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Latest;
use Auth;
class LatestController extends Controller
{
    public function index(){
        return view('admin.latest.index');
    }
    public function store(Request $request){
        $data=new Latest;
$image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('latestimage',$imagename);
$data->image=$imagename;
$data->name=$request->name;
$data->price=$request->price;
$data->description=$request->description;
$data->save();
        return view('admin.latest.index');
    }

    public function home(){
       
    $products=Latest::all();
    // return $products;
    return view('home',compact('products'));
    }

    public function userhome(){
        return view('index');
    }
    public function adminhome(){
        return view('adminhome');
    }
    // public function login(Request $request){
    //    $input=$request->all();
    // //    $this->validate($request,[
    // //     'email'=>'required|email',
    // //     'password'=>'required'
    // //    ]);
    //    if(auth()->attempt(['email'=>$input['email'], 'password'=>$input['password']])){
    //     // if(auth()->user()->role=='admin'){
    //     //     return view('adminhome');
    //     // }else if(auth()->user()->role=='user'){
    //     //     return view('userhome');
    //     // }else{
    //     //     return view('home');
    //     // }
    //     if(auth()->user()->role==1){
    //         return redirect('latest');
    //     }else{
    //         return redirect('index'); 
    //     }
    //    }else{
    //     return redirect('/');
    //    }
    // }
}


