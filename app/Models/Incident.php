<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = ['environment_id', 'computer_id', 'reported_by', 'description', 'status', 'resolved_at'];

    // A qué ambiente pertenece esta novedad (si aplica)
    public function environment(){
        return $this->belongsTo('App\Models\Environment');
    }

    // A qué computador pertenece esta novedad (si aplica)
    public function computer(){
        return $this->belongsTo('App\Models\Computer');
    }

    // Usuario (instructor o aprendiz) que reportó la novedad
    public function reportedBy(){
        return $this->belongsTo('App\Models\User', 'reported_by');
    }
}

