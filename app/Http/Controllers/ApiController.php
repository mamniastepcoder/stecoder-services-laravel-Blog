<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

class ApiController extends Controller
{
    public function index(Request $request)
    {
      $page = $request->input('page',1);
    $response = Http::get('https://api.restful-api.dev/objects',[
          'limit' =>5,
          'page' => $page,
    ]); 
     if ($response->successful())
         {
            $data = $response->json(); 
        } else {
            $data = []; 
        }
    return view('api.index', ['data' => $data],compact('page'));
    }
}
