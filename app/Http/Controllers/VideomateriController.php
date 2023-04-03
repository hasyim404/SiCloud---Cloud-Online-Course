<?php

namespace App\Http\Controllers;

use App\Models\Videomateri;
use App\Models\Modul;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VideomateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videomateri = Videomateri::orderBy('updated_at', 'DESC')->get();
        $modul = Modul::orderBy('id', 'DESC')->get();
        return view ('admin.videomateri.index',compact('videomateri','modul'));
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
            'nama_video' => 'required|min:5|max:50',
            'video' => ['required','regex: /youtube\\.com/i','max:255','unique:videomateri'],
            'modul_id' => 'required|integer',
        ],
        // Custom Error Code
        [
            'nama_video.required' => 'Nama Video wajib di isi',
            'nama_video.min' => 'Nama Video terlalu pendek, minimal 5 karakter',
            'nama_video.max' => 'Nama Video terlalu panjang, maksimal 50 karakter',
            'video.required' => 'Link Video wajib di isi',
            'video.unique' => 'Link Video Sudah ada/ter-duplikasi',
            'video.regex' => 'Format harus berupa youtube.com',
            'video.max' => 'Link Video terlalu panjang, maksimal 255 karakter',
            'modul_id.required' => 'Modul Wajib Di pilih',
            'modul_id.integer' => 'Format pemilihan salah',
        ]);

        //lakukan insert data dari request form
        DB::table('videomateri')->insert(
            [
                'nama_video' => $request->nama_video,
                'video' => $request->video,
                'modul_id' => $request->modul_id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
       
        return redirect()->route('videomateri.index')
                         ->with('success','Link Video Baru Berhasil Di tambahkan');
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

    public function edit($id)
    {
        $data = Videomateri::find($id);
        $modul = Modul::orderBy('id', 'DESC')->get();
        return view('admin.videomateri.detail',compact('data','modul'));
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
            'nama_video' => 'required|min:5|max:50',
            'video' => ['required','regex: /youtube\\.com/i','max:255'],
            'modul_id' => 'required|integer',
        ],
        // Custom Error Code
        [
            'nama_video.required' => 'Nama Video wajib di isi',
            'nama_video.min' => 'Nama Video terlalu pendek, minimal 5 karakter',
            'nama_video.max' => 'Nama Video terlalu panjang, maksimal 50 karakter',
            'video.required' => 'Link Video wajib di isi',
            'video.regex' => 'Format harus berupa youtube.com',
            'video.max' => 'Link Video terlalu panjang, maksimal 255 karakter',
            'modul_id.required' => 'Modul Wajib Di pilih',
            'modul_id.integer' => 'Format pemilihan salah',
        ]);

        //lakukan insert data dari request form
        DB::table('videomateri')->where('id',$id)->update(
            [
                'nama_video' => $request->nama_video,
                'video' => $request->video,
                'modul_id' => $request->modul_id,
                'updated_at'=>now(),
            ]);
       
        return redirect()->route('videomateri.index')
                         ->with('success','Video Materi Berhasil Di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Videomateri::where('id',$id)->delete();
        return redirect()->route('videomateri.index')
                         ->with('success','Link Video Berhasil Dihapus');
    }
}
