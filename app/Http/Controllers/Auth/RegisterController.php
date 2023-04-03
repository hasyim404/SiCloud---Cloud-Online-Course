<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        
        return Validator::make($data, [
            'f_name' => 'required|min:2|max:45',
            'l_name' => 'required|min:3|max:45',
            'no_telp' => ['required','without_spaces','regex:/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/','unique:users','min:9','max:20'],
            'username' => 'required|unique:users|min:3|max:15',
            'email' => 'required|email|unique:users|max:45',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required',
        ],
        // Custom Error Code
        [
            'f_name.required' => 'Nama depan wajib di isi',
            'f_name.min' => 'Nama depan terlalu pendek',
            'f_name.max' => 'Nama depan terlalu panjang, maksimal 45 karakter',
            'l_name.required' => 'Nama belakang wajib di isi',
            'l_name.min' => 'Nama belakang terlalu pendek',
            'l_name.max' => 'Nama belakang terlalu panjang, maksimal 45 karakter',
            'no_telp.required' => 'Nomor Telepon wajib di isi',
            'no_telp.without_spaces' => 'Nomor Telepon terdapat spasi',
            'no_telp.regex' => 'Harus sesuai format nomor telepon indonesia',
            'no_telp.unique' => 'Nomor Telepon telah digunakan',
            'no_telp.min' => 'Nomor Telepon terlalu Pendek',
            'no_telp.max' => 'Nomor Telepon terlalu Panjang',
            'username.required' => 'Username wajib di isi',
            'username.unique' => 'Username sudah dipakai',
            'username.min' => 'Username terlalu Pendek, minimal 3 karakter',
            'username.min' => 'Username terlalu Panjang, maksimal 15 karakter',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Harus berupa format email',
            'email.unique' => 'Email sudah terdaftar',
            'email.max' => 'Email terlalu panjang, maksimal 45 karakter',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password terlalu pendek, minimal 8 karakter',
            'password.confirmed' => 'Password tidak sama',
            'status.required' => 'Status wajib dipilih',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        
        Alert::success('Registrasi Berhasil', 'Terimakasih telah melakukan registrasi. Akun mu akan di proses untuk aktivasi oleh admin, silahkan cek kembali paling lambat dalam 3x24jam')->persistent('Close');
        return User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'no_telp' => $data['no_telp'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
            'created_at' => now(),
        ]);
    }
}
