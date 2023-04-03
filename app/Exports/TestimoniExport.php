<?php

namespace App\Exports;

use App\Models\Testimoni;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TestimoniExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Testimoni::select("nama", "email", "status", "isi_pesan")->get();
    }

    public function headings(): array
    {
        return ["Nama User", "Email", "Status", "Isi Pesan"];
    }
}
