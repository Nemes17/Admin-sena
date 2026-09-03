<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrative extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'document_type', 'document_number', 'names', 'last_names', 'position',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
