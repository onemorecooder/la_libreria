<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Show</title>
</head>
<body style="margin: 70px">
    <div class="card">
        <div class="card-body">
          <h1 class="card-title">{{ $book->title }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>

          <p><strong>Categories:</strong>
            @foreach ($book->category as $category)
                {{ $category->name }}
                @if (!$loop->last)
                    ,
                @endif
            @endforeach
            </p>

          <p class="card-text">{{ $book->description }}</p>
          <p class="card-text"><strong>ISBN:</strong> {{ $book->isbn }}</p>
          <p class="card-text"><strong>Published Date:</strong> {{ $book->published_date }}</p>
          <p class="card-text"><strong>Price:</strong> {{ $book->price }}</p>
          <p class="card-text"><strong>Creation Date:</strong> {{ $book->created_at }}</p>
          <p class="card-text"><strong>Update Date:</strong> {{ $book->updated_at }}</p>
          <a href="{{ route('index') }}" class="btn btn-primary">Go Back</a>
        </div>
      </div>
</body>
</html>