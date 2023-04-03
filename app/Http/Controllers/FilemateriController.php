<?php

namespace App\Http\Controllers;

use App\Models\Filemateri;
use App\Models\Modul;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FilemateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filemateri = Filemateri::orderBy('updated_at', 'DESC')->get();
        $modul = Modul::orderBy('id', 'DESC')->get();
        return view ('admin.filemateri.index',compact('filemateri','modul'));
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
            'pdfmateri' => 'required|mimes:pdf|max:20480|unique:filemateri,pdfmateri',
            'modul_id' => 'required|integer',
        ],
        // Custom Error Code
        [
            'pdfmateri.required' => 'Wajib memasukkan file',
            'pdfmateri.unique' => 'File sudah ada',
            'pdfmateri.mimes' => 'Format tidak di izinkan, harus berupa PDF',
            'pdfmateri.max' => 'Size terlalu besar, maksimal 20MB',
            'modul_id.required' => 'Modul wajib dipilih',
        ]);

        $fileName = $request->pdfmateri->getClientOriginalName();
        // $request->pdfmateri->move(public_path('file_materi'),$fileName);

        if (file_exists(public_path().'/file_materi'.'/'.$fileName)){
            return back()->with('error','Duplicate file/Nama file yang sama sudah ada');
        } else {

            $request->pdfmateri->move(public_path('file_materi'),$fileName);

            //lakukan insert data dari request form
            DB::table('filemateri')->insert(
                [
                    'pdfmateri' => $fileName,
                    'modul_id' => $request->modul_id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);

            return redirect()->route('filemateri.index')
                            ->with('success','Berhasil upload file');    
        }

    }

    public function show($id)
    {
        $data = Filemateri::find($id);
        return view ('admin.filemateri.show',compact('data'));
    }

    public function edit($id)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Filemateri::find($id);
        if(!empty($data->pdfmateri)) unlink(public_path().'/file_materi'.'/'.$data->pdfmateri);

        Filemateri::where('id',$id)->delete();
        return redirect()->route('filemateri.index')
                         ->with('success','File Berhasil Dihapus');
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
