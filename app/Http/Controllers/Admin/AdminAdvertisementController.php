<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;



class AdminAdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertise = Advertisement::orderBy('id','desc')->get();
       
        return view('admin.advertise.ads_view', compact('advertise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.advertise.ads_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $ad_data = new Advertisement;
        $request->validate([ 
            'position' => 'required',
            'status' => 'required',
            'rate' => 'required',
            'currency' => 'required',
         ]//,[
        //     'rate.required'=>'این بخش الزامی است',
        //     'currency.required'=>'این بخش الزامی است',
        // ]
        );
        if($request->has('photo')){
            $request->validate([
                'photo' =>'image|mimes:jpg,jpeg,png,gif', 
            ]);            
           
            $extenstion = $request->file('photo')->extension();

            $finalname = 'advertise'. time() .'.' .$extenstion;
            //$finalname = date('YmdHis).'.' .$extenstion;
            $request->file('photo')->move(public_path('uploads/'), $finalname);

            $ad_data->photo = $finalname;
        }

        $ad_data->url = $request->url; 
        $ad_data->position = $request->position;
        $ad_data->status = $request->status;
        $ad_data->rate = $request->rate;
        $ad_data->currency = $request->currency;

        $ad_data->save();
        
        return redirect()->route('ad_home_ad_view')->with('success','Advertise added successfully');
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
        $advertise = Advertisement::where('id',$id)->first();
        return view('admin.advertise.ads_edit', compact('advertise'));
                
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
        $advertise = Advertisement::where('id',$id)->first();
        $request->validate([
            'position' => 'required',
            'status' => 'required',
            'rate' => 'required',
            'currency' => 'required',
            
        ]);
    
        if($request->has('photo')){
            $request->validate([
                'photo' =>'image|mimes:jpg,jpeg,png,gif', 
            ]);            
            if(file_exists(public_path('uploads/'.$advertise->photo)) AND !empty($advertise->photo)){
                unlink(public_path('uploads/'.$advertise->photo));
            }
    
            $extenstion = $request->file('photo')->extension();
    
            $now = time();
            $finalname = 'advertise'.$now.'.' .$extenstion;
            //$finalname = date('YmdHis).'.' .$extenstion;
            $request->file('photo')->move(public_path('uploads/'), $finalname);
    
            $advertise->photo = $finalname;
        }
    
        $advertise->url = $request->url;
        $advertise->position = $request->position;
        $advertise->status = $request->status;
        $advertise->rate = $request->rate;
        $advertise->currency = $request->currency;
        $advertise->update();
        
        return redirect()->route('ad_home_ad_view')->with('success','Advertise Data Updated Successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertise = Advertisement::where('id',$id)->first();
        if(file_exists(public_path('uploads/'.$advertise->photo)) AND !empty($advertise->photo)){
            unlink(public_path('uploads/'.$advertise->photo));
        }
        $advertise->delete();

        return redirect()->back()->with('success', 'Advertise and it\'s data Deleted successfully');
    }
}
