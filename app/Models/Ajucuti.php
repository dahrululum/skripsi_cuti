<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajucuti extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'permohonan_cuti';
    protected $fillable = [
        'id',
        'no_pc',
        'tgl_pc',
        'id_pegawai',
        'jenis_cuti',
        'alias',
        'tgl_mulai',
        'tgl_selesai',
        'lama_cuti',
        'alasan',
        'file_pc',
        'alamat_cuti',
        
      
         
    ];
    public function getPEG()
    {
        return $this->hasOne(Pegawai::class,'id_pegawai','id_pegawai')->withDefault();
    }
    public function getJC()
    {
        return $this->hasOne(Jeniscuti::class,'kd_jenis_cuti','jenis_cuti')->withDefault();
    }
}
