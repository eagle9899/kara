<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;

class AdminSubscriberController extends Controller
{
    public function showall()
    {
        $allsubscriber = Subscriber::orderBy('id','asc')->get();
        return view('admin.subscriber.show_all', compact('allsubscriber'));
    }
    public function mail_to_all()
    {
        return view('admin.subscriber.send_email');
    }
    public function send_email_all(Request $request)
    {
        $request->validate([ 
            'subject' => 'required',
            'message' => 'required',
        ]);
 
        $subject = $request->subject;
        $message = $request->message;
        $message .= '<a href="'.route('home'). '" type="button" class="btn btn-primary" target="_blank">';
         
        $message .= '</a>';
        $subscribers = Subscriber::where('status', 'Active')->get();
        foreach($subscribers as $row){
            \Mail::to($row->email)->send(new Websitemail($subject, $message));
        }
        
        return redirect()->back()->with('success','Email sent to all subscribers');
            
    }
    
    
}
