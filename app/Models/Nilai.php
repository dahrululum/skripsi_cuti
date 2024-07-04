<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'data_nilai';
    protected $fillable = [
        'id',
        'alias',
        'id_elemen',
        'id_wilayah',
        'id_jenis',
        'tahun',
        'nilai',
        'sumber',
        'status_verifikasi',
        'status_aktif',
         
    ];
}
