<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{

   public function search(Request $request)
{
    $search = $request->input('search', '');
    $author = $request->input('author', '');
    $publish_date = $request->input('publish_date', '');
    $page = $request->input('page', 1);

    $books = [];
    $message = '';
    $query = [];
    if (!empty($search)) {
        $query[] = $search;
    }
    if (!empty($author)) {
         $query[] = $author;
    }
     if (!empty($publish_date)) {
         $query[] = $publish_date;
    }

    if (!empty($query)) {
        $response = Http::get('https://openlibrary.org/search.json', [
            'q' => implode(' AND ' , $query),
            'limit' => 10,
            'page' => $page,
        ]);
        if ($response->successful()) {
            $books = $response->json('docs');
        }else{
            $message = 'API search did not return data found';
        }
    }else{
            $message = 'Please enter search books Title and author';
        }
    return view('api.booksearch', compact('books', 'search', 'page','message'));
}

}
