<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title','description','start_date','end_date','duration','department'];
    
    public $timestamps = false;
    
    public function team(){
        return $this->hasMany(Team::class);
    }
}
