<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Modul;
use App\Http\Resources\ModulResource;

class ModulController extends Controller
{
    public function index()
    {
        $modul = Modul::leftJoin('course', 'course.id', '=', 'modul.course_id')
                        ->select('modul.id','modul.jdl_modul','course.nama_course AS course','modul.deskripsi','modul.updated_at AS last_update')
                        ->get();

        return new ModulResource(true, 'Data Modul', $modul);
    }

    public function show($id)
    {
        $modul = Modul::leftJoin('course', 'course.id', '=', 'modul.course_id')
                        ->select('modul.id','modul.jdl_modul','course.nama_course AS course','modul.deskripsi','modul.updated_at AS last_update')
                        ->where('modul.id', '=', $id)
                        ->first();

        if ($modul) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Detail Modul',
                    'data' => $modul,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Detail Modul Tidak ditemukan',
                ],
                404
            );
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'jdl_modul' => 'required|min:2|max:100',
            'course_id' => 'required|integer',
            'deskripsi' => 'nullable',
        ],
        // Custom Error Code
        [
            'jdl_modul.required' => 'Judul Modul wajib di isi',
            'jdl_modul.min' => 'Judul Modul terlalu pendek',
            'jdl_modul.max' => 'Judul Modul terlalu panjang, maksimal 100 karakter',
            'course_id.required' => 'Course Wajib Di isi',
            'course_id.integer' => 'Format pemilihan salah',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $modul = Modul::create([
            'jdl_modul' => $request->jdl_modul,
            'course_id' => $request->course_id,
            'deskripsi' => $request->deskripsi,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        return new ModulResource(true, 'Data Modul berhasil di input', $modul);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'jdl_modul' => 'required|min:2|max:100',
            'course_id' => 'required|integer',
            'deskripsi' => 'nullable',
        ],
        // Custom Error Code
        [
            'jdl_modul.required' => 'Judul Modul wajib di isi',
            'jdl_modul.min' => 'Judul Modul terlalu pendek',
            'jdl_modul.max' => 'Judul Modul terlalu panjang, maksimal 100 karakter',
            'course_id.required' => 'Course Wajib Di isi',
            'course_id.integer' => 'Format pemilihan salah',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        // cek ada id nya ada tidak
        $modul_cek = Modul::whereId($id)->first();

        if (!empty($modul_cek)) {
            $modul = Modul::whereId($id)->update([
                'jdl_modul' => $request->jdl_modul,
                'course_id' => $request->course_id,
                'deskripsi' => $request->deskripsi,
                'updated_at'=>now(),
            ]);

            $select = Modul::whereId($id)->first();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data Modul berhasil di ubah',
                    'data' => $select,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Detail Modul untuk di update Tidak ditemukan',
                ],
                404
            );
        }
    }

    public function destroy($id)
    {

        $modul = Modul::whereId($id)->first();

        if ($modul) {
            $modul->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data Modul berhasil di hapus',
                    'data' => $modul,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data Modul yang ingin di hapus tidak di temukan',
                ],
                404
            );
        }

        // return new ModulResource(true, 'Data Modul berhasil di hapus', $videomateri);
    }
}
