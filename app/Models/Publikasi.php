<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'data_publikasi';
    protected $fillable = [
        'id',
        'alias',
        'judul',
        'deskripsi',
        'file_foto',
        'file_download',
        'inputby',
        'tglinput',
        'status',
        'ket',
         
    ];
}
