<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'level', 'description', 'area_id', 'duration_months', 'status'];

    // Una oferta pertenece a un área de formación
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    // Una oferta puede tener varias fichas/cursos abiertos
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}

