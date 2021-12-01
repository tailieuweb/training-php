<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_User extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    //gọi ra models tương ứng trong bảng với các giá trị cột tương ứng và thực thi trên bảng Users_web
    protected $table = 'profile_users';
    protected $fillable = [
        'user_id',
        'fullName',
        'phone',
        'Date',
        'address',
    ];
}
