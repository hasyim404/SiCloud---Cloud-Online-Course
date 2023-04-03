<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return User::select("f_name", "l_name", "no_telp", "username", "email", "status", "isactive", "role")->get();
    }

    public function headings(): array
    {
        return ["Nama Depan", "Nama Belakang", "No.Telp", "Username", "Email", "Status", "IsActive", "Role"];
    }
}
