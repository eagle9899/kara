<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurAddress;
class AdminOurAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = OurAddress::get();

        return view('admin.ouraddress.address', compact('addresses'));
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
        $ouraddress = new OurAddress;
        $request->validate([  
            'address' => 'required',
            'phone' => 'required', 
            'email' => 'required|email', 
        ]); 
        $ouraddress->address = $request->address;  
        $ouraddress->email = $request->email;
        $ouraddress->phone = $request->phone; 
    
        $ouraddress->save();
        
        return redirect()->back()->with('success','Address added successfully');
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
        $ouraddress = OurAddress::where('id',$id)->first();
        $request->validate([  
            'address' => 'required',
            'phone' => 'required',  
            'email' => 'required|email',  
        ]);
  
        $ouraddress->address = $request->address;  
        $ouraddress->phone = $request->phone;
        $ouraddress->email = $request->email; 
    
        $ouraddress->update();
        
        return redirect()->back()->with('success','Address updated successfully');
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
