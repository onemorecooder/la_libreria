<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'book_category';

    // Columnas que pueden ser asignadas en masa
    protected $fillable = ['book_id', 'category_id'];

    // Relación muchos a uno con el modelo Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relación muchos a uno con el modelo Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

?>