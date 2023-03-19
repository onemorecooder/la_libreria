<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Index</title>
</head>
<body style="margin: 70px">
    <div style="margin-bottom: 20px">
        <h1 class="display-4">Biblioteca</h1>
        <a href="{{ route('create') }}" class="btn btn-primary">Agregar libro</a>
        <a href="{{ route('index') }}" class="btn btn-secondary">Mostrar todos los libros</a>
    </div>

    <form action="{{ route('index') }}" method="GET">
        <div class="form-group">
          <label for="category">Categoría:</label>
          <select name="category" id="category" class="form-control">
            <option value="">Todas</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="search">Buscar:</label>
          <input type="text" name="search" id="search" class="form-control" value="{{ $searchTerm }}">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
      </form>
      <br>
    <br>
    <table style="text-align: center" class="table">
        <thead>
            <tr>
                <th style="text-align: center" scope="col">ISBN</th>
                <th style="text-align: center" scope="col">Title</th>
                <th style="text-align: center" scope="col">Author</th>
                <th style="text-align: center" scope="col">Categoria/s</th>
                <th style="text-align: center" scope="col">Price</th>
                <th style="text-align: center" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>
                    @foreach ($book->category as $category)
                        {{ $category->name }}
                        @if(!$loop->last)
                        @endif
                    @endforeach
                </td>
                <td>{{ $book->price }}</td>
                <td>
                    <a href="{{ route('edit', $book->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('show', $book->id) }}" class="btn btn-sm btn-success">Show</a>
                    <form action="{{ route('destroy', $book->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$books->links()}}

    <br>
    <br>
    <h1 class="display-4">Categorias</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Crear nueva categoría</a>
    <br>
    <br>
    <table style="text-align: center" class="table">
        <thead>
          <tr>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>

