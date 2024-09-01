<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request\validate;
use Auth;
use Session;
use File;
class ProductController extends Controller
{
    public function index(){
       
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
        return view('admin.product.index',compact('products','userCount','sum_earning','sales'));
    }

    public function create(){
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

             return view('admin.product.addProduct',compact('categories','userCount','sum_earning','sales'));
    }

    public function store(ProductRequest $request){
        $data=new Product;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productImage',$imagename);
        $data->image=$imagename;
        $data->name=$request->name;
        $data->slug=Str::slug($request->name);
        $data->price=$request->price;
       if($request->discount){
        $data->discount=$request->discount;
        $discount="0.".$request->discount;
        $multiply=$request->price * $discount;
        $sub=$request->price - $multiply;
                $data->price_after_discounting=$sub;
       }else{
        $data->discount=0;
        $data->price_after_discounting=0;
       }
        $data->description=$request->description;
        $data->stock_status=$request->stock_status;
        $data->category_id=$request->category_id;
        $data->quantity=$request->quantity;

       

        $data->save();

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
        // $request->session()->forget('product_deleted_successfully');
        // $request->session()->forget('product_updated_successfully');
        // Session::flash('product_added_successfully','Product added successfully');
        $request->session()->now('product_added_successfully','Product added successfully');
        return view('admin.product.index',compact('products','userCount','sum_earning','sales'));
    }


    public function edit($slug){
        $product=Product::where('slug',$slug)->first();
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

        return view('admin.product.update',compact('product','categories','userCount','sum_earning','sales'));
            }

            public function update($slug,Request $request){
                $product=Product::where('slug',$slug)->first();
              if($request->image){

                $path='productImage/'.$product->image;
                if(File::exists($path)){
                    File::delete($path);
                }

                $image=$request->image;
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('productImage',$imagename);
                $product->image=$imagename;
              }
                $product->name=$request->name;
                $product->slug=Str::slug($request->name);
                $product->price=$request->price;
                if($request->discount){
                    $product->discount=$request->discount;
                    $discount="0.".$request->discount;
  $multiply=$request->price * $discount;
  $sub=$request->price - $multiply;
                  $product->price_after_discounting=$sub;
                  // return $sub;
                }else{
                  $product->discount=0;
                  $product->price_after_discounting=0;
                }
// if($request->discount > 0 && $request->discount != null){
//   $discount="0.".$request->discount;
//   $multiply=$request->price * $discount;
//   $sub=$request->price - $multiply;
//                   $product->price_after_discounting=$sub;
// }
               
                
                $product->description=$request->description;
                $product->quantity=$request->quantity;
                $product->stock_status=$request->stock_status;
                $product->category_id=$request->category_id;
                $product->save();

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
                // $request->session()->forget('product_added_successfully');
                // $request->session()->forget('product_deleted_successfully');
                // Session::flash('product_updated_successfully','Product updated successfully');
                $request->session()->now('product_updated_successfully','Product updated successfully');
                return view('admin.product.index',compact('products','userCount','sum_earning','sales'));
                    }

