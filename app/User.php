<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function fullInfo()
    {
        return $this->hasOne(UserFullInfo::class, 'user_id');
    }

    public function remove()
    {
        //Delete image

        $this->delete();
    }

    public function ban()
    {
        $this->status = 1;
        $this->save();
    }

    public function unban()
    {
        $this->status = 0;
        $this->save();
    }

    public function isAdmin()
    {
        return Admin::where('user_id', $this->id)->first() ? true : false;
    }

    public function uploadImage(UploadedFile $image = null)
    {
        if(is_null($image))
        {
            return;
        }
        $imageName = str_random(20).'.'.$image->extension();
        $image->storeAs('users', $imageName);
        $this->image = $imageName;
        $this->save();
    }

    public function getImage()
    {
        return $this->image ? asset('storage/users/'.$this->image) :'/img/user_without_image.png';
    }

    public function createFullInfo()
    {
        $fullInfo = new UserFullInfo();
        $fullInfo->user_id = $this->id;
        $fullInfo->save();
    }
}
