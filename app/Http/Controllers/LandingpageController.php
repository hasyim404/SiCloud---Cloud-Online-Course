<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Course;
use App\Models\User;
use App\Models\Modul;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'course' =>  Course::orderBy('id', 'DESC')->paginate(4),
            'count_course' =>  Course::count(),
            'count_user' =>  User::count(),
            'count_modul' =>  Modul::count(),
            'testimoni' =>  Testimoni::where('status', 1)->get()
        ];

        return view ('landingpage.home', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return redirect()->back();
    }

    public function edit($id)
    {
        return redirect()->back();
    }

    public function show($id)
    {
        return redirect()->back();
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:2|max:100',
            'email' => 'required|email|unique:testimoni|max:45',
            'isi_pesan' => 'required|min:5',
            'foto' => 'nullable',
        ],
        // Custom Error Code
        [
            'nama.required' => 'Nama wajib di isi',
            'nama.min' => 'Nama terlalu pendek',
            'nama.max' => 'Nama terlalu panjang, maksimal 45 karakter',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Harus berupa format email',
            'email.unique' => 'Kamu sudah pernah mengisi testimoni ini sebelumnya',
            'email.max' => 'Email terlalu panjang, maksimal 45 karakter',
            'isi_pesan.required' => 'Kamu belum mengisi pesan',
            'isi_pesan.min' => 'Testimoni terlalu pendek, minimal 5 karakter',
        ]);
      
        // if(!empty($request->foto)){
        //     $fileName = 'pict-'.$request->nama.'.'.$request->foto->extension();
        //     //$fileName = $request->foto->getClientOriginalName();
        //     $request->foto->move(public_path('img/users_profile/testimoni_users_profile'),$fileName);
        // }
        // else{
        //     $fileName = '';
        // }

        //lakukan insert data dari request form
        DB::table('testimoni')->insert(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'isi_pesan' => $request->isi_pesan,
                'foto' => $request->foto,
                'created_at'=>now(),
            ]);
       
        Alert::success('Testimoni berhasil di kirim', 'Testimoni yang kamu kirim akan dipilih lagi oleh admin untuk di tampilkan di halaman depan')->persistent('Close');
        return redirect()->route('home.index');
    }

}
