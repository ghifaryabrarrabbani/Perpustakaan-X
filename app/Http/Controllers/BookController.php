<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\rentlog;
use App\Models\Category;
use App\Models\requestbook;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function index(){
        return view("Halaman/home");
    }
    
    public function book(){
        $books = Book::all();
        $categories = Category::all();
        return view('Halaman/books', ['books'=>$books,'categories'=>$categories]);
    }
    public function add(){
        $categories = Category::all();
        return view('Halaman/books-add',['categories'=>$categories]);
    }

    public function edit($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $categories = Category::all();
        $currentCover = $books->cover;
        return view('Halaman/books-edit', ['categories'=>$categories, 'books'=>$books, 'currentcover'=>$currentCover]);
    }
    public function delete($slug)
    {
        $books = Book::where('slug', $slug)->first();
        return view('Halaman/books-delete', ['books'=>$books]);
    }
    public function destroy($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $books->delete();
        return redirect('books')->with('status', 'Book Deleted Successfully');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|unique:pustaka|max:20',
            'judul_buku' => 'required|max:100',
            'cover' => 'sometimes|image|mimes:png,jpg,jpeg', // Validasi gambar
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun_buku' => 'required|integer|regex:/^\d{4}$/',
            'edisi_buku' => 'required|max:100',
            'id_kategori' => 'required|max:20',
            'stocks' => 'required|max:11',
        ]);

        $filename = time() . '.' . $request->cover->getClientOriginalExtension();
        $request->cover->move(public_path('cover'), $filename);

        $book = new Book();
        $book->id = $request->input('id');
        $book->judul_buku = $request->input('judul_buku');
        $book->cover = $filename; // Simpan nama file gambar
        $book->penulis = $request->input('penulis');
        $book->penerbit = $request->input('penerbit');
        $book->tahun_buku = $request->input('tahun_buku');
        $book->edisi_buku = $request->input('edisi_buku');
        $book->id_kategori = $request->input('id_kategori');
        $book->stocks = $request->input('stocks');
    
        $book->save();
    
        return redirect('/books')->with('status', 'Book Added Successfully');
    }

    public function user(){
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Jika ada pengguna yang login, ambil data rentlog berdasarkan user_id
        if ($user) {
            $rentlog = rentlog::where('id_user', $user->id)->get();
            return view('Halaman/books-user', ['rentlog' => $rentlog]);
        } else {
            // Handle ketika tidak ada pengguna yang login
            return redirect()->route('login'); // Atau arahkan ke halaman login sesuai kebutuhan
        }
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'id' => 'required|max:20',
            'judul_buku' => 'required|max:100',
            // 'cover' => 'sometimes|image|mimes:png,jpg,jpeg', // Validasi gambar
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun_buku' => 'required|integer|regex:/^\d{4}$/',
            'edisi_buku' => 'required|max:100',
            'id_kategori' => 'required|max:20',
            'stocks' => 'required|max:11',
        ]);
    
        $books = Book::where('slug', $slug)->first();
    
        if (!$books) {
            return redirect('/books')->with('error', 'Book not found.');
        }
    
        // Lakukan validasi dan pemrosesan file gambar di sini
        $currentCover = $books->cover;

        // Jika ada file gambar baru yang diunggah, gunakan nama file gambar saat ini
        if ($request->hasFile('cover')) {
            $filename = $currentCover;
            $request->cover->move(public_path('cover'), $filename);
        }

        $books->update($request->all());
    
        return redirect('/books')->with('status', 'Book Updated Successfully');
    }

    public function request(){
        return view ('Halaman/books-request');
    }

    public function storerequest(Request $request){ 
    {
        $validated = $request->validate([
            'judul_buku' => 'required|max:100',
            'cover' => 'sometimes|image|mimes:png,jpg,jpeg', // Validasi gambar
            'penulis' => 'max:255',
            'kategori' => 'required|max:100',
            'penerbit' => 'max:255',
            'tahun_buku' => 'integer|regex:/^\d{4}$/',
            'edisi_buku' => 'max:100',
        ]);
        $filename = null; // Mendefinisikan $filename dengan nilai default null
        if ($request->hasFile('cover')) {
            $filename = time() . '.' . $request->cover->getClientOriginalExtension();
            $request->cover->move(public_path('cover'), $filename);
        }

        $requestbook = new requestbook();
        $requestbook->judul_buku = $request->input('judul_buku');
        $requestbook->penulis = $request->input('penulis');
        $requestbook->cover = $filename; // Simpan nama file gambar
        $requestbook->kategori = $request->input('kategori');
        $requestbook->penerbit = $request->input('penerbit');
        $requestbook->tahun_buku = $request->input('tahun_buku');
        $requestbook->edisi_buku = $request->input('edisi_buku');
        $requestbook->username = Auth::user()->username;
        $requestbook->save();

    
        return redirect('/books-request')->with('status', 'Book Request Success');
    }

    
}
public function user2(){
    // Mendapatkan pengguna yang sedang login
    $user = Auth::user();

    // Jika ada pengguna yang login, ambil data rentlog berdasarkan user_id
    if ($user) {
        $requestbook = requestbook::where('username', $user->username)->get();
        return view('Halaman/books-user2', ['requestbook' => $requestbook]);
    } else {
        // Handle ketika tidak ada pengguna yang login
        return redirect()->route('login'); // Atau arahkan ke halaman login sesuai kebutuhan
    }
}
public function request2()
{
    $request = requestbook::all();
    return view('Halaman/books-user3',['request'=>$request]);
}

public function request3()
{
    $request = requestbook::all();
    return view('Halaman/books-history',['request'=>$request]);
}

public function return(){
    $requestbook = requestbook::whereRaw('created_at = updated_at')->get();
    $uniqueUsers = requestbook::select('username')->distinct()->get();
    // dd($requestbook);
   return view('Halaman/books-edit-request',['requestbook'=>$requestbook,'username'=>$uniqueUsers]);
}

public function saveReturnBook(Request $request) {
    $username = $request->input('username');
    $judulBuku = $request->input('judul_buku');

    $requestbook = requestbook::where('username', $username)
        ->where('judul_buku', $judulBuku)
        ->first();

        // dd($requestbook); 
    if ($requestbook) {
        // Transaksi peminjaman ditemukan
        $requestbook->updated_at = now();
        $requestbook->save();
        Session::flash('message', 'Buku berhasil dikembalikan.');
    } else {
        // Transaksi peminjaman tidak ditemukan
        Session::flash('message', 'Transaksi peminjaman tidak ditemukan.');
        Session::flash('alert-class', 'alert-danger');
    }

    return redirect('books-edit-request');
}


}

