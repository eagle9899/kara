<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagePrivacyTerms;

class AdminTermsPrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function termsview()
    {
        $termspage = PagePrivacyTerms::orderBy('id', 'desc')->get();
        
        return view('admin.terms.terms', compact('termspage'));
    }
    
    public function privacyview()
    {
        $privacypage = PagePrivacyTerms::orderBy('id', 'desc')->get();
        return view('admin.privacy.privacy', compact('privacypage'));
    }

    public function termsadd(Request $request)
    {
        $terms = PagePrivacyTerms::orderBy('id', 'desc')->get();
        if (count($terms) != NULL){ 
            return redirect()->back()->with('no more');
        }
        $request->validate([  
            'termstitle' => 'required',
            'termsdetail' => 'required',  
        ]);
        $terms = new PagePrivacyTerms();
        $terms->terms_title = $request->termstitle;
        $terms->terms_detail = $request->termsdetail;
        $terms->terms_status = $request->termsshow; 
        $terms->save();
        return redirect()->back()->with('terms', 'Terms added Successfully');
    }

    public function privacyadd(Request $request)
    {
        $terms = PagePrivacyTerms::orderBy('id', 'desc')->get();
        if (count($add) != NULL){ 
            return redirect()->back()->with('sd');
        }
        $request->validate([  
            'termstitle' => 'required',
            'termsdetail' => 'required',  
        ]);
        $terms = new PageAboutFaq;
        $terms->terms_title = $request->termstitle;
        $terms->terms_detail = $request->termsdetail;
        $terms->terms_status = $request->termsshow; 
        $terms->save();
        return redirect()->back()->with('terms', 'Terms added Successfully');
    }
    public function termsupdate(Request $request, $id)
    {
        $termspage = PagePrivacyTerms::where('id',$id)->first();
        $request->validate([  
            'terms_title' => 'required',
            'terms_details' => 'required',  
        ]);
 
        $termspage->terms_title = $request->terms_title;   
        $termspage->terms_status = $request->terms_status;
        $termspage->terms_detail = $request->terms_details;
    
        $termspage->update();
        
        return redirect()->route('ad_terms_ad_view')->with('success','Terms and Condition updated successfully');
    }

    public function privacyupdate(Request $request, $id)
    {
        $termspage = PagePrivacyTerms::where('id',$id)->first();
        $request->validate([  
            'privacy_title' => 'required',
            'privacy_detail' => 'required',  
        ]);
 
        $termspage->privacy_title = $request->privacy_title;  
        $termspage->privacy_status = $request->privacy_status;
        $termspage->privacy_detail = $request->privacy_detail;
    
        $termspage->update();
        
        return redirect()->route('ad_privacy_ad_view')->with('success','Privacy and Policy updated successfully');
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
