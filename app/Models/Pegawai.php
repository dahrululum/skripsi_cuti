<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pegawai';
    protected $fillable = [
        'id_pegawai',
        'nip',
        'nama_pegawai',
        'masa_kerja',
        'jenkel',
        'alamat',
        'nohp',
        'username',
        'password',
        'kd_pangkat',
        'kd_jabatan',
        'kd_golongan',
        'kd_unitkerja',    
        
         
    ];
    public function getUN()
    {
        return $this->hasOne(Unitkerja::class,'kd_unitkerja','kd_unitkerja')->withDefault();
    }
    public function getJAB()
    {
        return $this->hasOne(Jabatan::class,'kd_jabatan','kd_jabatan')->withDefault();
    }
    public function getPANG()
    {
        return $this->hasOne(Pangkat::class,'kd_pangkat','kd_pangkat')->withDefault();
    }
    public function getGOL()
    {
        return $this->hasOne(Golongan::class,'kd_golongan','kd_golongan')->withDefault();
    }
}
