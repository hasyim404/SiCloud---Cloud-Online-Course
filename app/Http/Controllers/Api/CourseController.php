<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::All();
        
        return new CourseResource(true, 'Data Course', $course);

    }

    public function show($id)
    {
        $course = Modul::select('course.id AS id_course','modul.jdl_modul', 'modul.jdl_modul', 'modul.deskripsi as deskripsi_modul', 'modul.id as id_modul', 'filemateri.pdfmateri', 'filemateri.id as id_filemateri','videomateri.nama_video', 'videomateri.video')
                        ->leftJoin('course', 'course.id', '=', 'modul.course_id')
                        ->leftJoin('filemateri', 'filemateri.modul_id', '=', 'modul.id')
                        ->leftJoin('videomateri', 'videomateri.modul_id', '=', 'modul.id')
                        ->where('course.id', '=', $id)
                        ->orderBy('id_modul', 'ASC')
                        ->get();
        
        $course_cek = Course::whereId($id)->first();

        if ($course_cek) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Isi Detail Course',
                    'data' => $course,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Isi Detail Course tidak ditemukan',
                ],
                404
            );
        }
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_course' => 'required|unique:course|min:5|max:100',
            'deskripsi_course' => 'required',
            // 'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ],
        // Custom Error Code
        [
            'nama_course.required' => 'Nama Course Wajib di isi',
            'nama_course.min' => 'Nama Course Terlalu pendek, minimal 5 karakter',
            'nama_course.max' => 'Nama Course Terlalu panjang, maksimal 100 karakter',
            'nama_course.unique' => 'Course sudah ada / Terduplikasi',
            'deskripsi_course.required' => 'Deskripsi Course wajib di isi',
            // 'foto.image' => 'Harus sebuah image dengan format jpg,jpeg,png',
            // 'foto.mimes' => 'Hanya memperbolehkan format jpg,jpeg,png',
            // 'foto.max' => 'Size terlalu besar, maksimal size 4MB',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $course = Course::create([
            'nama_course' => $request->nama_course,
            'deskripsi_course' => $request->deskripsi_course,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        return new CourseResource(true, 'Data Judul Course berhasil di input', $course);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama_course' => 'required|min:5|max:100',
            'deskripsi_course' => 'required',
            // 'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ],
        // Custom Error Code
        [
            'nama_course.required' => 'Nama Course Wajib di isi',
            'nama_course.min' => 'Nama Course Terlalu pendek, minimal 5 karakter',
            'nama_course.max' => 'Nama Course Terlalu panjang, maksimal 100 karakter',
            'deskripsi_course.required' => 'Deskripsi Course wajib di isi',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        // cek ada id nya ada tidak
        $course_cek = Course::whereId($id)->first();

        if (!empty($course_cek)) {
            $course = Course::whereId($id)->update([
                'nama_course' => $request->nama_course,
                'deskripsi_course' => $request->deskripsi_course,
                'updated_at'=>now(),
            ]);

            $select = Course::whereId($id)->first();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data Course berhasil di ubah',
                    'data' => $select,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Detail Course untuk di update Tidak ditemukan',
                ],
                404
            );
        }
    }

    public function destroy($id)
    {
        $course = Course::whereId($id)->first();

        if ($course) {
            $course->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data Course berhasil di hapus',
                    'data' => $course,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data Course yang ingin di hapus tidak di temukan',
                ],
                404
            );
        }
    }
}
