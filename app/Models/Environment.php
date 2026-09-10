<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capacity', 'training_center_id'];

    // Un ambiente pertenece a un centro de formación
    public function training_center(){
        return $this->belongsTo('App\Models\Training_center');
    }

    // Un ambiente tiene muchos computadores
    public function computers(){
        return $this->hasMany('App\Models\Computer');
    }

    // Un ambiente tiene muchos cursos
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}
