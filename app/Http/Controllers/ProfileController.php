<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('landingpage.myprofile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('landingpage.myprofile');
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
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        $request->validate([
            'f_name' => 'required|min:2|max:45',
            'l_name' => 'required|min:3|max:45',
            'no_telp' => ['required','without_spaces','regex:/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/','min:9','max:20'],
            'username' => 'required|min:3|max:15',
            'email' => 'required|email|max:45',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
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
            'no_telp.regex' => 'Nomor Telepon tidak sesuai format',
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
            'foto.image' => 'Harus sebuah image dengan format jpg,jpeg,png',
            'foto.mimes' => 'Hanya memperbolehkan format jpg,jpeg,png',
            'foto.max' => 'Size terlalu besar, maksimal size 4MB',
        ]);
      
        $foto = DB::table('users')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }

        $data = User::find($id);

        if(!empty($request->foto)){

            if(!empty($data->foto)) unlink(public_path().'/img/users_profile/'.$data->foto);

            $fileName = 'pict-'.$request->username.'.'.$request->foto->extension();
            $request->foto->move(public_path('img/users_profile'),$fileName);
        }

        else{
            $fileName = $namaFileFotoLama;
        }

        //lakukan insert data dari request form
        DB::table('users')->where('id',$id)->update(
            [
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'no_telp' => $request->no_telp,
                'username' => $request->username,
                'email' => $request->email,
                'foto' => $fileName,
                'updated_at'=>now(),
            ]);
       
        return redirect('my-profile')->with('success','Update data berhasil');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ],
        // Custom Error Code
        [
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password terlalu pendek, minimal 8 karakter',
            'password.confirmed' => 'Password tidak sama',
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        $request->session()->regenerate();

        return back()->with('success', 'Password berhasil di ubah');

    }
    
}
