<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name','imagen_url',
        'imagen_public_id',];

     public function teachers(){
        return $this->hasMany('App\Models\Teacher');
    }
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    public function offers(){
        return $this->hasMany('App\Models\Offer');
    }
}
