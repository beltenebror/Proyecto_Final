<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Cliente;
use App\Chofer;
use App\Municipios;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected function showRegistrationForm()
    {
        $municipios = Municipios::all();
        return view('auth.register',['municipios' => $municipios]);    
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
            'dni' => 'required|string|size:9',
            'telefono' => 'required|string|min:6|max:15',
            'municipios_id' => 'required|integer',
            'rol'=>'required|digits_between:0,1',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'image' => 'perfil/default.png',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'rol' => $data['rol'],
            'dni' => $data['dni'],
            'telefono' => $data['telefono'],
            'municipios_id' => $data['municipios_id'],

        ]);

        if($data['rol']==0)
        {
           $cliente = new Cliente();
           $cliente->clientes_id=$user->id;
           $cliente->save();
        }
        else{
           $chofer = new chofer();
           $chofer->chofers_id=$user->id;
           $chofer->zona=$data['zona'];

           $chofer->save();
        }       
        return $user;
            
    }




}
