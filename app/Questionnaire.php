<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [];
    
    public $timestamps = false;

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function teams(){
        return $this->hasMany(Team::class);
    }

    public function targets(){
        return $this->belongsToMany(User::class,'user_questionnaire','questionnaire_id','user_id')->WithPivot('target');
    }
}
