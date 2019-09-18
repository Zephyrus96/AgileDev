<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [];
    
    public $timestamps = false;

    public function question(){
        return $this->belongsTo(Question::class,'question_id');    
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');    
    }

    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class,'questionnaire_id');
    }
}
