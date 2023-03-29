<?php

namespace App\Models;

use App\Models\Spp;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $primarykey = 'nisn';

    protected $guarded = [''];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }
}
