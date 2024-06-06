<?php

namespace App\Http\Controllers;

use App\Models\rentlog;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class RentLogsController extends Controller
{
    public function index(Request $request) {
        $query = Rentlog::query();
    
        // if ($request->judul_buku) {
        //     $query->whereHas('book', function ($q) use ($request) {
        //         $q->where('judul_buku', 'like', '%' . $request->judul_buku . '%');
        //     });
        // }
        
        if ($request->has('id_user')) {
            $query->where('id_user', 'like', '%' . $request->id_user . '%');
        }
        
    
        $rentlog = $query->get();
    
        // Mengambil semua data buku
        $books = Book::all();
    
        // Mengambil semua data pengguna
        $user = User::all();
    
        return view('Halaman/rentlog', ['rentlog' => $rentlog, 'books' => $books, 'user' => $user]);
    }
    
}

