<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fppc extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'fppc';
    protected $fillable = [
        'id',
        'no_fppc',
        'tgl_fppc',
        'no_pc',
        'catatan_cuti',
        'atasan_langsung',
        'catatan_atasan',
         
    ];
    public function getPC()
    {
        return $this->hasOne(Ajucuti::class,'no_pc','no_pc')->withDefault();
    }
}
