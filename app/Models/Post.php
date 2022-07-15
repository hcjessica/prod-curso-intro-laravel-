<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //indicando que hay una relación con tabla usuarios
    public function user()
    {
        //pertenece a la tabla Usuarios
        return $this->belongsTo(User::class);
    }
}
