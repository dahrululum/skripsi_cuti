<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin';
    protected $fillable = [
        'id_admin',
        'username',
        'password',
        'level',
       
        
    ];
     
    public function getWil()
    {
        return $this->hasOne(Refwilayah::class,'id','id_wilayah')->withDefault();
    }

}
