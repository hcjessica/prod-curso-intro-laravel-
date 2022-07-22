<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    //atributos que serán enviados en masa
    protected $fillable = [
        'title',
        'slug',
        'body',
    ];

    //indicando que hay una relación con tabla usuarios
    public function user()
    {
        //pertenencia a la tabla Usuarios
        return $this->belongsTo(User::class);
    }
}
