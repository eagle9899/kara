<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Auth;
use Hash;


class UserProfileController extends Controller
{
   public function userprofile(){
        return view('user.profile.profile');
   }
   
   public function update(Request $request)
    { 
        $admin_data = Author::where('email',Auth::guard('author')->user()->email)->first();

        $request->validate([
            'email' => 'required|email',
            'user_name' => 'required',
            'telephone_number' => 'required',
            'address' => 'required',
             
        ]);

        if($request->password != ''){
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);

            $admin_data->password = Hash::make($request->password);
        }

        if($request->has('photo')){
            $request->validate([
                'photo' =>'image|mimes:jpg,jpeg,png,gif,svg,gif', 
            ]);            
            if(file_exists(public_path('userprofile/'.$admin_data->photo)) AND !empty($admin_data->photo)){
                unlink(public_path('userprofile/'.$admin_data->photo));
            }

            $extenstion = $request->file('photo')->extension();

            $finalname = 'user'. $request->user_name . time() .'.' .$extenstion; 
            //$finalname = date('YmdHis).'.' .$extenstion;
            $request->file('photo')->move(public_path('userprofile/'), $finalname);

            $admin_data->photo = $finalname;
        }

        $admin_data->name = $request->user_name;
        $admin_data->email = $request->email;
        $admin_data->phone = $request->telephone_number;
        $admin_data->address = $request->address;
        $admin_data->update();
        
        return redirect()->back()->with('success','Profile Data Saved Successfully');
    }
}
