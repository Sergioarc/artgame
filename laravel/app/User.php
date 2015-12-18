<?php

namespace App;

use Auth;
use App\Order;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Watson\Validating\ValidatingTrait;


class User extends \Illuminate\Database\Eloquent\Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, ValidatingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password','age','gender'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $rules = [
        // 'first_name' => 'required',
        // 'last_name'  => 'required',
        // 'email'      => 'required|email',
        // 'age'        => 'required|numeric',
        // 'gender'     => 'required|in:M,F,O',
    ];


    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function levels()
    {
        return $this->hasMany('App\Level');
    }

    public function getNameAttribute(){
        return $this->first_name. " ". $this->last_name;
    }

}
