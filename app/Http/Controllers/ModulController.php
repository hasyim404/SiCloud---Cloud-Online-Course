<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modul = Modul::orderBy('updated_at', 'DESC')->get();
        $course = Course::orderBy('id', 'DESC')->get();
        return view ('admin.modul.index',compact('modul','course'));
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
        $request->validate([
            'jdl_modul' => 'required|min:2|max:100',
            'course_id' => 'required|integer',
            'deskripsi' => 'nullable',
           /**  
            * kalo gamau ada validasi pake nullable aja
            * 'isi_feedback' => 'nullable', 
            */
        ],
        // Custom Error Code
        [
            'jdl_modul.required' => 'Judul Modul wajib di isi',
            'jdl_modul.min' => 'Judul Modul terlalu pendek',
            'jdl_modul.max' => 'Judul Modul terlalu panjang, maksimal 100 karakter',
            'course_id.required' => 'Course Wajib Di isi',
            'course_id.integer' => 'Format pemilihan salah',
        ]);

        //lakukan insert data dari request form
        DB::table('modul')->insert(
            [
                'jdl_modul' => $request->jdl_modul,
                'course_id' => $request->course_id,
                'deskripsi' => $request->deskripsi,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
       
        return redirect()->route('modul.index')
                         ->with('success','Modul Baru Berhasil Di tambahkan');
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
        $data = Modul::find($id);
        $course = Course::orderBy('id', 'DESC')->get();
        return view('admin.modul.detail',compact('data','course'));
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
        $request->validate([
            'jdl_modul' => 'required|min:2|max:100',
            'course_id' => 'required|integer',
            'deskripsi' => 'nullable',
           /**  
            * kalo gamau ada validasi pake nullable aja
            * 'isi_feedback' => 'nullable', 
            */
        ],
        // Custom Error Code
        [
            'jdl_modul.required' => 'Judul Modul wajib di isi',
            'jdl_modul.min' => 'Judul Modul terlalu pendek',
            'jdl_modul.max' => 'Judul Modul terlalu panjang, maksimal 100 karakter',
            'course_id.required' => 'Course Wajib Di isi',
            'course_id.integer' => 'Format pemilihan salah',
        ]);

        //lakukan insert data dari request form
        DB::table('modul')->where('id',$id)->update(
            [
                'jdl_modul' => $request->jdl_modul,
                'course_id' => $request->course_id,
                'deskripsi' => $request->deskripsi,
                'updated_at'=>now(),
            ]);
       
            return redirect('/admin/modul'.'/'.$id)
                         ->with('success','Data Modul Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Modul::where('id',$id)->delete();
        return redirect()->route('modul.index')
                        ->with('success','Data Modul Berhasil Dihapus');
    }
}
