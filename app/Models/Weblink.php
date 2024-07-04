<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weblink extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'data_link';
    protected $fillable = [
        'id',
        'alias',
        'nama',
        'urlna',
        'file_foto',
        'ket',
        'status',
         
    ];
}
