
@extends('admin.home')
@section('mybody')
<div class="cardHeader">
                        <h2>Your Profile</h2>
                        
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Email</td>
                                <td>Country</td>
                            </tr>
                        </thead>

                        <tbody>
                           
                            <tr>
                               
       <td>{{$profile['name']}}</td>
 <td><img src="{{asset('UserImage/'.$profile['image'])}}" style="height:70px;width:70px;border-radius:50%;"></td>
 <td>{{$profile['email']}}</td>
 <td>{{$profile['country']}}</td>                
                            </tr>

                         
                        </tbody>
                    </table>
                  
@endsection('mybody')  
