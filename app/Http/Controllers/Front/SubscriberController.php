<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $validator = \Validator::make($request->all(), [ 
            'email' => 'required|email', 
        ]);

        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        //    return response()->json(['code' =>0,'message_error'=>$validator->errors()->toArray() ] );   
        }
        else
        {
            
            $token = hash('sha256', time());
            $subscriber = new Subscriber;
            $subscriber->email = $request->email;
            $subscriber->token = $token;
            $subscriber->status = 'Pending';
            $subscriber->save();

            $verificationlinek = url('subscriber/verify/'.$token.'/'.$request->email);
            $subject = 'Subscriber Email Verify';

            $vmessage = 'Please Click on the following link in order to verify as subscriber<br/ >';
            $vmessage .= '<a type="button" class="btn btn-primary" href="'. $verificationlinek .'">';
            $vmessage .= 'Verify us now'.'</a>';
           
            \Mail::to($request->email)->send(new Websitemail($subject, $vmessage));
            return response()->json(['code'=>1, 'success_message'=>'Email is sent']);
            // return response->json(['code' => 1, 'success_message' => 'Email is Sent!']);
        }
    }
    public function verify($token, $email)
    {
        $subscriber_data = Subscriber::where('token', $token)->where('email',$email)->first();
        if ($subscriber_data){
            $subscriber_data->token = '';
            $subscriber_data->status = 'Active';
            $subscriber_data->update();
            return redirect()->back()->with('success','You have successfully subscribe to this system' );
        }else{
            return redirect()->route('home');
        }

    }
}
