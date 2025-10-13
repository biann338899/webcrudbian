<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemen';
    protected $fillable = ['nama_departemen'];

    public function Karyawan()
    {
        return $this->hasMany('App\Models\Karyawan');
    }
}

