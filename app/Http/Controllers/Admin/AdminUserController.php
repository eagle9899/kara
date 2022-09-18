<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\validation\Rule;
use App\Models\User;
use App\Mail\Websitemail;
use Hash;
use Auth;
use Carbon\Carbon;

class AdminUserController extends Controller
{
    public function usersview(){
      
        $users = User::orderBy('id', 'desc')->get();
        return view ('admin.users.users', compact('users'));
    }
    public function userscreate(){
        
        return view('admin.users.add_user') ;
    }
    
    public function usersstore(Request $request)
    { 
        $ad_user = new User();

        $request->validate([
            'email' => 'required|email',
            'user_name' => 'required',
            'telephone_number' => 'required',
            'address' => 'required',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $password = Hash::make($request->password);
        

        if($request->has('photo')){
            $request->validate([
                'photo' =>'image|mimes:jpg,jpeg,png,gif,svg,gif', 
            ]);            
           
            $extenstion = $request->file('photo')->extension();

            $finalname = 'user'. $request->user_name . time() .'.' .$extenstion; 
            $request->file('photo')->move(public_path('userprofile/'.$ad_user->photo )); 
            $ad_user->photo = $finalname;
        }
        $token = hash('sha256', time()); 

        $ad_user->name = $request->user_name;
        $ad_user->email = $request->email;
        $ad_user->phone = $request->telephone_number;
        $ad_user->password = $password;
        $ad_user->address = $request->address;
        $ad_user->status = 'Pending'; 
        $ad_user->edit = $request->canedit;
        $ad_user->eliminate = $request->candelete;
        $ad_user->share_subbscriber = $request->share_user;
        
        $ad_user->remember_token = $token.'sa';
        $verificationlinek = url('user/verify/'.$token.'sa/'.$request->email);
        
        $subject = 'Subject:' .'Email Verification Message';
        $vmessage = 'dear user: <b>' . $request->user_name . '</b><br>';
        $vmessage .= 'This is email is for account verifying. If you want to our permanent user who can post everything 
        which our termms and conditions allow that and you have full access to your account without any limitation.
        when you have post a new post in our website, you shoudl pay a less of that post for example 25 percent of that money 
        you have token from the owner of that post. as we mentioned above this email there is no limitation you can have posts as you want 
        in any time.
        <br><strong>Thank you so much.<br>By regard '. 'website name' . ' </em></strong>';
        $vmessage .= '<a type="button" class="btn btn-primary" href="'. $verificationlinek .'">';
        $vmessage .= 'Verify us a user'.'</a><br>';
        $vmessage .= 'Your password is <i>' .$request->password. '</i>, after login to the system please change your password';
           
       \Mail::to($request->email)->send(new Websitemail($subject, $vmessage));

        $ad_user->save();
        
        return redirect()->route('ad_user_ad_view')->with('success','User Added successfully and email was also sent to the user Successfully');

    }

    public function usersedit($id)
    { 
        $single_user = User::where('id',$id)->first(); 
        return view('admin.users.edit_user', compact('single_user'));
    }

    

    public function usersupdate(Request $request, $id)
    {
        $ad_user = User::where('id', $id)->first();

        $request->validate([
            'user_name' => 'required',
            'telephone_number' => 'required',
            'address' => 'required', 
            'email' => [
                'required',
                'email',
                Rule::unique('Users')->ignore($ad_user->id)
            ],
        ]);
        
        if($request->password != ''){
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);

            $ad_user->password = Hash::make($request->password);
        }
        
        if($request->has('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif,svg,gif', 
            ]);            
            if(file_exists(public_path('userprofile/'.$ad_user->photo)) AND !empty($ad_user->photo)){
                unlink(public_path('userprofile/'.$ad_user->photo));
            }

            $extenstion = $request->file('photo')->extension();

            $finalname = 'user'. $request->user_name . time() . '.' .$extenstion;
            //$finalname = date('YmdHis).'.' .$extenstion;
            $request->file('photo')->move(public_path('userprofile/'), $finalname);

            $ad_user->photo = $finalname;
        }
        

        $ad_user->name = $request->user_name;
        $ad_user->email = $request->email;
        $ad_user->phone = $request->telephone_number; 
        $ad_user->address = $request->address; 
        $ad_user->edit = $request->canedit;
  
        $ad_user->eliminate = $request->candelete;
        $ad_user->share_subbscriber = $request->share_user;

        $ad_user->update();
        
        return redirect()->route('ad_user_ad_view')->with('success','User Updated successfully');

    }

    public function usersdelete($id)
    {
        $ad_user = User::where('id',$id)->first();
        
        if($ad_user->photo != NULL){
            unlink(public_path('userprofile/'.$ad_user->photo));
        }
        
        $ad_user->delete();
        return redirect()->back()->with('success', 'User Deleted successfully');
    }
}
