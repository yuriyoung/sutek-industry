<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Keygen\Keygen;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public $incrementing = false;
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot ()
    {
        parent::boot();

        static::creating(function (User $user) {
            $id = $user->_generatePrimaryKey();
            while (Product::whereId($id)->count() > 0)
            {
                $id = $user->_generatePrimaryKey();
            }
            $user->id = $id;
        });
    }

    /**
     * @brief 用于随机生成产品的9位主键id
     * 依赖库: composer require gladcodes/keygen，见: https://github.com/gladchinda/keygen-php
     * @Author: Yuri Young<yuri.young@qq.com>
     * @return string
     */
    private function _generatePrimaryKey()
    {
        return Keygen::numeric(7)
            ->prefix(mt_rand(1, 9))
            ->suffix(mt_rand(1, 9))
            ->generate(true);
    }
}
