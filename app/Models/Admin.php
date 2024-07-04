<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'level',
        'id_wilayah',
        
    ];
     
    public function getWil()
    {
        return $this->hasOne(Refwilayah::class,'id','id_wilayah')->withDefault();
    }

}
