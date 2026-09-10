<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    
    protected $fillable = ['brand', 'number', 'environment_id'];

    // Un computador pertenece a un ambiente
    public function environment(){
        return $this->belongsTo('App\Models\Environment');
    }

    public function apprentices(){
        return $this->hasMany('App\Models\Apprentice');
    }
}
