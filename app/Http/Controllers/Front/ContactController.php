<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Models\Admin;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.contact');
    }

    public function send_email (Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required',
        ]);

        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        //    return response()->json(['code' =>0,'message_error'=>$validator->errors()->toArray() ] );   
        }
        else
        {
            $admin_data = Admin::where('id',1)->first();
            $subject = 'Subject:' . $request->subject;
            $vmessage = '<b>Visitor Name: </b>' . $request->name . '<br>';
            $vmessage .= '<b>Visitor Email: </b>' . $request->email . '<br>';
            $vmessage .= '<b>Visitor Email: </b> ' . $request->message . '<br>';
           
            \Mail::to($admin_data->email)->send(new Websitemail($subject, $vmessage));
            return response()->json(['code'=>1, 'success_message'=>'Email is sent']);
            // return response->json(['code' => 1, 'success_message' => 'Email is Sent!']);
        }
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
