<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user(){
        return $this->belongsToMany(User::class,'user_message','message_id','user_id')->withPivot('username');
    }

    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }
}
