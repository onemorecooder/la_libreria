<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Create</title>
</head>
<body style="margin: 70px">
  <h1>Añadir un libro</h1>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="isbn">ISBN:</label>
          <input type="text" name="isbn" id="isbn" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="title">Título:</label>
          <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="author">Autor:</label>
          <input type="text" name="author" id="author" class="form-control" required>
        </div>
        @foreach($categories as $category)
        <div class="form-check" style="display: inline-block">
            <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input">
            <label style="margin-right: 30px" class="form-check-label" for="{{ $category->id }}">{{ $category->name }}</label>
        </div>
        @endforeach
        <div class="form-group">
          <label for="published_date">Fecha de publicación:</label>
          <input type="date" name="published_date" id="published_date" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="description">Descripción:</label>
          <textarea name="description" id="description" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="price">Precio:</label>
          <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar libro</button>
        <a href="{{ route('index') }}" class="btn btn-primary">Go Back</a>
      </form>
      
</body>
</html>