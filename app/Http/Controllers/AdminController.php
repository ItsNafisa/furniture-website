<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
class AdminController extends Controller
{
    public function home(){
      $userCount=User::where('role',0)->count();
  
        return view('admin.home',compact('userCount'));
    }

    public function users(){
        $users=User::where('role','0')->get();
        $userCount=User::where('role',0)->count();

        $earning=Order::get();
        $sum_earning=0;
        foreach($earning as $earn){
$sum_earning=$sum_earning+$earn['total_price'];
        }
        
        $all_order_item=OrderItem::get();
        $sales=0;
        foreach($all_order_item as $item){
$sales=$sales+$item['quantity'];
        }

        return view('admin.users',compact('users','userCount','sum_earning','sales'));
    }


    public function orders(){
        $orders=Order::where('order_status',0)->get();

        $userCount=User::where('role',0)->count();

        $earning=Order::get();
        $sum_earning=0;
        foreach($earning as $earn){
$sum_earning=$sum_earning+$earn['total_price'];
        }

        $all_order_item=OrderItem::get();
        $sales=0;
        foreach($all_order_item as $item){
$sales=$sales+$item['quantity'];
        }

        return view('admin.orders',compact('orders','userCount','sum_earning','sales'));
    }

    public function viewOrder($id){
        $orders=Order::where('id',$id)->first();
        return view('admin.orderView',compact('orders'));
    }

    public function updateOrder(Request $request,$id){
$orders=Order::find($id);
$orders->order_status=$request->order_status;
$orders->save();

return redirect('orders');
    }

   public function completedOrders(Request $request){
    $orders=Order::where('order_status',1)->get();

    $userCount=User::where('role',0)->count();

    $earning=Order::get();
        $sum_earning=0;
        foreach($earning as $earn){
$sum_earning=$sum_earning+$earn['total_price'];
        }

        $all_order_item=OrderItem::get();
        $sales=0;
        foreach($all_order_item as $item){
$sales=$sales+$item['quantity'];
        }
     
    return view('admin.completedOrders',compact('orders','userCount','sum_earning','sales'));
    }
    // public function products(){
    //     $products=Product::all();
    //     // return $users;
    //     return view('admin.product.index',compact('products'));
    // }

    // public function addProduct(){
    //     $categories=Category::all();
    //     return view('admin.product.addProduct',compact('categories'));
    // }
   
    // public function categories(){
    //     $categories=Category::all();
    //     return view('admin.category.index',compact('categories'));
    // }
    public function profile(){
        $profile=Auth::user();
        
        $userCount=User::where('role',0)->count();

        $earning=Order::get();
            $sum_earning=0;
            foreach($earning as $earn){
    $sum_earning=$sum_earning+$earn['total_price'];
            }
    
            $all_order_item=OrderItem::get();
            $sales=0;
            foreach($all_order_item as $item){
    $sales=$sales+$item['quantity'];
            }

        return view('admin.profile',compact('profile','sum_earning','userCount','sales'));
    }
    
}
