<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capacity', 'training_center_id'];

    public function training_center(){
        return $this->belongsTo('App\Models\Training_center');
    }

    public function computers(){
        return $this->hasMany('App\Models\Computer');
    }

    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    public function incidents(){
        return $this->hasMany('App\Models\Incident');
    }
}
