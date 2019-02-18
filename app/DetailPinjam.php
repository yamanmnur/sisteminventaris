<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


//menggunakan softdelete
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPinjam extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;
    protected $table = 'tb_detail_pinjam';
    
    protected $primaryKey = 'id_detail_peminjaman';
    protected $fillable = [
        'id_detail_pinjam','id_inventaris','jumlah',
        //,'foto','alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    
    
}
