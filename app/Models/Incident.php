<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = ['environment_id', 'computer_id', 'reported_by', 'description', 'status', 'resolved_at'];

    public function environment(){
        return $this->belongsTo('App\Models\Environment');
    }

    public function computer(){
        return $this->belongsTo('App\Models\Computer');
    }

    public function reportedBy(){
        return $this->belongsTo('App\Models\User', 'reported_by');
    }
}

