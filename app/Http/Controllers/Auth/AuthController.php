<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\BioData;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use DB;
use Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function postLogin(Request $request)
    {
        $user = new User;
        if ($user->rules) {
            $validator = Validator::make($request->all(), $user->login_rules);
            if ($validator->fails()) {
                return view("auth.login")->withError($validator)->with(['editLogin'=>$request->all()]);
            }
        }
   
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withError('Sorry, you provided an incorrect login details.');
    }


    public function register()
    {
        return view('auth.register');
    }
      

    public function postRegister(Request $request)
    {  
        $user = new User;
        if ($user->rules) {
            $validator = Validator::make($request->all(), $user->rules, $user->customMessages);
            if ($validator->fails()) {
                return redirect("register")->withError('Sorry, you provided an incorect registration details.');
            }
        }

        $result = $this->processUserRegistration($request->all());
        if ($result) {
            return redirect("login")->withSuccess('Congrats! Your registration was successful. You can now login.');
        }else{
            return redirect()->back()->withError('Registration could not be completed. Please try again');
        }
        
    }


    /**
     * @return boolean
     */
    public function processUserRegistration(array $data)
    {
        try {
            DB::transaction(function() use ($data) {
                $user = $this->create($data);
                $check = $this->createBio($data, $user->id);
            });
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    } 
    
    
    /**
     * Create bio info for a BioData instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\BioData
     */
    protected function createBio(array $data, $user_id)
    {
        return BioData::create([
            'dob' => $data['dob'],
            'nationality' => $data['nationality'],
            'mobile_number' => $data['mobile_number'],
            'bio' => $data['bio'],
            'user_id' => $user_id
        ]);
    }
    

    public function dashboard()
    {
        if(Auth::check()){
            return view('home');
        }
  
        return redirect("login")->withError('You are not allowed to access this page.');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
