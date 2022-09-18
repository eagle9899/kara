<?php 

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\User;
use App\Mail\Websitemail;
use Auth;
use Carbon\Carbon;
use Hash;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['user', 'verified']);
    // }
    
    public function userindex()
    { 
        return view('front.userlogin');
    }

    public function usersverify($token, $email)
    {
        $user_data = User::where('remember_token', $token)->where('email',$email)->first();
        if ($user_data)
        {
            $user_data->remember_token = '';
            $user_data->status = 'Active';
            $user_data->email_verified_at =  Carbon::now()->toDateTimeString();
            $user_data->update();
            return redirect()->route('user_login')->with('success','Now You are counted one of our user' );
        }
        else
        {            
            echo 'Verification link was expired';
        }

    }

    public function user_login_submit(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard('user')->attempt($credential)){
            return redirect()->route('user_home');
            
        }
        // elseif(Auth::guard('user')->email_verified_at == ''){
        //     return redirect()->route('userlogin')->with('error','Please Verify Your account');
        // }
        else{
            // return redirect()->route('userlogin')->with('error','Information is incorrect');
            $incorrectdata = 'The data has been provided is anonymous';
            session()->put('incorrectdata', $incorrectdata);
            return redirect()->route('userlogin')->with('invalid', 'The information is invalid');
        }
    }
    public function user_logout(Request $request)
    {        
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        return redirect()->route('userlogin');
    }

    public function forget_password()
    {
        return view('front.forgetpassword');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $user_data = User::where('email', $request->email)->first();
        if (!$user_data ){
            return redirect()->back()->with('error', 'Email not Found');
        }
        $token = hash('sha256', time()) .'sa';
        
        $user_data->remember_token =  $token;
        $user_data->status = 'Nactive';
        $user_data->update();

        $resetlink = Url('reset-password/'. $token .'/'. $request->email);
        $subject = 'Reset Password';
        $message = 'Please Click on the Button to reset your password: <br>';
        $message .= '<a type="button" class="btn btn-primary" href="'.$resetlink.'">Click Here</a><br>'; 

        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('userlogin')->with('Success', 'Please Check you Email to reset the password');
    }

     public function reset_password($token, $email)
    {
        $user_data = User::where('remember_token', $token)->where('email', $email)->first();
        if (!$user_data)
        {
            return redirect()->route('userlogin');
        }
        return view('front.resetpassword', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' =>'required',
            'retype_password' =>'required|same:password',
        ]);
        
        $user_data = User::where('remember_token', $request->token)->where('email', $request->email)->first();
        $user_data->password = Hash::make($request->password);
        $user_data->remember_token = '';
        $user_data->status = 'Active';
        $user_data->update();
        return redirect()->route('userlogin')->with('success', 'Password reset Successfully');
    }
}
