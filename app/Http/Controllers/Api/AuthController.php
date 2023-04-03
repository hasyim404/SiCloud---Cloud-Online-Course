<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        $validator = Validator::make($request->all(),[
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

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $input = [
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'no_telp' => $request->no_telp,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'created_at' => now(),
        ];

        $user = User::create($input);

        return response()->json([
            "status" => "success",
            "message" => "Register Berhasil, Untuk bisa login kamu harus menunggu approval dari admin paling lama dalam waktu 3x24jam"
        ]);
    }

    public function login(Request $request)
    {
        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where("email", $input["email"])->where('isactive', '=', 1)->first();

        if ($user && Auth::attempt($input)) {
            $token = $user->createToken("token")->plainTextToken;

            return response()->json([
                "code" => 200,
                "status" => true,
                "message" => "Login Berhasil",
                "token" => $token
            ]);
        } else {
            return response()->json([
                "code" => 401,
                "status" => false,
                "message" => "Login Gagal"
            ]);
        }
    }
}
