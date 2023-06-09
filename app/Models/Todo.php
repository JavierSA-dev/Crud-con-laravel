<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    use HasFactory;
    public function categories()
    {
        return $this->belongsTo('App\Models\Categorie');
    }
}
