<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refwilayah extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ref_wilayah';
    protected $fillable = [
        'id',
        'kdwilayah',
        'alias',
        'namawilayah',
        'status',
         
    ];
}
