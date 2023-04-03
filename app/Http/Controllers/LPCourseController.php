<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Modul;
use Illuminate\Support\Facades\DB;
use App\Models\Filemateri;
use Illuminate\Support\Facades\Response;
use App\Models\Videomateri;

class LPCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $course = Course::all();
        $pag_course = Course::orderBy('id', 'DESC')->paginate(5);
        return view('landingpage.course',compact('pag_course'));
    }

    public function create() 
    {
        return redirect()->back();
    }

    public function edit($id) 
    {
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $data = [
            'course' => Course::find($id),
            'modul' =>  Modul::where('course_id', '=', $id)->get(),
            'count_modul' =>  Modul::where('course_id', '=', $id)->count(),
            'pag_course' => Course::orderBy('id', 'DESC')->paginate(5),  
            'join' => Modul::select('modul.jdl_modul', 'modul.deskripsi as deskripsi_modul', 'modul.id as id_modul', 'filemateri.pdfmateri', 'filemateri.id as id_filemateri','videomateri.nama_video', 'videomateri.video')
                                ->leftJoin('course', 'course.id', '=', 'modul.course_id')
                                ->leftJoin('filemateri', 'filemateri.modul_id', '=', 'modul.id')
                                ->leftJoin('videomateri', 'videomateri.modul_id', '=', 'modul.id')
                                ->where('course.id', '=', $id)
                                ->orderBy('id_modul', 'ASC')
                                // ->orderBy('id_modul', 'ASC')
                                ->get(),
            // 'videomateri' =>  Videomateri::where('modul_id', '=', 'modul.id')->get(),

           'videomateri' => Modul::select('videomateri.nama_video','videomateri.video')
                                ->join('videomateri', 'videomateri.id', '=', 'modul.id')
                                ->where('modul.id', '=', $id)
                                ->get()                
        ];
        
        return view('landingpage.course-view', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:2|max:50',
            'email' => 'required|email|max:60',
            'course_id' => 'required|integer',
            'isi_feedback' => 'required|min:5',
        ],
        // Custom Error Code
        [
            'nama.required' => 'Nama wajib di isi',
            'nama.min' => 'Nama terlalu pendek',
            'nama.max' => 'Nama terlalu panjang, maksimal 50 karakter',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Harus berupa format email',
            'email.max' => 'Email terlalu panjang, maksimal 60 karakter',
            'course_id.required' => 'Course Wajib Di isi',
            'course_id.integer' => 'Format pemilihan salah',
            'isi_feedback.required' => 'Kamu belum mengisi feedbacknya',
            'isi_feedback.min' => 'Pesan terlalu pendek, minimal 5 karakter',
        ]);

        //lakukan insert data dari request form
        DB::table('feedback')->insert(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'course_id' => $request->course_id,
                'isi_feedback' => $request->isi_feedback,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
       
        return redirect()->back()
                         ->with('success','Feedback untuk course ini berhasil dikirim. Terimakasih atas partisipasinya');
    }

    public function downloadFiles($id)
    {
        $data = Filemateri::find($id);
        $file = public_path().'/file_materi'.'/'.$data->pdfmateri;
        $fileName = $data->pdfmateri;
        $headers = array('Content-Type: application/pdf');

        return Response::download($file, $fileName, $headers);
    }
}
