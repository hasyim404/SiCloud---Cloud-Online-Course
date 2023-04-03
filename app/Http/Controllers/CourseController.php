<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::orderBy('updated_at', 'DESC')->get();
        return view ('admin.course.index',compact('course'));
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
            'nama_course' => 'required|unique:course|min:5|max:100',
            'deskripsi_course' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            // 'jdl_modul' => 'required|min:5|max:100',
            // 'deskripsi_modul' => 'nullable|min:5',
            // 'file_materi' => 'nullable|mimes:pdf',
            // 'video' => 'nullable|max:255',
        ],
        // Custom Error 
        [
            'nama_course.required' => 'Nama Course Wajib di isi',
            'nama_course.min' => 'Nama Course Terlalu pendek, minimal 5 karakter',
            'nama_course.max' => 'Nama Course Terlalu panjang, maksimal 100 karakter',
            'nama_course.unique' => 'Course sudah ada / Terduplikasi',
            'deskripsi_course.required' => 'Deskripsi Course wajib di isi',
            'foto.image' => 'Harus sebuah image dengan format jpg,jpeg,png',
            'foto.mimes' => 'Hanya memperbolehkan format jpg,jpeg,png',
            'foto.max' => 'Size terlalu besar, maksimal size 4MB',
        ]);

        if(!empty($request->foto)){
            $fileName = 'banner-'.$request->nama_course.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('img/banner_course'),$fileName);
        }
        else{
            $fileName = '';
        }
        //lakukan insert data dari request form
        DB::table('course')->insert(
            [
                'nama_course' => $request->nama_course,
                'deskripsi_course' => $request->deskripsi_course,
                'foto' => $fileName,
                // 'jdl_modul' => $request->jdl_modul,
                // 'deskripsi_modul' => $request->deskripsi_modul,
                // 'file_materi' => $request->file_materi,
                // 'video' => $request->video,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
       
        return redirect()->route('course.index')
                         ->with('success','Input Course Baru Berhasil Di tambah');
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
        $data = Course::find($id);
        return view('admin.course.detail',compact('data'));
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
            'nama_course' => 'required|min:5|max:100',
            'deskripsi_course' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            // 'jdl_modul' => 'required|min:5|max:100',
            // 'deskripsi_modul' => 'nullable|min:5',
            // 'file_materi' => 'nullable|mimes:pdf',
            // 'video' => 'nullable|max:255',
        ],
        // Custom Error 
        [
            'nama_course.required' => 'Nama Course Wajib di isi',
            'nama_course.min' => 'Nama Course Terlalu pendek, minimal 5 karakter',
            'nama_course.max' => 'Nama Course Terlalu panjang, maksimal 100 karakter',
            'deskripsi_course.required' => 'Deskripsi Course wajib di isi',
            'foto.image' => 'Harus sebuah image dengan format jpg,jpeg,png',
            'foto.mimes' => 'Hanya memperbolehkan format jpg,jpeg,png',
            'foto.max' => 'Size terlalu besar, maksimal size 4MB',
        ]);

        $foto = DB::table('course')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }

        $data = Course::find($id);

        if(!empty($request->foto)){

            if(!empty($data->foto)) unlink(public_path().'/img/banner_course/'.$data->foto);

            $fileName = 'banner-'.$request->nama_course.'.'.$request->foto->extension();
            $request->foto->move(public_path('img/banner_course'),$fileName);
        }

        else{
            $fileName = $namaFileFotoLama;
        }

        //lakukan update data dari request form edit
        DB::table('course')->where('id',$id)->update(
            [
                'nama_course' => $request->nama_course,
                'deskripsi_course' => $request->deskripsi_course,
                'foto' => $fileName,
                // 'jdl_modul' => $request->jdl_modul,
                // 'deskripsi_modul' => $request->deskripsi_modul,
                // 'file_materi' => $request->file_materi,
                // 'video' => $request->video,
                'updated_at'=>now(),
            ]);
       
        return redirect('/admin/course'.'/'.$id)
                        ->with('success','Data Course Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Course::find($id);
        if(!empty($data->foto)) unlink(public_path().'/img/banner_course/'.$data->foto);

        Course::where('id',$id)->delete();
        return redirect()->route('course.index')
                         ->with('success','Data Course Berhasil Dihapus');
    }

}
