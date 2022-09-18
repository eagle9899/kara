<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.profile');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
     
    public function update(Request $request)
    { 
        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'email' => 'required|email',
            'name' => 'required'
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
                'photo' =>'image|mimes:jpg,jpeg,png,gif', 
            ]);            
            if(file_exists(public_path('userprofile/'.$admin_data->photo)) AND !empty($admin_data->photo)){
                unlink(public_path('userprofile/'.$admin_data->photo));
            }

            $extenstion = $request->file('photo')->extension();

            $finalname = 'admin'.'.' .$extenstion;
            //$finalname = date('YmdHis).'.' .$extenstion;
            $request->file('photo')->move(public_path('userprofile/'), $finalname);

            $admin_data->photo = $finalname;
        }

        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();
        
        return redirect()->back()->with('success','Profile Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
