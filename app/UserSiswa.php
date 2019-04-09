<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


//menggunakan softdelete
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class UserSiswa extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

   
    protected $table = 'user_siswa';
    public $timestamps = false;
    protected $primaryKey = 'kode_user';
    protected $fillable = [
        'kode_user','kelas','jurusan','no_id'
        //,'foto','alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    
    
}
