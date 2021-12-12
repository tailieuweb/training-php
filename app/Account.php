<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Account extends Authenticatable
{
    use Notifiable;
    private static $_instance;
    //
    public static function getInstance() {
        if (!isset(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'accounts';
    protected $fillable = [
        'user_name', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    //get Account by Id
    public function getAccountById($account_id) {
        $account = DB::table('accounts')->where('id','=',$account_id)->first();
        return $account;
    }
}
?>