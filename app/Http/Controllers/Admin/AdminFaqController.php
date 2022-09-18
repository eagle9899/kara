<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{
    
    public function adminfaqview()
    {
        $faq_data = Faq::orderBy('id', 'asc')->get();
        return view('admin.faqpage.faqpage', compact('faq_data'));
    }

    public function adminfaqinsert(Request $request)
    { 
        $adminfaq = new Faq;
        $request->validate([  
            'faq_title' => 'required',
            'faq_detail' => 'required',  
        ]);
 
        $adminfaq->faq_title = $request->faq_title;  
        $adminfaq->faq_detail = $request->faq_detail; 
    
        $adminfaq->save();
        
        return redirect()->route('ad_faqpage_ad_view')->with('success','Category updated successfully');
    }

    public function adminfaqupdate(Request $request, $id)
    {
        $adminfaq = Faq::where('id',$id)->first();
        $request->validate([  
            'faq_title' => 'required',
            'faq_detail' => 'required',  
        ]);
 
        $adminfaq->faq_title = $request->faq_title;  
        $adminfaq->faq_detail = $request->faq_detail; 
    
        $adminfaq->update();
        
        return redirect()->route('ad_faqpage_ad_view')->with('success','Category updated successfully');
    }
    public function adminfaqdestroy( $id)
    {
        $adminfaq = Faq::where('id',$id)->first();
        
        $adminfaq->delete();
        
        return redirect()->route('ad_faqpage_ad_view')->with('success','Category updated successfully');
    }
}
