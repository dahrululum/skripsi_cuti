<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeniscuti extends Model
{
    use HasFactory;
    protected $table = 'jeniscuti';
    protected $fillable = [
        'kd_jenis_cuti',
        'nm_jenis_cuti',
        
         
    ];

}
