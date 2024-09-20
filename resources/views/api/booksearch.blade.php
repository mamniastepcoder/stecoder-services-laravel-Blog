
@extends('layouts.app')
@section('content')
<div>
    <h1 class="mt-4 text-center p-3 mb-2 bg-info text-white">Book Search</h1>
    @if(!empty($message))
    <div class="alert alert-warning">
        {{$message}}
    </div>
    @endif

    <form action="{{ route('books-search') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col mt-2">
                <label><b class="text-success">Search Book Title</b></label>
                <input type="text" name="search" class="form-control" placeholder="Search for Title..." value="{{ request('search') }}">
            </div>
            <div class="col mt-2">
                <label><b class="text-success">Search Author Name</b></label>
                <input type="text" name="author" class="form-control" placeholder="Search for Author..." value="{{ request('author') }}">
            </div>
            <div class="col mt-2">
                <label><b class="text-success">Search publish_date</b></label>
                <input type="text" name="publish_date" class="form-control" placeholder="Search for publish_date..." value="{{ request('publish_date') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Search</button>
        <a href="{{ route('books-search') }}" class="btn btn-secondary mt-3 ml-2">Reset Filter</a>
          <a href="{{ route('posts') }}" class="btn btn-danger text-center mt-3 text-white float-right">Back</a>
    </form>

    @if (isset($books) && count($books) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author(s)</th>
                    <th>First Published</th>
                    <th>Cover</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book['title_suggest'] ?? 'N/A' }}</td>
                        <td>{{ implode(', ', $book['author_name'] ?? ['N/A']) }}</td>
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

        <div class="pagination">
            @if($page > 1)
                <a href="{{ route('books-search', array_merge(request()->all(), ['page' => $page - 1])) }}" class="btn btn-secondary">Previous</a>
            @endif

            <span class="ml-2">Page {{ $page }}</span>

            <a href="{{ route('books-search', array_merge(request()->all(), ['page' => $page + 1])) }}" class="btn btn-secondary ml-2">Next</a>
        </div>
    @else
        <p>No Data Found</p>
    @endif
</div>
@endsection
