<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [];
    
    public $timestamps = false;

    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class,'questionnaire_id');
    }

    public function answer(){
        return $this->hasMany(Answer::class);
    }
}
