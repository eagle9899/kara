<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShareAble;

class AdminShareAbleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shareableview()
    {
        $shareableicon = ShareAble::orderBy('id','desc')->get();
        return view('admin.shareable.shareable', compact('shareableicon'));
    } 

    public function shareablestore(Request $request)
    {
        $ad_share_icon = new ShareAble;
        $request->validate([  
            'share_name' => 'required', 
            'share_icon' => 'required', 
            'share_url' => 'required', 
        ]);
        

        $ad_share_icon->name = $request->share_name;   
        $ad_share_icon->icon = $request->share_icon;   
        $ad_share_icon->url = $request->share_url;   

        $ad_share_icon->save();
        return redirect()->back()->with('success','Share Icon added successfully');
    } 

    public function shareableedit(Request $request)
    {
       
        $ad_share_icon = ShareAble::where('id', $request->id)->first();
        $request->validate([  
            'name' => 'required', 
            'icon' => 'required', 
            'url' => 'required', 
        ]);
        

        $ad_share_icon->name = $request->name;   
        $ad_share_icon->icon = $request->icon;   
        $ad_share_icon->url = $request->url;   

        $ad_share_icon->update();
        return redirect()->back()->with('success','Share Icon updated successfully');
    }

    public function shareabledelete(Request $request)
    {
        $ad_share_icon = ShareAble::where('id', $request->id)->first();

        $ad_share_icon->delete();
        return redirect()->back()->with('success','Share Icon deleted successfully');
    }

    public function index()
    {
        //
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
