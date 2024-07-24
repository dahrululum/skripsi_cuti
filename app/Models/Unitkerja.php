<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unitkerja extends Model
{
    use HasFactory;
    
    protected $table = 'unitkerja';
    protected $fillable = [
        'kd_unitkerja',
        'nm_unitkerja',
        'alamat'
         
    ];
}
