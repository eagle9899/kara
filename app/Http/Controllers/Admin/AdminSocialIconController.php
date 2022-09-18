<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialIcon;

class AdminSocialIconController extends Controller
{
    public function socialiconview()
    {
        $socilaicon = SocialIcon::orderBy('id','desc')->get();
        return view('admin.socialitem.socialitem', compact('socilaicon'));
    } 

    public function socialiconastore(Request $request)
    {
        $ad_social_icon = new SocialIcon;
        $request->validate([  
            'social_icon' => 'required', 
            'social_url' => 'required', 
        ]);
        

        $ad_social_icon->icon = $request->social_icon;   
        $ad_social_icon->url = $request->social_url;   

        $ad_social_icon->save();
        return redirect()->back()->with('success','Social Icon added successfully');
    } 

    public function socilaiconedit(Request $request)
    {
       
        $ad_social_icon = SocialIcon::where('id', $request->id)->first();
        $request->validate([  
            'icon' => 'required', 
            'url' => 'required', 
        ]);
        

        $ad_social_icon->icon = $request->icon;   
        $ad_social_icon->url = $request->url;   

        $ad_social_icon->update();
        return redirect()->back()->with('success','Social Icon updated successfully');
    }

    public function socilaicondelete(Request $request)
    {
        $ad_social_icon = SocialIcon::where('id', $request->id)->first();

        $ad_social_icon->delete();
        return redirect()->back()->with('success','Social Icon deleted successfully');
    }
}
