<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\Websitemail;
use Hash;
use Auth;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::guard('admin')->attempt($credential)){
            return redirect()->route('admin_home');
        }
        else{
            return redirect()->route('admin_login')->with('error','Information is incorrect');
        }
    }
    public function logout(Request $request)
    {
        
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        return redirect()->route('admin_login');
    }

    public function forget_password()
    {
        return view('admin.login.forgetpassword');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $admin_data = Admin::where('email', $request->email)->first();
        if (!$admin_data ){
            return redirect()->back()->with('error', 'Email not Found');
        }
        $token = hash('sha256', time());
        $token .= 'hu';
        $admin_data->remember_token =  $token;
        $admin_data->update();

        $resetlink = Url('admin/reset-password/'. $token .'/'. $request->email);
        $subject = 'Reset Password';
        $message = 'Please Click on the Button to reset your password: <br>';
        $message .= '<a type="button" class="btn btn-info" href="'.$resetlink.'">Click Here</a>' ;

        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('admin_login')->with('success', 'Please Check you Email to reset the password');
    }


    public function reset_password($token, $email)
    {
        $admin_data = Admin::where('remember_token', $token)->where('email', $email)->first();
        if (!$admin_data)
        {
            return redirect()->route('admin_login');
        }
        return view('admin.login.resetpassword', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' =>'required',
            'retype_password' =>'required|same:password',
        ]);
        $admin_data = Admin::where('remember_token', $request->token)->where('email', $request->email)->first();
        $admin_data->password = Hash::make($request->password);
        $admin_data->remember_token = '';
        $admin_data->update();
        return redirect()->route('admin_login')->with('success', 'Password reset Successfully');
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
