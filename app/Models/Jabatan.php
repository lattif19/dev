<?php

namespace App\Models;

use App\Models\Pegawai\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'pegawai_jabatan';
    protected $guarded = ['id'];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
}
