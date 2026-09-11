<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    use HasFactory;
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
    public function training_center(){
        return $this->belongsTo('App\Models\Training_center');
    }
    public function apprentices(){
        return $this->hasMany('App\Models\Apprentice');
    }
     public function teachers(){
        return $this->belongsToMany('App\Models\Teacher', 'course_teachers');
    }

    // Un curso pertenece a un ambiente
    public function environment(){
        return $this->belongsTo('App\Models\Environment');
    }

    // Un curso/ficha pertenece a una oferta (programa)
    public function offer(){
        return $this->belongsTo('App\Models\Offer');
    }

    // Cupos disponibles = cupo total menos aprendices ya inscritos (null = sin límite)
    public function cuposDisponibles(){
        if (is_null($this->quota)) {
            return null;
        }
        return max(0, $this->quota - $this->apprentices()->count());
    }
}
