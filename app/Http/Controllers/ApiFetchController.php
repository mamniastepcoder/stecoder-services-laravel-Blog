<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

class ApiFetchController extends Controller
{
    public function index()
    {
       $response = Http::get('https://api.restful-api.dev/objects');  
        if ($response->successful()) {
            $data = $response->json(); 
        } else {
            $data = []; 
        }
    return view('api.index', ['data' => $data]);
    }
}
