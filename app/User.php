<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
//use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
    //protected $table = 'roles';

    use Authenticatable, CanResetPassword;
    //use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    public function punyaRule($rule)
    {
        //dd($this->role->namaRule);
        //dd($this->role->nameRule);
      if ($this->role->nameRule == $rule) {
        return true;
      } else {
        return false;
      }
    }
}
