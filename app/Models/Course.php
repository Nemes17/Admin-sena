<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_number',
        'day',
        'area_id',
        'training_center_id',
        'environment_id',
        'offer_id',
        'quota',
    ];

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

    public function environment(){
        return $this->belongsTo('App\Models\Environment');
    }

    public function offer(){
        return $this->belongsTo('App\Models\Offer');
    }

    public function cuposDisponibles(){
        if (is_null($this->quota)) {
            return null;
        }
        return max(0, $this->quota - $this->apprentices()->count());
    }

    public function attendances(){
        return $this->hasMany('App\Models\Attendance');
    }
}
