<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Team;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname','username','email','password','mobile','position','team_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }

    public function message(){
        return $this->belongsToMany(Message::class,'user_message','user_id','message_id')->withPivot('username');
    }

    public function questionnaire(){
        return $this->belongsToMany(Questionnaire::class,'user_questionnaire','user_id','questionnaire_id')->WithPivot('target');
    }

    public function answer(){
        return $this->hasMany(Answer::class);
    }
}
