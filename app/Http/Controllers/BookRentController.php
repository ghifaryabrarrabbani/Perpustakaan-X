<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\rentlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users=User::where('id_role', '!=', 1)->where('status','!=','inactive')->get();
        $books=Book::all();
        return view('Halaman/book-rent', ['users' => $users, 'books'=> $books] );
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
    
            // Mengambil 'id_pustaka' dari data permintaan
            $id_pustaka = $request->id_pustaka;
    
            // Mengambil data buku berdasarkan 'id_pustaka'
            $book = Book::findOrFail($id_pustaka);
    
            // Mengecek stok buku
            if ($book->stocks == 0) {
                Session::flash('message', 'Cannot Rent. The book is not available');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }
    
            // Menghitung jumlah penyewaan yang sedang aktif untuk pengguna
            $count = Rentlog::where('id_user', $request->id_user)
                ->whereNull('tanggal_asli_kembali')
                ->count();
    
            if ($count >= 3) {
                Session::flash('message', 'You have reached the maximum number of active rentals.');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }
    
            // Menyimpan data penyewaan
            Rentlog::create([
                'id_user' => $request->id_user,
                'id_pustaka' => $id_pustaka,
                'tanggal_sewa' => Carbon::now()->toDateString(),
                'tanggal_kembali' => Carbon::now()->addDay(7)->toDateString(),
            ]);
    
            // Mengurangi stok buku
            $book->stocks -= 1;
            $book->save();
    
            DB::commit();
    
            Session::flash('message', 'Success!');
            Session::flash('alert-class', 'alert-success');
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th);
            Session::flash('message', 'An error occurred. Please try again.');
            Session::flash('alert-class', 'alert-danger');
        }
    
        return redirect('book-rent');
    }
    
    public function return(){
        $users=User::where('id_role', '!=', 1)->where('status','!=','inactive')->get();
        $books=Book::all();
        return view('Halaman/book-return',['users'=> $users,'books'=> $books]);
    }

    public function saveReturnBook(Request $request) {
        $rentlog = Rentlog::where('id_user', $request->id_user)
            ->where('id_pustaka', $request->id_pustaka)
            ->whereNull('tanggal_asli_kembali')
            ->first();
    
        if ($rentlog) {
            // Transaksi peminjaman ditemukan
            $rentlog->tanggal_asli_kembali = Carbon::now()->toDateString();
            $rentlog->save();
    
            // Mengembalikan stok buku
            $book = Book::find($request->id_pustaka);
            if ($book) {
                $book->stocks += 1;
                $book->save();
                Session::flash('message', 'Buku berhasil dikembalikan.');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Buku tidak ditemukan.');
                Session::flash('alert-class', 'alert-danger');
            }
        } else {
            // Transaksi peminjaman tidak ditemukan
            Session::flash('message', 'Transaksi peminjaman tidak ditemukan.');
            Session::flash('alert-class', 'alert-danger');
        }
    
        return redirect('book-return');
    }
    
}