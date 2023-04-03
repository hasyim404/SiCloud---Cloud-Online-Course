<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = Feedback::orderBy('id', 'DESC')->get();
        return view ('admin.feedback.index',compact('feedback'));
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
        return redirect()->back();
        // $request->validate([
        //     'nama' => 'required|min:2|max:50',
        //     'email' => 'required|email|max:60',
        //     'course_id' => 'required|integer',
        //     'isi_feedback' => 'required|min:5',
        // ],
        // // Custom Error Code
        // [
        //     'nama.required' => 'Nama wajib di isi',
        //     'nama.min' => 'Nama terlalu pendek',
        //     'nama.max' => 'Nama terlalu panjang, maksimal 50 karakter',
        //     'email.required' => 'Email wajib di isi',
        //     'email.email' => 'Harus berupa format email',
        //     'email.max' => 'Email terlalu panjang, maksimal 60 karakter',
        //     'course_id.required' => 'Course Wajib Di isi',
        //     'course_id.integer' => 'Format pemilihan salah',
        //     'isi_feedback.required' => 'Feedback wajib di isi',
        //     'isi_feedback.min' => 'Pesan terlalu pendek, minimal 5 karakter',
        // ]);

        // //lakukan insert data dari request form
        // DB::table('feedback')->insert(
        //     [
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'course_id' => $request->course_id,
        //         'isi_feedback' => $request->isi_feedback,
        //         'created_at'=>now(),
        //         'updated_at'=>now(),
        //     ]);
       
        // return redirect()->route('feedback.index')
        //                  ->with('success','Feedback Baru Berhasil Di tambahkan');
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
        return redirect()->back();
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
        return redirect()->back();
        // $request->validate([
        //     'nama' => 'required|min:2|max:50',
        //     'email' => 'required|email|max:60',
        //     'course_id' => 'required|integer',
        //    /**  
        //     * kalo gamau ada validasi pake nullable aja
        //     * 'isi_feedback' => 'nullable', 
        //     */
        //     'isi_feedback' => 'required|min:5',
        // ],
        // // Custom Error Code
        // [
        //     'nama.required' => 'Nama wajib di isi',
        //     'nama.min' => 'Nama terlalu pendek',
        //     'nama.max' => 'Nama terlalu panjang, maksimal 50 karakter',
        //     'email.required' => 'Email wajib di isi',
        //     'email.email' => 'Harus berupa format email',
        //     'email.max' => 'Email terlalu panjang, maksimal 60 karakter',
        //     'course_id.required' => 'Course Wajib Di isi',
        //     'course_id.integer' => 'Format pemilihan salah',
        //     'isi_feedback.required' => 'Feedback wajib di isi',
        //     'isi_feedback.min' => 'Pesan terlalu pendek, minimal 5 karakter',
        // ]);

        // //lakukan update data dari request form edit
        // DB::table('feedback')->where('id',$id)->update(
        //     [
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'course_id' => $request->course_id,
        //         'isi_feedback' => $request->isi_feedback,
        //         'updated_at'=>now(),
        //     ]);
       
        // return redirect()->route('feedback.index')
        //                 ->with('success','Data Feedback Berhasil Diubah');            ->with('success','Data Feedback Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = Feedback::find($id);
        Feedback::where('id',$id)->delete();
        return redirect()->route('feedback.index')
                        ->with('success','Data Feedback Berhasil Dihapus');
    }

    public function generatePDF()
    {
        $feedback = Feedback::orderBy('id', 'DESC')->get();
        $data = [
            'title' => 'Data Feedback',
            'date' => date('d/m/Y')
        ];

        $pdf = PDF::loadView('admin.feedback.getpdf', ['feedback' => $feedback], $data);
        return $pdf->download('Data Feedback.pdf');
    }
}
