<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\rentlog;
use App\Models\Category;
use App\Models\requestbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\jumlahkategorichart;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $rentlog = rentlog::all();
        $userCount = User::whereIn('id_role', [2, 3])->where('status','Active')->count();
        $userCountI = User::whereIn('id_role', [2, 3])->where('status','Inactive')->count();
        $totalPerCategory = Book::join('kategori', 'pustaka.id_kategori', '=', 'kategori.id')
        ->select('kategori.category', DB::raw('COUNT(*) as total'))
        ->groupBy('pustaka.id_kategori', 'kategori.category')
        ->get();

        $request = requestbook::all();
        $categories = $totalPerCategory->pluck('category')->all();
        $jumlahPerKategori = $totalPerCategory->pluck('total')->all();
         
        $jumlah = $rentlog->filter(function ($item) {
            return $item->tanggal_kembali >= $item->tanggal_asli_kembali;
        })->count();

        $jumlah2 = $rentlog->filter(function ($item) {
            return $item->tanggal_kembali < $item->tanggal_asli_kembali;
        })->count();

        return view('Halaman/dashboard',[
        'book_count'=>$bookCount, 
        'category_count'=>$categoryCount, 
        'user_count'=>$userCount, 
        'user_counti'=>$userCountI, 
        'rentlog'=>$rentlog,
        'categories'=>$categories, 
        'jumlahPerKategori'=>$jumlahPerKategori,
        'request'=>$request,
        'jumlah' => $jumlah,
        'jumlah2' => $jumlah2
        ]);
    }
}
