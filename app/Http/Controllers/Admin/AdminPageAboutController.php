<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageAboutFaq;

class AdminPageAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutview()
    {
        $aboutpage = PageAboutFaq::orderBy('id','asc')->get();
        // foreach ($aboutpage as $item)
        // echo $item->about_status;
        // $allsubscriber = Subscriber::orderBy('id','asc')->get();
        return view('admin.about.about', compact('aboutpage'));
    }
    public function faqview()
    {
        $faqpage = PageAboutFaq::orderBy('id', 'desc')->get();
        return view('admin.faq.faq', compact('faqpage'));
    }

    public function aboutadd(Request $request)
    {
        $add = PageAboutFaq::get();
        if (count($add) != NULL){ 
            return redirect()->back()->with('no more');
        }
        $add = new PageAboutFaq;
        $add->about_title = $request->abouttitle;
        $add->about_detail = $request->aboutdetail;
        $add->about_top_status = $request->showtop;
        $add->about_status = $request->showbottom;
        $add->save();
        return redirect()->back()->with('About added Successfully');
    }

    public function faqadd(Request $request)
    {
        $add = PageAboutFaq::orderBy('id', 'desc')->get();
        if (count($add) != NULL){ 
            return redirect()->back()->with('no more');
        }
        $request->validate([  
            'about_title' => 'required',
            'about_details' => 'required',  
        ]);
        $add = new PageAboutFaq;
        $add->faq_title = $request->faqtitle;
        $add->faq_detail = $request->faqdetail;
        $add->faq_status = $request->faqshow; 
        $add->save();
        return redirect()->back()->with('Faq added Successfully');
    }
    public function aboutupdate(Request $request, $id)
    {
        $aboutpage = PageAboutFaq::where('id',$id)->first();
        $request->validate([  
            'about_title' => 'required',
            'about_details' => 'required',  
        ]);
       
        $aboutpage->about_title = $request->about_title;  
        $aboutpage->about_top_status = $request->about_top_status;
        $aboutpage->about_status = $request->about_status;
        $aboutpage->about_detail = $request->about_details;
    
        $aboutpage->update();
        
        return redirect()->route('ad_about_ad_view')->with('success','About updated successfully');
    }

    public function faqupdate(Request $request, $id)
    {
        $aboutpage = PageAboutFaq::where('id',$id)->first();
        $request->validate([  
            'faq_title' => 'required',
            'faq_details' => 'required',  
        ]);
 
        $aboutpage->faq_title = $request->faq_title;  
        $aboutpage->faq_status = $request->faq_show;
        $aboutpage->faq_detail = $request->faq_details;
    
        $aboutpage->update();
        
        return redirect()->route('ad_faq_ad_view')->with('success','Faq updated successfully');
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
