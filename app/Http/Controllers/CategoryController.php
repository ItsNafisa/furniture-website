<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request\validate;
use App\Models\User;
use App\Models\OrderItem;
use Session;
use File;
class CategoryController extends Controller
{

    public function index(){
        $categories=Category::all();

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
        return view('admin.category.index',compact('categories','userCount','sum_earning','sales'));
    }

    public function create(){

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

        return view('admin.category.create',compact('userCount','sum_earning','sales'));
    }
   
    public function store(CategoryRequest $request){
        $data=new Category;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('categoryImage',$imagename);
        $data->image=$imagename;
        $data->name=$request->name;
       $data->slug=Str::slug($request->name);
       $saved=$data->save();
       if($saved){
        $categories=Category::all();

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
        // $request->session()->forget('category_deleted_successfully');
        // $request->session()->forget('category_updated_successfully');
        // Session::flash('category_added_successfully','Category added successfully');
       $request->session()->now('category_added_successfully','Category added successfully');
        return view('admin.category.index',compact('categories','userCount','sum_earning','sales'));
       }else{
return redirect()->back();
       }
     
    }

    public function edit($slug){
$category=Category::where('slug',$slug)->first();
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

return view('admin.category.update',compact('category','userCount','sum_earning','sales'));
    }

    public function update($slug,Request $request){
        $category=Category::where('slug',$slug)->first();
      if($request->image){
        $path='categoryImage/'.$category->image;
        if(File::exists($path)){
           
            File::delete($path);
        }

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('categoryImage',$imagename);
        $category->image=$imagename;
      }
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
     $saved=$category->save();
     if($saved){
        $categories=Category::all();

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
     
        $request->session()->now('category_updated_successfully','Category updated successfully');
        return view('admin.category.index',compact('categories','userCount','sum_earning','sales'));
     }else{
return redirect()->back();
     }
      
            }


            public function categoryDetail($id){
$category=Category::find($id);
$categoryName=$category->name;
$products=$category->products;
return view('shop',compact('products','categoryName'));
            }

         public function delete($id,Request $request){
            $cat=Category::find($id);
          
                $path='categoryImage/'.$cat->image;
                if(File::exists($path)){
                   
                    File::delete($path);
                }
            
         $category=Category::where('id',$id)->delete();
        
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

        $categories=Category::all();
//         $request->session()->forget('category_added_successfully');
//         $request->session()->forget('category_updated_successfully');
// Session::flash('category_deleted_successfully','Category deleted successfully');
$request->session()->now('category_deleted_successfully','Category deleted successfully');
        return view('admin.category.index',compact('categories','userCount','sum_earning','sales'));
          
// return $id;
         }
}
