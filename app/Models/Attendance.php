<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'apprentice_id', 'date', 'status', 'observations'];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function apprentice(){
        return $this->belongsTo('App\Models\Apprentice');
    }
}

