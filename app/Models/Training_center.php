<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training_center extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location'];
    
     public function teachers(){
        return $this->hasMany('App\Models\Teacher');
    }
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    // Un centro de formación tiene muchos ambientes
    public function environments(){
        return $this->hasMany('App\Models\Environment');
    }

}