                    public function delete($id,Request $request){
$pro=Product::find($id);
                      $path='productImage/'.$pro->image;
                      if(File::exists($path)){
                         
                          File::delete($path);
                      }

                      $product=Product::where('id',$id)->delete();
                   
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
             
                     $products=Product::orderBy('created_at','desc')->get();
                    //  $request->session()->forget('product_updated_successfully');
                    //  $request->session()->forget('product_added_successfully');
                    //  Session::flash('product_deleted_successfully','Product deleted successfully');
                    $request->session()->now('product_deleted_successfully','Product deleted successfully');
                     return view('admin.product.index',compact('products','userCount','sum_earning','sales'));
                   
             // return $id;
                      }


//add product to the cart
// public function cartpage($id,$sectype,Request $request){
                    public function cartpage(Request $request){
                     
                    if(Cart::where('product_id',$request->id)->where('user_id',Auth::user()->id)->exists()){
                      // $request->session()->flash('success','Product already added to your shopping cart');
                      // return redirect()->to(app('url')->previous()."#latestsection");
                      return response()->json([
                        'status'=>true,
                        'msg'=>'Product already added to your shopping cart',
                        'section'=>$request->section_id,
                        'exsists'=>true,
                        'product_id'=>$request->id
                                              ]);
                    }else if(Product::where('id',$request->id)->where('discount','>','0')->exists()){
                      
                      
                     $product=Product::where('id',$request->id)->first();
$discount="0.".$product['discount'];
// return $discount;
$multiply=$product['price'] * $discount;
$sub=$product['price']-$multiply;
// return $sub;
                      $cart= new Cart;
                      $cart->product_id=$request->id;
                      $cart->user_id=Auth::user()->id;
                      $cart->quantity=1;
                      $cart->price_after_discount=$sub;
                      $cart->price=$product['price'];
                      $cart->total_price=$sub;
                      $cart->save();
                      // $request->session()->flash('success','Product added successfully to your shopping cart');
                 
                      // return redirect()->to(app('url')->previous()."#latestsection");
                    }else{
                     
                      $product=Product::where('id',$request->id)->first();
                        $cart= new Cart;
                        $cart->product_id=$request->id;
                        $cart->user_id=Auth::user()->id;
                        $cart->quantity=1;
                        $cart->price_after_discount=0;
                        $cart->price=$product['price'];
                        $cart->total_price=$product['price'];
                        $cart->save();
                      
                        // $request->session()->flash('success','Product added successfully to your shopping cart');
                   
                        // return redirect()->to(app('url')->previous()."#latestsection");
                      }
                      $to=Cart::where('user_id',Auth::user()->id)->get();
                      $sum=0;
                      foreach($to as $t){
                       
                        $sum=$sum+$t['total_price'];
                         
                      }
                    
                      return response()->json([
'status'=>true,
'msg'=>'Product added successfully to your shopping cart',
'section'=>$request->section_id,
'exsists'=>false,
'product_id'=>$request->id
                      ]);
                    
                      
                      // if($sectype=="new"){
                      //   $request->session()->flash('successNew','Product added successfully to your shopping cart');
                      //   return redirect()->to(app('url')->previous()."#latestsection");
                      // }else{
                      //   $request->session()->flash('successDiscount','Product added successfully to your shopping cart');
                      //   return redirect()->to(app('url')->previous()."#discountsection");
                      // }
                  
                      }
                      // public function cartpage($id,Request $request){
                      //   if(Cart::where('product_id',$id)->exists()){
                      //     $request->session()->flash('success','Product already added to your shopping cart');
                      //     return redirect()->to(app('url')->previous()."#latestsection");
                      //   }else{
                      //       $cart= new Cart;
                      //       $cart->product_id=$id;
                      //       $cart->user_id=Auth::user()->id;
                      //       $cart->quantity=1;
                      //       $cart->save();
                      //       $request->session()->flash('success','Product added successfully to your shopping cart');
                       
                      //       return redirect()->to(app('url')->previous()."#latestsection");
                      //     }
                      //     }

//cart screen
                      public function mycart(){
                        $cartitems=Cart::where('user_id',Auth::user()->id)->get();
                        $to=Cart::where('user_id',Auth::user()->id)->get();
                        $sum=0;
                        foreach($to as $t){
                         
                          $sum=$sum+$t['total_price'];
                           
                        }
                        return view('cart',compact('cartitems','sum')); 
                       
                      }

                      public function updateCart(Request $request){
                        $myproduct=Cart::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->first();
                        $myproduct['quantity']= $request->quantity;
                        if($myproduct['price_after_discount'] >0){
                          $myproduct['total_price']= $myproduct['price_after_discount'];
                          $myproduct->save();
                          $myproduct['total_price']=$myproduct['quantity']* $myproduct['price_after_discount'];
                        $myproduct->save(); 
                        }else{
                          $myproduct['total_price']= $myproduct['price'];
                          $myproduct->save();
                          $myproduct['total_price']=$myproduct['quantity']* $myproduct['price'];
                          $myproduct->save();
                        }
                        $to=Cart::where('user_id',Auth::user()->id)->get();
                        $sum=0;
                        foreach($to as $t){
                         
                          $sum=$sum+$t['total_price'];
                           
                        }
                        return response()->json([
                          'status'=>true,
                          'msg'=>'updated successffully',
                          'total_price'=>$sum,
                          'price'=>$myproduct['total_price'],
                          'product_id'=>$request->product_id
                                                ]);
                        
                      }

                      public function increaseCart(Request $request){
                  $myproduct=Cart::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->first();
                 
                 
                  
                  $qu=$myproduct['quantity'];
                  $myproduct['quantity']= $qu+ 1;
                  if($myproduct['price_after_discount'] >0){
                    $myproduct['total_price']= $myproduct['price_after_discount'];
                    $myproduct->save();
                    $myproduct['total_price']=$myproduct['quantity']* $myproduct['price_after_discount'];
                  $myproduct->save(); 
                  }else{
                    $myproduct['total_price']= $myproduct['price'];
                    $myproduct->save();
                    $myproduct['total_price']=$myproduct['quantity']* $myproduct['price'];
                    $myproduct->save();
                  }
                  $to=Cart::where('user_id',Auth::user()->id)->get();
                  $sum=0;
                  foreach($to as $t){
                   
                    $sum=$sum+$t['total_price'];
                     
                  }
               
                  return redirect()->to(app('url')->previous()."#cartsection")->with(['sum','sum']);
                      }

