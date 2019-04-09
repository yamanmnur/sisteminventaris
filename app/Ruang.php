<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


//menggunakan softdelete
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Ruang extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $table = 'ruang';
    public $timestamps = false;
    protected $primaryKey = 'id_ruang';
    protected $fillable = [
        'nama_ruang','kode_ruang','keterangan_ruang',
        //,'foto','alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    
    
}
