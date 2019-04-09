<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


//menggunakan softdelete
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $table = 'jenis';
    public $timestamps = false;
    protected $primaryKey = 'kode_jenis';
    protected $fillable = [
        'nama_jenis','kode_jenis','keterangan_jenis',
        //,'foto','alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    
    
}
