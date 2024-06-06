<?php

namespace App\Charts;
use App\Models\Book;
use App\Models\Category;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class jumlahkategorichart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }
    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $chartData = Book::join('kategori', 'pustaka.id_kategori', '=', 'kategori.id')
                        ->groupBy('kategori.category')
                        ->selectRaw('kategori.category as kategori, COUNT(*) as total_per_kategori')
                        ->get();

        return $this->chart->pieChart()
            ->addData($chartData->pluck('total_per_kategori')->toArray())
            ->setLabels($chartData->pluck('kategori')->toArray())// Mengatur posisi legend ke bawah
            ; // Mengatur posisi legend ke bawa;
    }

    }
