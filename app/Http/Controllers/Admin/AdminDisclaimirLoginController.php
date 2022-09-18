<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisclaimirLogin;

class AdminDisclaimirLoginController extends Controller
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
public function disclaimirview()
    {
        $disclaimirpage = DisclaimirLogin::orderBy('id','desc')->get();
        
        return view('admin.disclaimir.disclaimir', compact('disclaimirpage'));
    }
    
    public function loginpageview()
    {
        $loginpage = DisclaimirLogin::orderBy('id','desc')->get();
        return view('admin.loginpage.loginpage', compact('loginpage'));
    }
    
    public function contactpageview()
    {
        $contactpage = DisclaimirLogin::orderBy('id','desc')->get();
      
        return view('admin.contact.contact', compact('contactpage'));
    }

    public function disclaimirstore(Request $request)
    {
        $disclaimer = DisclaimirLogin::orderBy('id', 'desc')->get();
        if (count($disclaimer) != NULL){ 
            return redirect()->back()->with('sd');
        }
        $request->validate([  
            'disclaimertitle' => 'required',
            'disclaimerdetail' => 'required',  
        ]);
        $disclaimer = new DisclaimirLogin();
        $disclaimer->disclaimir_title = $request->disclaimertitle;
        $disclaimer->disclaimir_detail = $request->disclaimerdetail;
        $disclaimer->disclaimir_status = $request->disclaimershow; 
        $disclaimer->save();
        return redirect()->back()->with('success', 'Disclaimer added Successfully');
    }
    
    public function loginpagestore(Request $request)
    {
        $loginpage = DisclaimirLogin::orderBy('id', 'desc')->get();
        if (count($loginpage) != NULL){ 
            return redirect()->back()->with('sd');
        }
        $request->validate([  
            'logintitle' => 'required',
            'logindetail' => 'required',  
        ]);
        $loginpage = new DisclaimirLogin();
        $loginpage->login_title = $request->logintitle;
        $loginpage->login_detail = $request->logindetail;
        $loginpage->login_status = $request->loginshow; 
        $loginpage->save();
        return redirect()->back()->with('success', 'Login data added Successfully');
    }
    
    public function contactpagestore(Request $request)
    {
        $loginpage = DisclaimirLogin::orderBy('id', 'desc')->get();
        if (count($loginpage) != NULL){ 
            return redirect()->back()->with('sd');
        }
        $request->validate([  
            'contacttitle' => 'required',
            'contactdetail' => 'required',  
        ]);
        $loginpage = new DisclaimirLogin();
        $loginpage->contact_title = $request->contacttitle;
        $loginpage->contact_detail = $request->contactdetail;
        $loginpage->contact_status = $request->contactstatus; 
        $loginpage->contact_map = $request->contactmap; 
        $loginpage->contact_top_status = $request->contacttopstatus; 
        $loginpage->save();
        return redirect()->back()->with('success', 'Contact data added Successfully');
    }
    public function disclaimirupdate(Request $request, $id)
    {
        $disclaimirpage = DisclaimirLogin::where('id',$id)->first();
        $request->validate([  
            'disclaimir_title' => 'required',
            'disclaimir_detail' => 'required',  
        ]);
 
        $disclaimirpage->disclaimir_title = $request->disclaimir_title;   
        $disclaimirpage->disclaimir_status = $request->disclaimir_status;
        $disclaimirpage->disclaimir_detail = $request->disclaimir_detail;
    
        $disclaimirpage->update();
        
        return redirect()->route('ad_disclaimir_ad_view')->with('success','Disclaimir Page updated successfully');
    }

    public function loginpageupdate(Request $request, $id)
    {
        $loginpage = DisclaimirLogin::where('id',$id)->first();
        $request->validate([  
            'login_title' => 'required',
            'login_detail' => 'required',  
        ]);
 
        $loginpage->login_title = $request->login_title;  
        $loginpage->login_status = $request->login_status;
        $loginpage->login_detail = $request->login_detail;
    
        $loginpage->update();
        
        return redirect()->route('ad_loginpage_ad_view')->with('success','Login Page updated successfully');
    }

    public function contactpageupdate(Request $request, $id)
    {
        $loginpage = DisclaimirLogin::where('id',$id)->first();
        $request->validate([  
            'contact_title' => 'required',
            'contact_detail' => 'required',  
            'contact_map' => 'required',  
        ]);
 
        $loginpage->contact_title = $request->contact_title;  
        $loginpage->contact_map = $request->contact_map;
        $loginpage->contact_top_status = $request->contact_top_status;
        $loginpage->contact_status = $request->contact_status;
        $loginpage->contact_detail = $request->contact_detail;
    
        $loginpage->update();
        
        return redirect()->route('ad_contactpage_ad_view')->with('success','Contact Page updated successfully');
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
