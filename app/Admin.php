<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


//menggunakan softdelete
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;
    protected $dates = ['deleted_at']; 

    protected $table = 'tb_admin';
    public $incrementing = false;
    protected $primaryKey = 'kode_admin';
    protected $fillable = [
        'kode_admin','nama_admin','email','password',
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

    
    
}
// > $admin->nama_admin = "admin master"
// => "admin master"
// >>> $admin->kode_admin = "KKKADM01"
// => "KKKADM01"
// >>> $admin->email = "adminmaster@gmail.com"
// => "adminmaster@gmail.com"
// >>> $admin->password = Hash::make("password")
// => "$2y$10$Q0/5hlYGWmzHyXQ4j8fEt.6H1YCR5LmjuUJatCex8Q5B99zHNXjaS"
// >>> $admin->save()
// => true