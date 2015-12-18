<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Session;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\User;
use App\Order;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers {
        postLogin as traitPostLogin;
        postRegister as traitPostRegister;
    }

    protected $redirectPath = '/home';
    protected $loginPath = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout', 'getProfile', 'putProfile', 'putUpdatePassword']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required|in:M,F,O',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name'  => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email' => $data['email'],
            'age'   => $data['age'],
            'gender'   => $data['gender'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function postLogin(Request $request)
    {
        $session_id = Session::getId();
        $response = $this->traitPostLogin($request);
        $new_session_id = Session::getId();
        
        if(Auth::check()){
            $order = Order::where([
                'session_id' => $session_id,
                'status'     => 'cart'
            ])->update([
                'user_id' => Auth::id(),
                'session_id' => null,
            ]);  
        }
        
        return $response;
    }

    public function getProfile()
    {
        return view('auth.profile');
    }

    public function putProfile(Request $request)
    {
        $user = Auth::user();
        $user->fill($request->only([
            'street', 
            'ext_num',
            'int_num',
            'settlement',
            'zip_code',
            'estate'
        ]));
        if($user->save()){
            return redirect()->back()->withSuccess('Se ha actualizado tu perfil');
        }else {
            return redirect()->back()->withErrors($user->getErrors());
        }
    }

    public function putUpdatePassword(Request $request)
    {
        $user = Auth::user();
        if(Auth::attempt([
            'email' => $user->email,
            'password' => $request->input('old_password')
        ])) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed|min:6'
            ]);
            if($validator->passes()) {
                $user->password = bcrypt($request->input('password'));
                $user->save();
                return redirect()->back()->withSuccess("Se ha actualizado tu contraseña");
            } else {
                return redirect()->back()->withErrors($validator->messages());
            }
        } else {
            return redirect()->back()->withErrors('La contraseña introducida es incorrecta');
        }
    }
}
