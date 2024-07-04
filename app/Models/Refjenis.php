<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refjenis extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ref_jenis';
    protected $fillable = [
        'id',
        'id_induk',
        'alias',
        'namajenis',
        'status',
         
    ];
}