                   public function decreaseCart(Request $request){
                    $myproduct=Cart::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->first();
                    $qu=$myproduct['quantity'];
                    $myproduct['quantity']= $qu- 1;
                    if($myproduct['price_after_discount'] >0){
                      $myproduct['total_price']= $myproduct['price_after_discount'];
                      $myproduct->save();
                      $myproduct['total_price']=$myproduct['quantity']* $myproduct['price_after_discount'];
                    $myproduct->save(); 
                    }else{
                      $myproduct['total_price']= $myproduct['price'];
                      $myproduct->save();
                      $myproduct['total_price']=$myproduct['quantity']* $myproduct['price'];
                      $myproduct->save();
                    }
                    
                    $to=Cart::where('user_id',Auth::user()->id)->get();
                  $sum=0;
                  foreach($to as $t){
                   
                    $sum=$sum+$t['total_price'];
                     
                  }
                    return redirect()->to(app('url')->previous()."#cartsection")->with(['sum','sum']);
                   }

                   public function checkout(){
                    $cartsitem=Cart::where('user_id',Auth::user()->id)->get();
                    $sum=0;
                    foreach($cartsitem as $t){
                     
                      $sum=$sum+$t['total_price'];
                       
                    }
                    return view('user.checkout',compact('cartsitem','sum'));

                   }

                   public function order(Request $request){
                   
                    $order=new order();
                    $order->name=$request->name;
                    $order->user_id=Auth::user()->id;
                    $order->email=$request->email;
                    $order->phone=$request->phone;
                    $order->address=$request->address;
                    $order->city=$request->city;
                    $order->state=$request->state;
                    $order->country=$request->country;
                    $order->message=$request->message;
                    $carts=Cart::where('user_id',Auth::user()->id)->get();
                    $sum=0;
                    foreach($carts as $t){
                     
                      $sum=$sum+$t['total_price'];
                       
                    }
                    $order->total_price=$sum;
                    $order->save();
                    $cartitems=Cart::where('user_id',Auth::user()->id)->get();
                    foreach($cartitems as $item){
                      $orderitem=new OrderItem();
                      $orderitem->order_id=$order->id;
                      $orderitem->product_id=$item->product_id;
                      $orderitem->quantity=$item->quantity;
                      if($item->price_after_discount != 0){
                        $orderitem->price=$item->price_after_discount;
                      }else{
                        $orderitem->price=$item->price;
                      }
                    
                      $orderitem->save();
                    }
//                     $country=Cart::where('user_id',Auth::user()->id)->get();
//                     foreach($all_cart as $cart){
//                       $order=new Order();
//                       $order->payment_method=$request->payment_method;
//                       $order->payment_status="Pending";
//                       $order->order_status="pending";
//                       $order->user_id=Auth::user()->id;
//                       $order->product_id=$cart['product_id'];
//                       $order->save();
//                       Cart::where('user_id',Auth::user()->id)->delete();
//                     }
$cartitems=Cart::where('user_id',Auth::user()->id)->get();
Cart::destroy($cartitems);

return view('user.thankyou');

                   }

                   public function remove(Request $request){
                    // Cart::destroy($request->id);
                    Cart::destroy($request->item_id);
                    $to=Cart::where('user_id',Auth::user()->id)->get();
                    $sum=0;
                    foreach($to as $t){
                     
                      $sum=$sum+$t['total_price'];
                       
                    }
                    return response()->json([
                      'status'=>true,
                      'msg'=>'removed successffully',
                      'data'=>$request->item_id,
                      'price'=>$sum
                                            ]);
                    // return redirect()->back() ;
                   }

                   public function orderHistory(){
                  $orders=Order::where('user_id',Auth::user()->id)->get();
                //  $orders->groupBy('created_at');
                 
                  return view('user.orderhistory',compact('orders'));
                   }


                   public function viewOrder($id){
                   
                    $orders=Order::where('id',$id)->where('user_id',Auth::user()->id)->first();
                    // return $orders;
                    return view('user.viewOrder',compact('orders'));
                   }
}
