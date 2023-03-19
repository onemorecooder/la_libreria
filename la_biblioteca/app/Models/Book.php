<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    
    class Book extends Model
    {
        protected $fillable = [
            'isbn',
            'title',
            'author',
            'published_date',
            'description',
            'price',
            'created_at',
            'updated_at',
        ];

        public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    }    
?>