<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentice extends Model
{
    use HasFactory;
    
     protected $fillable = ['name', 'email', 'cell_number', 'course_id', 'computer_id','user_id'];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
    public function computer(){
        return $this->belongsTo('App\Models\Computer');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
