<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontsetting = Setting::where('id',1)->first();
        return view('admin.setting.setting', compact('frontsetting'));
    }
    public function setting(Request $request)
    {
        $setting_data = Setting::where('id',1)->first();

        $request->validate([
            'showposts' => 'required|numeric|min:1',
            'mostviews' => 'required|numeric|min:1',
            'showsimilar' => 'required|numeric|min:1', 
        ]); 

        if($request->has('logo')){
            $request->validate([
                'logo' =>'image|mimes:jpg,jpeg,png,gif', 
            ]);            
            if(file_exists(public_path('uploads/icon/'.$setting_data->logo)) AND !empty($setting_data->logo)){
                unlink(public_path('uploads/icon/'.$setting_data->logo));
            } 
            $extenstion = $request->file('logo')->extension(); 
            $finalname = 'logo'.'.' .$extenstion; 
            $request->file('logo')->move(public_path('uploads/icon/'), $finalname); 
            $setting_data->logo = $finalname;
        }
        
        if($request->has('favicon')){
            $request->validate([
                'favicon' =>'image|mimes:jpg,jpeg,png,gif', 
            ]);            
            if(file_exists(public_path('uploads/icon/'.$setting_data->favicon)) AND !empty($setting_data->favicon)){
                unlink(public_path('uploads/icon/'.$setting_data->favicon));
            } 
            $extenstion = $request->file('favicon')->extension(); 
            $finalname = 'favicon'.'.' .$extenstion; 
            $request->file('favicon')->move(public_path('uploads/icon/'), $finalname);

            $setting_data->favicon = $finalname;
        }

        $setting_data->show_post = $request->showposts;
        $setting_data->show_most_views = $request->mostviews;
        $setting_data->show_similar = $request->showsimilar; 
        if( $request->theme1 =='FFFFFF' OR $request->theme2 =='FFFFFF'){
            $setting_data->theme_1 = 0; 
            $setting_data->theme_2 = 0; 
        }
        else{
            $setting_data->theme_1 = $request->theme1;
            $setting_data->theme_2 = $request->theme2;
        }

        $setting_data->update();
        
        return redirect()->back()->with('success','Setting Data Updated Successfully');
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
    public function update(Request $request, $id)
    {
        //
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
