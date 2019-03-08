<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


//menggunakan softdelete
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $table = 'tb_peminjaman';
    public $timestamps = false;
    protected $primaryKey = 'id_peminjaman';
    protected $fillable = [
        'status_pinjam','status_peminjaman','kode_user','tanggal_pinjam','tanggal_kembali','deleted_at',
        'kode_operator','kode_peminjaman'
        //,'foto','alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    
    
}
