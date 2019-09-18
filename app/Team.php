<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Team extends Model
{
    protected $table = 'teams';
    protected $connection = 'mysql';

    protected $fillable = ['name','scrum_master','product_owner','developer'];

    public $timestamps = false;

    public function members(){
        return $this->hasMany(User::class);
    }

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }

    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class,'questionnaire_id');
    }
}
