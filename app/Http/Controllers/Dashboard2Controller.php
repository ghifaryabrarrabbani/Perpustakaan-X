<?php

namespace App\Http\Controllers;

use App\Models\fact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class Dashboard2Controller extends Controller
{
    public function index()
    {
        $bookcount = fact::with('pustaka2')->get()->pluck('pustaka2')->count();
        $usersReturnedOnTime = DB::table('fact_table')
            ->select('sk_user')
            ->whereRaw('DATEDIFF(sk_kembali, sk_pinjam) <= 7')
            ->get();
        $usersReturnedOnTime = count($usersReturnedOnTime);
        $usersReturnedNotOnTime = DB::table('fact_table')
        ->select('sk_user')
        ->whereRaw('DATEDIFF(sk_kembali, sk_pinjam) > 7')
        ->get();
        $usersReturnedNotOnTime = count($usersReturnedNotOnTime);
        $usersborrow = fact::distinct()->pluck('sk_user');
        $usersborrow = count($usersborrow);

        $tabel = fact::all();

        $tahun = DB::table('fact_table')
        ->select(
            DB::raw('YEAR(dim_waktu.tanggal) AS tahun'),
            DB::raw('COUNT(*) AS total')
        )
        ->join('dim_waktu', 'fact_table.sk_pinjam', '=', 'dim_waktu.sk_waktu')
        ->groupBy(
            DB::raw('YEAR(dim_waktu.tanggal)')
        )
        ->get();

        $quarter = DB::table('fact_table')
        ->select(
            DB::raw('YEAR(dim_waktu.tanggal) AS tahun'),
            DB::raw('QUARTER(dim_waktu.tanggal) AS quarter'),
            DB::raw('COUNT(*) AS total')
        )
        ->join('dim_waktu', 'fact_table.sk_pinjam', '=', 'dim_waktu.sk_waktu')
        ->groupBy(
            DB::raw('YEAR(dim_waktu.tanggal)'),
            DB::raw('QUARTER(dim_waktu.tanggal)')
        )
        ->get();

        $tahun2 = DB::table('fact_table')
        ->select(
            DB::raw('YEAR(dim_waktu.tanggal) AS tahun'),
            DB::raw('COUNT(*) AS total')
        )
        ->join('dim_waktu', 'fact_table.sk_kembali', '=', 'dim_waktu.sk_waktu')
        ->groupBy(
            DB::raw('YEAR(dim_waktu.tanggal)')
        )
        ->get();

        $quarter2 = DB::table('fact_table')
        ->select(
            DB::raw('YEAR(dim_waktu.tanggal) AS tahun'),
            DB::raw('QUARTER(dim_waktu.tanggal) AS quarter'),
            DB::raw('COUNT(*) AS total')
        )
        ->join('dim_waktu', 'fact_table.sk_kembali', '=', 'dim_waktu.sk_waktu')
        ->groupBy(
            DB::raw('YEAR(dim_waktu.tanggal)'),
            DB::raw('QUARTER(dim_waktu.tanggal)')
        )
        ->get();

        // $month = DB::table('fact_table')
        // ->select(
        //     DB::raw('YEAR(dim_waktu.tanggal) AS tahun'),
        //     DB::raw('QUARTER(dim_waktu.tanggal) AS quarter'),
        //     DB::raw('MONTH(dim_waktu.tanggal) AS bulan'),
        //     DB::raw('COUNT(*) AS total')
        // )
        // ->join('dim_waktu', 'fact_table.sk_kembali', '=', 'dim_waktu.sk_waktu')
        // ->groupBy(
        //     DB::raw('YEAR(dim_waktu.tanggal)'),
        //     DB::raw('QUARTER(dim_waktu.tanggal)'),
        //     DB::raw('MONTH(dim_waktu.tanggal)')
        // )
        // ->get();

        $kategoripinjam = DB::table('fact_table as ft')
        ->join('dim_pustaka as dp', 'ft.sk_pustaka', '=', 'dp.sk_pustaka')
        ->join('dim_waktu as dw', 'ft.sk_pinjam', '=', 'dw.sk_waktu')
        ->select(
            DB::raw('YEAR(dw.tanggal) AS tahun'),
            DB::raw('QUARTER(dw.tanggal) AS quarter'),
            'dp.category',
            DB::raw('COUNT(*) AS total')
        )
        ->groupBy('tahun', 'quarter', 'dp.category', 'dw.tanggal')
        ->orderBy('tahun')
        ->orderBy('quarter')
        ->get();

        $kategoriPengembalian = DB::table('fact_table as ft')
        ->join('dim_pustaka as dp', 'ft.sk_pustaka', '=', 'dp.sk_pustaka')
        ->join('dim_waktu as dw', 'ft.sk_kembali', '=', 'dw.sk_waktu')
        ->select(
            DB::raw('YEAR(dw.tanggal) AS tahun'),
            DB::raw('QUARTER(dw.tanggal) AS quarter'),
            'dp.category', 'dp.judul_buku',
            DB::raw('COUNT(*) AS total')
        )
        ->groupBy('tahun', 'quarter', 'dp.category', 'dp.judul_buku', 'dw.tanggal')
        ->orderBy('tahun')
        ->orderBy('quarter')
        ->get();
    


        $dataKembali = DB::table('fact_table')
        ->select(
            'dim_waktu.tahun',
            DB::raw('COUNT(fact_table.sk_kembali) as total_kembali')
        )
        ->join('dim_waktu', 'fact_table.sk_kembali', '=', 'dim_waktu.sk_waktu')
        ->groupBy('dim_waktu.tahun')
        ->orderBy('dim_waktu.tahun')
        ->get();
    
        $dataPinjam = DB::table('fact_table')
        ->select(
            'dim_waktu.tahun',
            DB::raw('COUNT(fact_table.sk_pinjam) as total_pinjam')
        )
        ->join('dim_waktu', 'fact_table.sk_pinjam', '=', 'dim_waktu.sk_waktu')
        ->groupBy('dim_waktu.tahun')
        ->orderBy('dim_waktu.tahun')
        ->get();
    
        $categories10 = DB::table('fact_table')
        ->select(
            'dim_pustaka.category as kategori',
            'dim_waktu.tahun',
            DB::raw('COUNT(fact_table.sk_pustaka) as total')
        )
        ->join('dim_pustaka', 'fact_table.sk_pustaka', '=', 'dim_pustaka.sk_pustaka')
        ->join('dim_waktu', 'fact_table.sk_pinjam', '=', 'dim_waktu.sk_waktu')
        ->groupBy('dim_pustaka.category', 'dim_waktu.tahun')
        ->orderBy('dim_waktu.tahun')
        ->get();

        $categories2 = DB::table('fact_table')
        ->select(
            'dim_pustaka.category as kategori',
            'dim_waktu.tahun',
            DB::raw('COUNT(fact_table.sk_pustaka) as total')
        )
        ->join('dim_pustaka', 'fact_table.sk_pustaka', '=', 'dim_pustaka.sk_pustaka')
        ->join('dim_waktu', 'fact_table.sk_kembali', '=', 'dim_waktu.sk_waktu')
        ->groupBy('dim_pustaka.category', 'dim_waktu.tahun')
        ->orderBy('dim_waktu.tahun')
        ->get();


        $active = DB::table('dim_user')
        ->where('status', '=', 'Active')
        ->count('id');

        $booksByYearAndQuarter = DB::table('fact_table as ft')
        ->join('dim_pustaka as dp', 'ft.sk_pustaka', '=', 'dp.sk_pustaka')
        ->join('dim_waktu as dw', 'ft.sk_kembali', '=', 'dw.sk_waktu')
        ->select(
            DB::raw('YEAR(dw.tanggal) AS tahun'),
            DB::raw('QUARTER(dw.tanggal) AS quarter'),
            'dp.category',
            'dp.judul_buku',
            DB::raw('COUNT(dp.judul_buku) as TOTAL')
        )
        ->groupBy('tahun', 'quarter', 'dp.category', 'dw.tanggal', 'dp.judul_buku')
        ->orderBy('tahun', 'asc')
        ->orderBy('quarter', 'asc')
        ->get()
        ->groupBy(['tahun', 'quarter', 'category']);

        $booksByYearAndQuarter2 = DB::table('fact_table as ft')
        ->join('dim_pustaka as dp', 'ft.sk_pustaka', '=', 'dp.sk_pustaka')
        ->join('dim_waktu as dw', 'ft.sk_pinjam', '=', 'dw.sk_waktu')
        ->select(
            DB::raw('YEAR(dw.tanggal) AS tahun'),
            DB::raw('QUARTER(dw.tanggal) AS quarter'),
            'dp.category',
            'dp.judul_buku',
            DB::raw('COUNT(dp.judul_buku) as TOTAL')
        )
        ->groupBy('tahun', 'quarter', 'dp.category', 'dw.tanggal', 'dp.judul_buku')
        ->orderBy('tahun', 'asc')
        ->orderBy('quarter', 'asc')
        ->get()
        ->groupBy(['tahun', 'quarter', 'category']);

        

        // $tahunSeries = [];
        // $drilldownSeries = [];
        
        // foreach ($booksByYearAndQuarter2 as $tahun3 => $quarters) {
        //     $totalPerYear = 0;
        //     $drilldownData = [];
        
        //     foreach ($quarters as $quarter3 => $categories) {
        //         $totalPerQuarter = 0;
        //         $categoryData = [];
        
        //         foreach ($categories as $category => $books) {
        //             $totalPerCategory = $books->sum('TOTAL5');
        //             $totalPerQuarter += $totalPerCategory;
        
        //             $categoryData[] = [
        //                 'name' => $category,
        //                 'y' => $totalPerCategory,
        //             ];
        //         }
        
        //         $drilldownData[] = [
        //             'name' => 'Quarter ' . $quarter3,
        //             'id' => $tahun3 . '_Q' . $quarter3,
        //             'data' => $categoryData,
        //         ];
        
        //         $totalPerYear += $totalPerQuarter;
        //     }
        
        //     $tahunSeries[] = [
        //         'name' => $tahun3,
        //         'y' => $totalPerYear,
        //         'drilldown' => $tahun3,
        //     ];
        
        //     $drilldownSeries[] = $drilldownData;
        // }
        
        // $tahunSeriesJSON = json_encode($tahunSeries);
        // $drilldownSeriesJSON = json_encode($drilldownSeries);
        // $categoriesData = json_encode($categoryData);

    
        // $booksByYearAndQuarter = $booksByYearAndQuarter->groupBy(['tahun', 'quarter', 'category']);

        return view('Halaman/dashboard2',[
            'bookcount'=>$bookcount,
            'usersReturnedOnTime'=>$usersReturnedOnTime,
            'usersReturnedNotOnTime' => $usersReturnedNotOnTime,
            'usersborrow' => $usersborrow,
            'tahun' => $tahun,
            'quarter' => $quarter,
            'tabel' => $tabel,
            'dataKembali' => $dataKembali,
            'dataPinjam' =>$dataPinjam ,
            'categories10' => $categories10,
            'categories2' => $categories2,
            'tahun2' => $tahun2,
            'quarter2' => $quarter2,
            'active' => $active,
            'kategoripinjam' =>$kategoripinjam,
            'kategoriPengembalian' => $kategoriPengembalian,
            'booksByYearAndQuarter' => $booksByYearAndQuarter,
            'booksByYearAndQuarter2' => $booksByYearAndQuarter2,
            // 'tahunSeriesJSON' => $tahunSeriesJSON,
            // 'drilldownSeriesJSON' => $drilldownSeriesJSON,
            // 'categoriesData' => $categoriesData
        
        ]);
    }
    // public function filterBooks(Request $request)
    // {
    //     $selectedYear = $request->input('selectedYear');
    //     $selectedQuarter = $request->input('selectedQuarter');

    //     $filteredBooks = DB::table('fact_table as ft')
    //     ->join('dim_pustaka as dp', 'ft.sk_pustaka', '=', 'dp.sk_pustaka')
    //     ->join('dim_waktu as dw', 'ft.sk_kembali', '=', 'dw.sk_waktu')
    //     ->select(
    //         DB::raw('YEAR(dw.tanggal) AS tahun'),
    //         DB::raw('QUARTER(dw.tanggal) AS quarter'),
    //         'dp.category',
    //         'dp.judul_buku',
    //         DB::raw('COUNT(dp.judul_buku) as TOTAL')
    //     )
    //     ->whereYear('dw.tanggal', $selectedYear)
    //     ->where(DB::raw('QUARTER(dw.tanggal)'), $selectedQuarter)
    //     ->groupBy('tahun', 'quarter', 'dp.category', 'dw.tanggal', 'dp.judul_buku')
    //     ->orderBy('tahun', 'asc')
    //     ->orderBy('quarter', 'asc')
    //     ->get()
    //     ->groupBy(['tahun', 'quarter', 'category']);

    //     return response()->json($filteredBooks);
    // }
}