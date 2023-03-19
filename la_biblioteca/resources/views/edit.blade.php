<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Edit</title>
</head>
<body style="margin: 70px">
    <div class="container">
        <h1>Editar libro</h1>
        <form action="{{ route('update', $book->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input readonly type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}">
          </div>
          <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
          </div>
          <div class="form-group">
            <label for="author">Autor:</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
          </div>
          <div class="form-group">
            <label for="categories">Categorías:</label><br>
            @foreach($categories as $category)
                <input style="display: inline-block" type="checkbox" name="categories[]" value="{{ $category->id }}"
                @if($book->category->contains($category)) checked @endif
                >{{ $category->name }}
            @endforeach
        </div>
          <div class="form-group">
            <label for="published_date">Fecha de publicación:</label>
            <input type="date" class="form-control" id="published_date" name="published_date" value="{{ $book->published_date }}">
          </div>
          <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $book->description }}</textarea>
          </div>
          <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $book->price }}">
          </div>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          <a href="{{ route('index') }}" class="btn btn-primary">Go Back</a>
        </form>
      </div>
      
</body>
</html>