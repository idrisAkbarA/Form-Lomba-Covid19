<?php

namespace App\Imports;

use App\mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class mhsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new mahasiswa([
            'nama'=> ucwords(strtoLower($row[0])),
            'namaPanggilan'=> ucwords(strtoLower($row[1]))  ,
            'nim'=> $row[2],
            'hp'=> '0'.$row[3],
            'departemen'=> $row[4],
            ]);
    }
}
