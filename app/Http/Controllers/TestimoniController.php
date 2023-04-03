<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TestimoniExport;
use Illuminate\Support\Facades\DB;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni = Testimoni::orderBy('id', 'DESC')->get();
        return view ('admin.testimoni.index',compact('testimoni'));
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
            'nama' => 'required|min:2|max:100',
            'email' => 'required|email|unique:testimoni|max:45',
            'isi_pesan' => 'required|min:5',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ],
        // Custom Error Code
        [
            'nama.required' => 'Nama wajib di isi',
            'nama.min' => 'Nama terlalu pendek',
            'nama.max' => 'Nama terlalu panjang, maksimal 45 karakter',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Harus berupa format email',
            'email.unique' => 'Email sudah terdaftar',
            'email.max' => 'Email terlalu panjang, maksimal 45 karakter',
            'isi_pesan.required' => 'Pesan wajib di isi',
            'isi_pesan.min' => 'Pesan terlalu pendek, minimal 5 karakter',
            'foto.image' => 'Harus sebuah image dengan format jpg,jpeg,png',
            'foto.mimes' => 'Hanya memperbolehkan format jpg,jpeg,png',
            'foto.max' => 'Size terlalu besar, maksimal size 4MB',
        ]);
      
        if(!empty($request->foto)){
            $fileName = 'pict-'.$request->nama.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('img/users_profile/testimoni_users_profile'),$fileName);
        }
        else{
            $fileName = '';
        }

        //lakukan insert data dari request form
        DB::table('testimoni')->insert(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'isi_pesan' => $request->isi_pesan,
                'foto' => $fileName,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
       
        return redirect()->route('testimoni.index')
                    ->with('success','Berhasil menambahkan Testimoni');
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
        $data = Testimoni::find($id);
        switch ($data->status) {
            case 0:
                $class = 'bg-danger';
                $status = 'Hide';
                break;
            case 1:
                $class = 'bg-success';
                $status = 'Show';
                break;

            default;
            break;
        };

        return view('admin.testimoni.detail',compact('data','class','status'));
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
            'nama' => 'required|min:2|max:100',
            'email' => 'required|email|max:45',
            'isi_pesan' => 'required|min:5',
        ],
        // Custom Error Code
        [
            'nama.required' => 'Nama wajib di isi',
            'nama.min' => 'Nama terlalu pendek',
            'nama.max' => 'Nama terlalu panjang, maksimal 45 karakter',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Harus berupa format email',
            'email.max' => 'Email terlalu panjang, maksimal 45 karakter',
            'isi_pesan.required' => 'Pesan wajib di isi',
            'isi_pesan.min' => 'Pesan terlalu pendek, minimal 5 karakter',
        ]);

        //lakukan insert data dari request form
        DB::table('testimoni')->where('id',$id)->update(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'isi_pesan' => $request->isi_pesan,
                'updated_at'=>now(),
            ]);
       
        return redirect('/admin/testimoni'.'/'.$id)
                        ->with('success','Data Testimoni Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Testimoni::find($id);
        // if(!empty($data->foto)) unlink('img/users_profile/testimoni_users_profile/'.$data->foto);

        Testimoni::where('id',$id)->delete();
        return redirect()->route('testimoni.index')
                         ->with('success','Data Testimoni berhasil di hapus');
    }

    public function generatePDF()
    {
        $testimoni = Testimoni::orderBy('id', 'DESC')->get();
        $data = [
            'title' => 'Data Testimoni',
            'date' => date('d/m/Y'),
        ];

        $pdf = PDF::loadView('admin.testimoni.getpdf', ['testimoni' => $testimoni], $data);
        return $pdf->download('Data Testimoni.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new TestimoniExport, 'Data Testimoni.xlsx');
    }
}
