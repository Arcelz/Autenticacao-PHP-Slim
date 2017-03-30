<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/03/2017
 * Time: 19:55
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends  Model
{
    protected $table = 'users';

    protected $fillable=[
        'email',
        'name',
        'password',
    ];

    public function setPassword($password)
    {
        $this->update([
           'password'=> password_hash($password, PASSWORD_DEFAULT)
        ]);
    }
}