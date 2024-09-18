<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search', '');
        $books = [];
        if (!empty($search)) {
            $response = Http::get('https://openlibrary.org/search.json', [
                'q' => $search,
            ]);
            if ($response->successful()) {
                $books = $response->json('docs');
            }
        }
        return view('api.booksearch', compact('books', 'search'));
}
}
