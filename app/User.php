<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo','desc'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static $users = [];

    public function articles() {
       return $this->hasMany('App\Model\Article', 'user_id', 'id');
    }

    public static function getUserInfoModelByUserId($userId){
        return self::select('id','name','email','photo','desc')->find($userId);
    }

    public static function getUserArr($userId){

        if(!isset(self::$users[$userId])){
            $user = self::select('name')->find($userId)->toArray();
            if(empty($user)){
                return false;
            }
            self::$users[$userId] = $user['name'];
        }

        return self::$users[$userId];
    }

    public static function getUserNameByUserId($userId){

        $userName = self::getUserArr($userId);

        return !empty($userName)?$userName:'用户不存在';

    }

    /**
     * 更新用户
     * @param $id
     * @param $data
     * @return bool
     */
    public static function updateUserInfo($id,$data){

        if(!empty($id) && !empty($data)){


            $user = self::find($id);
            $user->name = $data['name'];
            $user->email = $data['email'];
            if(!empty($data['password'])){
                $user->password = bcrypt($data['password']);
            }
            $photo = uploadFile('img','photo','uploads');
            if(!empty($photo)){
                $user->photo = $photo;
            }

            $user->desc = $data['desc'];

            return $user->save();
        }
        return false;
    }
}
