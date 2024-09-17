<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 text-center p-3 mb-2 bg-info text-white">Book Search</h1>

        <form action="{{ route('books-search') }}" method="GET" class="mb-4">
            <div class="form-group mt-4" >
                <label><b class="text-success">Search Books</b> </label>
                <input type="text" name="search" class="" placeholder="Search for books..." value="{{ $search }}">
                 <button type="submit" class="btn btn-primary">Search</button>
            </div>
           
        </form>

        @if (!empty($books))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author(s)</th>
                        <th>First Published</th>
                        <th>cover</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book['title_suggest'] ?? 'N/A' }}</td>
                            <td>{{ implode(', ', $book['author_name'] ?? []) }}</td>
                            <td>{{ $book['first_publish_year'] ?? 'N/A' }}</td>
                            <td>
                              @if(isset($book['cover_i']))
                              <img src="https://covers.openlibrary.org/b/id/{{ $book['cover_i'] }}-M.jpg" alt="Cover Image" style="width: 50px; height: auto;">
                             @else
                             No Image
                             @endif
                             </td>
                         </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
