<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    
    public function book(Request $request){
        $category =Category::all();

        if ($request->category || $request->judul_buku) {
            $books = Book::whereHas('category', function($q) use($request) {
                $q->where('id', $request->category);
            });
        
            if ($request->judul_buku) {
                $books->orWhere('judul_buku', 'like', '%'.$request->judul_buku.'%');
            }
        
            $books = $books->get();
        } else {
            $books = Book::all();
        }

        return view('Halaman/book-list', ['books' => $books, 'category' => $category]);
    }

    public function index(){
        return view('Halaman/home');
    }
}
