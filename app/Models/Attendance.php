<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'apprentice_id', 'date', 'status', 'observations'];

    // A qué ficha/curso pertenece este registro de asistencia
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    // A qué aprendiz pertenece este registro de asistencia
    public function apprentice(){
        return $this->belongsTo('App\Models\Apprentice');
    }
}

