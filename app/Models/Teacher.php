<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;          
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 
        'email', 
        'area_id', 
        'training_center_id',
        'user_id'
    ];
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
    public function training_center(){
        return $this->belongsTo('App\Models\Training_center');
    }
    // Un instructor pertenece a muchos cursos a través de la tabla pivote course_teachers
    public function courses(){
        return $this->belongsToMany('App\Models\Course', 'course_teachers');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
