<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\BookCategory;

class BookController extends Controller
{
    public function index(Request $request)
{
    $selectedCategory = $request->input('category');
    $searchTerm = $request->input('search');

    $categories = Category::all();
    $books = Book::query();

    if ($selectedCategory) {
        $books->whereHas('category', function ($query) use ($selectedCategory) {
            $query->where('id', $selectedCategory);
        });
    }

    if ($searchTerm) {
        $books->orWhere('title', 'like', '%' . $searchTerm . '%');
    }

    $books = $books->orderBy('created_at', 'desc')->paginate(5);

    return view('index', compact('books', 'categories', 'selectedCategory', 'searchTerm'));
}


    public function show($id)
    {
        $book = Book::find($id);
        return view('show', compact('book'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_date = $request->published_date;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->save();

        if ($request->has('categories')) {
            $book->category()->sync($request->categories);
        }

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        return view('edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
{
    $book = Book::find($id);
    $book->isbn = $request->isbn;
    $book->title = $request->title;
    $book->author = $request->author;
    $book->published_date = $request->published_date;
    $book->description = $request->description;
    $book->price = $request->price;
    $book->save();

    // Obtener las categorías seleccionadas en el formulario
    $categories = $request->input('categories', []);

    // Sincronizar las categorías del libro con las seleccionadas en el formulario
    $book->category()->sync($categories);

    return redirect()->route('index', $book->id);
}

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('index');
    }
}
