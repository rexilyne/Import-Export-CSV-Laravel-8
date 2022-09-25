<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    // set delimiter yang digunakan csv
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'enclosure' => '',
        ];
    }

    // heading untuk data yang akan diexport
    public function headings(): array
    {
        return ["Name", "Email"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('name', 'email')->get();
    }
}
