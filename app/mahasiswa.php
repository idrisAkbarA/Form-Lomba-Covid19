<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $primaryKey = 'nim';
    protected $fillable = ['nama','nim','namaPanggilan','departemen','hp'];
}
