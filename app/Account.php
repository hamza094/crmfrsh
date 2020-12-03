<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded=[];

    public function project(){
      return $this->belongsTo(Project::class,'project_id');
    }
}
