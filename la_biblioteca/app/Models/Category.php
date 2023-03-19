<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'categories';

    // Columnas que pueden ser asignadas en masa
    protected $fillable = ['name'];

    // Relación muchos a muchos con el modelo Book
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}

?>