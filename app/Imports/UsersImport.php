<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    // mulai baca dari baris 2 (skip heading)
    public function startRow(): int
    {
        return 2;
    }

    // set delimiter yang digunakan csv
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            //
            'name'      => $row[0],
            'email'     => $row[1],
            'password'  => Hash::make($row[2])
        ]);
    }
}
