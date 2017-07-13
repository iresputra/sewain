<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'alamat'=>'required|string',
            'tanggal_lahir'=>'required|date',
            'no_ktp'=>'required|numeric',
            'no_hp'=>'required|numeric',
            
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    
    //jadiin OOP
    protected function create(array $data)
    {
     /*   $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->no_ktp = $request->no_ktp;
        $user->tanggal_lahir = date('Y-m-d', strtotime(str_replace('-', '/', $request['tanggal_lahir'])));
        
        $user->save();
        
        return redirect('login');*/
        
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'alamat'=>$data['alamat'],
                'no_hp'=>$data['no_hp'],
                'no_ktp'=>$data['no_ktp'],
                'tanggal_lahir'=>date('Y-m-d', strtotime(str_replace('-', '/',$data['tanggal_lahir']))),


            ]);
    }
}
