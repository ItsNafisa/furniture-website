<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;
class HomeController extends Controller
{
  public function index(){
    $categories=Category::all();
    if(Auth::check()){
      if(auth()->user()->role==1){
        return redirect('users');
    }else{
      $latests=Product::latest()->take(4)->get();
   $discountedProducts=Product::where('discount','>','0')->get();
      return view('index',compact('latests','categories','discountedProducts'));
    }
    }else{
      $latests=Product::latest()->take(4)->get();
      $discountedProducts=Product::where('discount','>','0')->get();
      return view('index',compact('latests','categories','discountedProducts'));
    }
   
  }



  public function latestProduct(){
    $latest=Product::latest()->take(3)->get();
    // dd($latest);
    // return view('cart');
  }

  public function about(){
    return view('user.about');
  }
  public function contact(){
    return view('user.contact');
  }
  public function blog(){
    return view('user.blog');
  }
  public function services(){
    return view('user.services');
  }
  public function profile(){
    $user=Auth::user();
   
    return view('user.profile',compact('user'));
  }
}
