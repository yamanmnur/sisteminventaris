<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

//menggunakan softdelete
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Inventaris extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;
    protected $dates = ['deleted_at']; 

    protected $table = 'tb_inventaris';
     protected $primaryKey = 'id_inventaris';
    protected $fillable = [
        'nama','kondisi','keterangan','jumlah',
        'kode_jenis','id_ruang'
        //,'foto','alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public function getAllInventaris(){
        $data = DB::table('tb_inventaris')->get();

        return $data;
    }
    
    
}
