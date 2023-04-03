<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Http\Resources\FeedbackResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::leftJoin('course', 'course.id', '=', 'feedback.course_id')
                            ->select('feedback.id','feedback.nama','feedback.email','feedback.course_id','course.nama_course AS course','feedback.isi_feedback')
                            ->get();

        return new FeedbackResource(true, 'Data Feedback', $feedback);
    }

    public function show($id)
    {
        $feedback = Feedback::leftJoin('course', 'course.id', '=', 'feedback.course_id')
                            ->select('feedback.id','feedback.nama','feedback.email','feedback.course_id','course.nama_course AS course','feedback.isi_feedback')
                            ->where('feedback.id', '=', $id)
                            ->first();

        if ($feedback) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Detail Data Feedback',
                    'data' => $feedback,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Detail Feedback Tidak ditemukan',
                ],
                404
            );
        }

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
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

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $feedback = Feedback::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'course_id' => $request->course_id,
            'isi_feedback' => $request->isi_feedback,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        return new FeedbackResource(true, 'Feedback berhasil di input', $feedback);
    }

    public function destroy($id)
    {

        $feedback = Feedback::whereId($id)->first();

        if ($feedback) {

            $feedback->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data Feedback berhasil di hapus',
                    'data' => $feedback,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data Feedback yang ingin di hapus tidak di temukan',
                ],
                404
            );
        }

    }
}
