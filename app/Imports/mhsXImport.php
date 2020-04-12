<?php

namespace App\Imports;

use App\mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class mhsXImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return [$row[0],$row[1]];
        // return new mahasiswa([
        //     //
        // ]);
    }
}
