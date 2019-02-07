<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Operator extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_operator';
    public $incrementing = false;
    protected $primaryKey = 'kode_operator';
    protected $fillable = [
        'kode_operator','nama', 'no_tlp','email','password',
        //,'foto','alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getProfile($nis)
    {
        $data = Operator::where('kode_operator',$nis)->first();
        return $data;
    }
    
}
