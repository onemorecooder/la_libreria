<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookCategoryTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los IDs de libros y categorías
        $bookIds = DB::table('books')->pluck('id');
        $categoryIds = DB::table('categories')->pluck('id');

        foreach ($bookIds as $bookId) {
            // Seleccionar entre 1 y 3 categorías aleatorias
            $numCategories = $faker->numberBetween(1, 3);
            $selectedCategories = $faker->randomElements($categoryIds->toArray(), $numCategories);

            // Insertar registros en la tabla pivot
            foreach ($selectedCategories as $categoryId) {
                DB::table('book_category')->insert([
                    'book_id' => $bookId,
                    'category_id' => $categoryId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}


?>