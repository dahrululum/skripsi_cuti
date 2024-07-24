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
        
         
    ];
}
