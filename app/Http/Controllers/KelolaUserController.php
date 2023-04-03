<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class KelolaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        $ar_status = ['Pelajar','Mahasiswa','Pekerja','Lainnya'];
        $ar_role = ['Admin','Base'];
        return view ('admin.users.index',compact('users','ar_status','ar_role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        $request->validate([
            'f_name' => 'required|min:2|max:45',
            'l_name' => 'required|min:3|max:45',
            'no_telp' => ['required','without_spaces','regex:/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/','unique:users','min:9','max:20'],
            'username' => 'required|unique:users|min:3|max:15',
            'email' => 'required|email|unique:users|max:45',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'role' => 'required',
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
            'foto.image' => 'Harus sebuah image dengan format jpg,jpeg,png',
            'foto.mimes' => 'Hanya memperbolehkan format jpg,jpeg,png',
            'foto.max' => 'Size terlalu besar, maksimal size 4MB',
            'role.required' => 'Role wajib dipilih',
        ]);
      
        if(!empty($request->foto)){
            $fileName = 'pict-'.$request->username.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('img/users_profile'),$fileName);
        }
        else{
            $fileName = '';
        }

        //lakukan insert data dari request form
        DB::table('users')->insert(
            [
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'no_telp' => $request->no_telp,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
                'foto' => $fileName,
                'role' => $request->role,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
       
        return redirect()->route('users.index')
                    ->with('success','User Baru Berhasil di tambah');
        
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
        $data = User::find($id);
        $ar_status = ['Pelajar','Mahasiswa','Pekerja','Lainnya'];
        $ar_role = ['Admin','Base'];
        switch ($data->isactive) {
            case 0:
                $class = 'bg-danger';
                $isactive = 'Non-Active';
                break;
            case 1:
                $class = 'bg-success';
                $isactive = 'Active';
                break;

            default;
            break;
        };
        return view('admin.users.detail',compact('data','ar_status','ar_role','class','isactive'));
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
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'role' => 'required',
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
            'status.required' => 'Status wajib dipilih',
            'foto.image' => 'Harus sebuah image dengan format jpg,jpeg,png',
            'foto.mimes' => 'Hanya memperbolehkan format jpg,jpeg,png',
            'foto.max' => 'Size terlalu besar, maksimal size 4MB',
            'role.required' => 'Role wajib dipilih',
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
                'status' => $request->status,
                'foto' => $fileName,
                'role' => $request->role,
                'updated_at'=>now(),
            ]);
       
        return redirect('/admin/users'.'/'.$id)
                        ->with('success','Data User Berhasil Diubah');
    }

    public function updatePasswordAdmin(Request $request, $iduser)
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

        $user = User::find($iduser);
        $user->password = Hash::make($request->password);
        $user->save();
        $request->session()->regenerate();

        return redirect('/admin/users'.'/'.$iduser)->with('success', 'Password berhasil di ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        if(!empty($data->foto)) unlink(public_path().'/img/users_profile/'.$data->foto);

        User::where('id',$id)->delete();
        return redirect()->route('users.index')
                         ->with('success','Data User Berhasil Dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'Data Users.xlsx');
    }


}
