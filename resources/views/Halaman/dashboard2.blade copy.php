@extends('Template/app')
@section('title', 'Dashboard')


<!-- benerin ikon -->
@section('content')
<style>
  /* Aturan CSS untuk mengubah ukuran legenda */
  .apexcharts-legend {
      font-size: 14px; /* Atur ukuran sesuai keinginan */
  }
</style>

<h1>Dashboard</h1>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$bookcount}}</h3>

                <p>Total Peminjaman</p>
              </div>
            </div>
          </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$usersReturnedOnTime}}</h3>
  
                  <p>Tepat Waktu</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$usersReturnedNotOnTime}}</h3>
  
                  <p>Telat</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>{{$usersborrow}}</h3>
  
                  <p>Activated User</p>
                </div>
              </div>
            </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>


  <div class="row">
    <div class="col-md-6 mb-2">
<div class="panel">
  <div id="user1"></div>
</div>
    </div>
 <div class="col-md-6">
<div class="panel">
  <div id="user"></div>
</div>
    </div>
  </div>

  {{-- <div class='col-12 mt-2'>
    <figure class="highcharts-figure">
      <div id="container2"></div>
    </figure>
      </div> --}}

      <div class=col-12>
        <script src="https://code.highcharts.com/highcharts.js"></script>
          <script src="https://code.highcharts.com/modules/exporting.js"></script>
          <script src="https://code.highcharts.com/modules/export-data.js"></script>
          <script src="https://code.highcharts.com/modules/accessibility.js"></script>
          <figure class="highcharts-figure">
          <div id="container"></div>
          </figure>
      </div>
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Table sewa</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 300px;">
      <table class="table table-head-fixed text-nowrap" id='example2'>
        <thead>
          <tr>
            <th>ID Sewa
              {{-- <span class="float-right text-sm">
                <i class="fa fa-arrow-up text-muted" style="margin-left: 5px;"></i>
                <i class="fa fa-arrow-down"></i>
              </span> --}}
            </th>
            <th>Judul Buku</th>
            <th>Username</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
          </tr>
        </thead>
        @foreach ($tabel as $item)
        <tr>
          {{-- <tr class="{{ $item->tanggal_asli_kembali == null ? '' : ($item->tanggal_kembali < $item->tanggal_asli_kembali ? 'table-danger' : 'table-success') }}"> --}}
            <td>{{ $item->sk_sewa}}
            <td>{{ $item->pustaka2->judul_buku}}</td>
            <td>{{ $item->user2->username}}</td>
            <td>{{ $item->waktupinjam->tanggal}}</td> 
            <td>{{ $item->waktukembali->tanggal}}</td>
            <td>
              @if ($item->sk_kembali === null)
              Belum dikembalikan
          @else
              @php
                  // Menghitung selisih waktu (dalam hari) antara waktu pinjam dan waktu pengembalian
                  $kembali = new Datetime($item->waktukembali->sk_waktu);
                  $pinjam = new Datetime($item->waktupinjam->sk_waktu);
                  $selisih = $kembali->diff($pinjam)->days;
              @endphp
              @if ($selisih > 7)
                  <span style="color: red"><strong>TELAT</strong></span>
              @else
                  <span style="color: green"><strong>TEPAT WAKTU</strong></span>
              @endif
          @endif
      </td> 
  </tr>
@endforeach
      </table>    
    </div>
  </div>  
</div>

<div class='row'>
<div class='col-6 mt-2'>
  <figure class="highcharts-figure">
    <div id="container2"></div>
  </figure>
    </div>
    <div class='col-6 mt-2'>
      <figure class="highcharts-figure">
        <div id="container3"></div>
      </figure>
        </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
<div class="panel">
  <div id="bar"></div>
</div>
    </div>
 <div class="col-md-6">
<div class="panel">
  <div id="bar2"></div>
</div>
    </div>
  </div>

           <div class="row"> 
            <div class="col-md-6 mt-2">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Table Peminjaman</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-head-fixed text-nowrap" >
                    <thead>
                      <tr>
                          <th>Tahun</th>
                          <th>Kuartal</th>
                          <th>Kategori</th>
                          <th>Judul Buku</th>
                          <th>Total</th>
                      </tr>
                      <tbody>
                        @php
                        $groupedByYearQuarter = [];
                    
                        foreach ($booksByYearAndQuarter2 as $year => $quarters) {
                            foreach ($quarters as $quarter => $categories) {
                                foreach ($categories as $category => $books) {
                                    foreach ($books as $book) {
                                        if (!isset($groupedByYearQuarter[$year][$quarter][$category][$book->judul_buku])) {
                                            $groupedByYearQuarter[$year][$quarter][$category][$book->judul_buku] = 1;
                                        } else {
                                            $groupedByYearQuarter[$year][$quarter][$category][$book->judul_buku]++;
                                        }
                                    }
                                }
                            }
                        }
                    @endphp
                    
                    @foreach ($groupedByYearQuarter as $year => $quarters)
                        @foreach ($quarters as $quarter => $categories)
                            @php $rowspan = count($categories); @endphp
                            @foreach ($categories as $category => $books)
                                <tr>
                                    @if ($loop->first)
                                        <td rowspan="{{ $rowspan }}">{{ $year }}</td>
                                        <td rowspan="{{ $rowspan }}">{{ $quarter }}</td>
                                    @endif
                                    <td>{{ $category }}</td>
                                    <td>{{ implode(', ', array_keys($books)) }}</td>
                                    <td>{{ array_sum($books) }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                    
                    
                    </tbody>
        
                  </table>    
                </div>
              </div>  
            </div>

      

              <!-- <div class="row"> -->
                <div class="col-md-6 mt-2">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Table Pengembalian</h3>
                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                      <table class="table table-head-fixed text-nowrap" >
                        <thead>
                          <tr>
                              <th>Tahun</th>
                              <th>Kuartal</th>
                              <th>Kategori</th>
                              <th>Judul Buku</th>
                              <th>Total</th>
                          </tr>
                          <tbody>
                            @php
                            $groupedByYearQuarter = [];
                        
                            foreach ($booksByYearAndQuarter as $year => $quarters) {
                                foreach ($quarters as $quarter => $categories) {
                                    foreach ($categories as $category => $books) {
                                        foreach ($books as $book) {
                                            if (!isset($groupedByYearQuarter[$year][$quarter][$category][$book->judul_buku])) {
                                                $groupedByYearQuarter[$year][$quarter][$category][$book->judul_buku] = 1;
                                            } else {
                                                $groupedByYearQuarter[$year][$quarter][$category][$book->judul_buku]++;
                                            }
                                        }
                                    }
                                }
                            }
                        @endphp
                        
                        @foreach ($groupedByYearQuarter as $year => $quarters)
                            @foreach ($quarters as $quarter => $categories)
                                @php $rowspan = count($categories); @endphp
                                @foreach ($categories as $category => $books)
                                    <tr>
                                        @if ($loop->first)
                                            <td rowspan="{{ $rowspan }}">{{ $year }}</td>
                                            <td rowspan="{{ $rowspan }}">{{ $quarter }}</td>
                                        @endif
                                        <td>{{ $category }}</td>
                                        <td>{{ implode(', ', array_keys($books)) }}</td>
                                        <td>{{ array_sum($books) }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                        
                        
                        </tbody>
            
                      </table>    
                    </div>
                  </div>  
                </div>
           </div>

           <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

           {{-- <div id='bar3'></div> --}}

           <script>
            // Mengubah data peminjaman buku dari PHP menjadi array JavaScript
            var peminjamanData = {!! json_encode($kategoripinjam) !!};
        
            // Mengubah format data peminjaman buku sesuai dengan struktur yang dibutuhkan oleh Highcharts
            var tahunSeries = [];
            var drilldownSeries = [];
        
            peminjamanData.forEach(item => {
                var tahunIndex = tahunSeries.findIndex(element => element.name === item.tahun);
        
                if (tahunIndex === -1) {
                    tahunSeries.push({
                        name: item.tahun,
                        y: item.total,
                        drilldown: 'drilldown_' + item.tahun
                    });
        
                    drilldownSeries.push({
                        id: 'drilldown_' + item.tahun,
                        data: []
                    });
                } else {
                    tahunSeries[tahunIndex].y += item.total;
                }
        
                var drilldownIndex = drilldownSeries.findIndex(element => element.id === 'drilldown_' + item.tahun);
                if (drilldownIndex === -1) {
                    drilldownSeries.push({
                        id: 'drilldown_' + item.tahun,
                        data: []
                    });
                }
        
                var quarterData = drilldownSeries[drilldownIndex].data.find(element => element.name === 'Quarter ' + item.quarter);
        
                if (!quarterData) {
                    quarterData = {
                        name: 'Quarter ' + item.quarter,
                        id: 'Quarter ' + item.quarter,
                        data: [],
                        drilldown: 'drilldown_' + item.tahun + 'quarter' + item.quarter,
                        y: 0
                    };
                    drilldownSeries[drilldownIndex].data.push(quarterData);
                }
        
                quarterData.y += item.total;
        
                var kategoriData = quarterData.data.find(element => element.name === item.category);
        
                if (!kategoriData) {
                    kategoriData = {
                        name: item.category,
                        y: item.total,
                        drilldown: 'drilldown_' + item.tahun + 'quarter' + item.quarter + 'category' + item.category // Tentukan drilldown untuk kategori
                    };
                    quarterData.data.push(kategoriData);
                } else {
                    kategoriData.y += item.total;
                    // Pastikan bahwa properti drilldown diatur untuk kategori yang sudah ada jika diperlukan
                    kategoriData.drilldown = 'drilldown_' + item.tahun + 'quarter' + item.quarter + 'category' + item.category;
                }
            });
        
            // Konfigurasi Highcharts dengan data peminjaman yang sudah diproses
            Highcharts.chart('bar', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Drilldown Peminjaman Buku'
                },
                xAxis: {
                    type: 'category'
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: [{
                    name: 'Year',
                    colorByPoint: true,
                    data: tahunSeries
                }],
                drilldown: {
                    series: drilldownSeries
                }
            });
            console.log(tahunSeries)
            console.log(drilldownSeries)
        </script>

        
<script>
  // Mengubah data peminjaman buku dari PHP menjadi array JavaScript
  var pengembalianData = {!! json_encode($kategoriPengembalian) !!};

  // Mengubah format data peminjaman buku sesuai dengan struktur yang dibutuhkan oleh Highcharts
  var tahunSeries = [];
  var drilldownSeries = [];

  pengembalianData.forEach(item => {
      var tahunIndex = tahunSeries.findIndex(element => element.name === item.tahun);

      if (tahunIndex === -1) {
          tahunSeries.push({
              name: item.tahun,
              y: item.total,
              drilldown: 'drilldown_' + item.tahun
          });

          drilldownSeries.push({
              id: 'drilldown_' + item.tahun,
              data: []
          });
      } else {
          tahunSeries[tahunIndex].y += item.total;
      }

      var drilldownIndex = drilldownSeries.findIndex(element => element.id === 'drilldown_' + item.tahun);
      if (drilldownIndex === -1) {
          drilldownSeries.push({
              id: 'drilldown_' + item.tahun,
              data: []
          });
      }

      var quarterData = drilldownSeries[drilldownIndex].data.find(element => element.name === 'Quarter ' + item.quarter);

      if (!quarterData) {
          quarterData = {
              name: 'Quarter ' + item.quarter,
              id: 'Quarter ' + item.quarter,
              data: [],
              drilldown: 'drilldown_' + item.tahun + 'quarter' + item.quarter,
              y: 0
          };
          drilldownSeries[drilldownIndex].data.push(quarterData);
      }

      quarterData.y += item.total;

      var kategoriData = quarterData.data.find(element => element.name === item.category);

      if (!kategoriData) {
          kategoriData = {
              name: item.category,
              y: item.total,
              drilldown: 'drilldown_' + item.tahun + 'quarter' + item.quarter + 'category' + item.category // Tentukan drilldown untuk kategori
          };
          quarterData.data.push(kategoriData);
      } else {
          kategoriData.y += item.total;
          // Pastikan bahwa properti drilldown diatur untuk kategori yang sudah ada jika diperlukan
          kategoriData.drilldown = 'drilldown_' + item.tahun + 'quarter' + item.quarter + 'category' + item.category;
      }
  });

  // Konfigurasi Highcharts dengan data peminjaman yang sudah diproses
  Highcharts.chart('bar2', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Drilldown Pengembalian Buku'
      },
      xAxis: {
          type: 'category'
      },
      legend: {
          enabled: false
      },
      plotOptions: {
          series: {
              borderWidth: 0,
              dataLabels: {
                  enabled: true
              }
          }
      },
      series: [{
          name: 'Year',
          colorByPoint: true,
          data: tahunSeries
      }],
      drilldown: {
          series: drilldownSeries
      }
  });
  console.log(tahunSeries)
  console.log(drilldownSeries)
</script>



{{-- <script>
  // Mengubah data tahun menjadi array JavaScript
var tahunData = {!! json_encode($tahun) !!};

// Mengubah format data tahun sesuai dengan struktur yang dibutuhkan oleh Highcharts
var tahunSeries = tahunData.map((item, index) => ({
  name: item.tahun,
  y: item.total,
  drilldown: 'drilldown_' + index
}));

// Mengambil data hewan berdasarkan tahun dan quarter
var hewanData = {};

// Menambahkan data hewan berdasarkan tahun dan quarter
tahunData.forEach((item, index) => {
  var quarterData = {!! json_encode($quarter) !!}.filter(data => data.tahun === item.tahun);
  var hewanByQuarter = {};

  quarterData.forEach(data => {
    var quarter = 'Quarter ' + data.quarter;
    if (!hewanByQuarter[quarter]) {
      hewanByQuarter[quarter] = 0;
    }
    hewanByQuarter[quarter] += data.total;
  });

  hewanData['drilldown_' + index] = Object.entries(hewanByQuarter);
});

// Membuat data drilldown berdasarkan data hewan
var drilldownSeries = tahunData.map((item, index) => ({
  id: 'drilldown_' + index,
  data: hewanData['drilldown_' + index]
}));

// Konfigurasi Highcharts dengan data tahun yang diperbarui
Highcharts.chart('bar', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Drilldown Peminjaman Buku'
  },
  xAxis: {
    type: 'category'
  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true
      }
    }
  },
  series: [{
    name: 'Year',
    colorByPoint: true,
    data: tahunSeries
  }],
  drilldown: {
    series: drilldownSeries
  }
});
</script> --}}

{{-- <script>
  var tahunData = {!! json_encode($tahun2) !!};
  var quarterData = {!! json_encode($quarter2) !!};

  var tahunSeries = tahunData.map(item => ({
      name: item.tahun,
      y: item.total,
      drilldown: 'drilldown_' + item.tahun
  }));

  var drilldownSeries = [];

  tahunData.forEach(item => {
      var hewanByQuarter = {};

      quarterData.forEach(data => {
          if (data.tahun === item.tahun) {
              var quarterName = 'Quarter ' + data.quarter;
              if (!hewanByQuarter[quarterName]) {
                  hewanByQuarter[quarterName] = 0;
              }
              hewanByQuarter[quarterName] += data.total;
          }
      });

      var drilldownData = Object.entries(hewanByQuarter).map(entry => ({
          name: entry[0],
          y: entry[1]
      }));

      drilldownSeries.push({
          id: 'drilldown_' + item.tahun,
          data: drilldownData
      });
  });

  Highcharts.chart('bar2', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Drilldown Pengembalian Buku'
      },
      xAxis: {
          type: 'category'
      },
      legend: {
          enabled: false
      },
      plotOptions: {
          series: {
              borderWidth: 0,
              dataLabels: {
                  enabled: true
              }
          }
      },
      series: [{
          name: 'Year',
          colorByPoint: true,
          data: tahunSeries
      }],
      drilldown: {
          series: drilldownSeries
      }
  });
console.log(drilldownSeries);
</script> --}}

{{-- <script>
  var tahunSeries = {!! $tahunSeriesJSON !!};
  var drilldownSeries = {!! $drilldownSeriesJSON !!};

  Highcharts.chart('bar3', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Drilldown Pengembalian Buku'
      },
      xAxis: {
          type: 'category'
      },
      legend: {
          enabled: false
      },
      plotOptions: {
          series: {
              borderWidth: 0,
              dataLabels: {
                  enabled: true
              }
          }
      },
      series: [{
          name: 'Year',
          colorByPoint: true,
          data: tahunSeries,
          events: {
  click: function (event) {
    var drilldownId = event.point.id;
    console.log(drilldownSeries);

    var chart = this;
    chart.showLoading('Loading data...');
    setTimeout(function () {
        chart.hideLoading();
        var drilldownData = drilldownSeries.find(function (drilldown) {
            return drilldown.id === drilldownId;
        });
        console.log(drilldownData);

        chart.addSeriesAsDrilldown(event.point, {
            name: event.point.name,
            id: drilldownId,
            data: drilldownData.data
        });

        // Perbarui data series utama dengan data drilldown yang baru ditambahkan
        var tahun = event.point.name;
        var kuartalData = Object.entries(drilldownData.data).map(entry => ({
            name: entry[0],
            y: Object.values(entry[1]).reduce((a, b) => a + b, 0),
            drilldown: entry[0]
        }));

        chart.update({
            series: [{
                name: 'Year',
                colorByPoint: true,
                data: kuartalData,
                events: {
                    click: function (event) {
                        var kuartal = event.point.name;
                        var kuartalDrilldownId = kuartal;
                        var kuartalDrilldownData = Object.entries(drilldownData.data[kuartal]).map(entry => ({
                            name: entry[0],
                            y: entry[1]
                        }));

                        chart.addSeriesAsDrilldown(event.point, {
                            name: event.point.name,
                            id: kuartalDrilldownId,
                            data: kuartalDrilldownData
                        });

                        // Perbarui data series utama dengan data kuartal yang baru ditambahkan
                        chart.update({
                            series: [{
                                data: kuartalData.map(data => {
                                    if (data.name === kuartal) {
                                        return {
                                            name: data.name,
                                            y: data.y,
                                            drilldown: kuartalDrilldownId
                                        };
                                    } else {
                                        return data;
                                    }
                                })
                            }]
                        });
                    }
                }
            }]
        });
    }, 500);
  }



          }
      }],
      drilldown: {
          series: drilldownSeries[0] // Drilldown untuk tahun pertama saat grafik pertama kali dimuat
      }
  });
  console.log(drilldownSeries[0]);
</script> --}}
<script>
Highcharts.chart('container', {
  chart: {
    type: 'area'
  },
  accessibility: {
    description: ''
  },
  title: {
    text: 'Peminjaman dan Pengembalian Buku'
  },
  subtitle: {
  },
  xAxis: {
    allowDecimals: false,
    accessibility: {
      rangeDescription: ''
    }
  },
  yAxis: {
    title: {
      text: 'Total Buku'
    }
  },
  tooltip: {
    pointFormat: '{series.name} sebanyak <b>{point.y:,.0f}</b><br/> buku pada tahun {point.x}'
  },
  plotOptions: {
    area: {
      pointStart: 2021,
      marker: {
        enabled: false,
        symbol: 'circle',
        radius: 2,
        states: {
          hover: {
            enabled: true
          }
        }
      }
    }
  },
  series: [
    {
      name: 'Pengembalian buku',
      data: [
        @foreach ($dataKembali as $data)
          {{ $data->total_kembali }},
        @endforeach
      ]
    },
    {
      name: 'Peminjaman buku',
      data: [
        @foreach ($dataKembali as $dataK)
          @php
            $found = false;
          @endphp

          @foreach ($dataPinjam as $dataP)
            @if ($dataP->tahun == $dataK->tahun)
              {{ $dataP->total_pinjam }},
              @php
                $found = true;
                break;
              @endphp
            @endif
          @endforeach

          @if (!$found)
            0,
          @endif
        @endforeach
      ]
    }
  ]
});
</script>


<script>
var categoriesData = {!! json_encode($categories2) !!};

  var seriesData = [];
  var years = [...new Set(categoriesData.map(data => data.tahun))];
  var categoryNames = [...new Set(categoriesData.map(data => data.kategori))];
  
  categoryNames.forEach(category => {
      var categoryData = {
          name: category,
          data: []
      };
  
      years.forEach(year => {
          var dataForCategoryYear = categoriesData.find(data => data.kategori === category && data.tahun === year);
          if (dataForCategoryYear) {
              categoryData.data.push(parseFloat(dataForCategoryYear.total));
          } else {
              categoryData.data.push(0);
          }
      });
      seriesData.push(categoryData);
  });
  
  Highcharts.chart('container3', {
      chart: {
          type: 'bar'
      },
      title: {
          text: 'Total Buku per Kategori yang dikembalikan per tahun',
          align: 'center'
      },
      subtitle: {},
      xAxis: {
          categories: years.map(year => 'Year ' + year),
          title: {
              text: 'Tahun'
          }
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Buku',
              align: 'high'
          }
      },
      plotOptions: {
          series: {
              stacking: 'normal'
          }
      },
      series: seriesData
  });
</script>

<script>
  var categoriesData3 = {!! json_encode($categories) !!};
  
    var seriesData = [];
    var years = [...new Set(categoriesData3.map(data => data.tahun))];
    var categoryNames = [...new Set(categoriesData3.map(data => data.kategori))];
    
    categoryNames.forEach(category => {
        var categoryData = {
            name: category,
            data: []
        };
    
        years.forEach(year => {
            var dataForCategoryYear = categoriesData3.find(data => data.kategori === category && data.tahun === year);
            if (dataForCategoryYear) {
                categoryData.data.push(parseFloat(dataForCategoryYear.total));
            } else {
                categoryData.data.push(0);
            }
        });
        seriesData.push(categoryData);
    });
    
    Highcharts.chart('container2', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Total Buku per Kategori yang dikembalikan per tahun',
            align: 'center'
        },
        subtitle: {},
        xAxis: {
            categories: years.map(year => 'Year ' + year),
            title: {
                text: 'Tahun'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Buku',
                align: 'high'
            }
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: seriesData
    });

</script>


<script>
  var categoriesData = {!! json_encode($categories2) !!};
  
    var seriesData = [];
    var years = [...new Set(categoriesData.map(data => data.tahun))];
    var categoryNames = [...new Set(categoriesData.map(data => data.kategori))];
    
    categoryNames.forEach(category => {
        var categoryData = {
            name: category,
            data: []
        };
    
        years.forEach(year => {
            var dataForCategoryYear = categoriesData.find(data => data.kategori === category && data.tahun === year);
            if (dataForCategoryYear) {
                categoryData.data.push(parseFloat(dataForCategoryYear.total));
            } else {
                categoryData.data.push(0);
            }
        });
        seriesData.push(categoryData);
    });
    
    Highcharts.chart('container3', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Total Buku per Kategori yang dikembalikan per tahun',
            align: 'center'
        },
        subtitle: {},
        xAxis: {
            categories: years.map(year => 'Year ' + year),
            title: {
                text: 'Tahun'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Buku',
                align: 'high'
            }
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: seriesData
    });
  </script>
  
  <script>
    var categoriesData4 = {!! json_encode($categories10) !!};
    
      var seriesData = [];
      var years = [...new Set(categoriesData4.map(data => data.tahun))];
      var categoryNames = [...new Set(categoriesData4.map(data => data.kategori))];
      
      categoryNames.forEach(category => {
          var categoryData = {
              name: category,
              data: []
          };
      
          years.forEach(year => {
              var dataForCategoryYear = categoriesData4.find(data => data.kategori === category && data.tahun === year);
              if (dataForCategoryYear) {
                  categoryData.data.push(parseFloat(dataForCategoryYear.total));
              } else {
                  categoryData.data.push(0);
              }
          });
          seriesData.push(categoryData);
      });
      
      Highcharts.chart('container2', {
          chart: {
              type: 'bar'
          },
          title: {
              text: 'Total Buku per Kategori yang dikembalikan per tahun',
              align: 'center'
          },
          subtitle: {},
          xAxis: {
              categories: years.map(year => 'Year ' + year),
              title: {
                  text: 'Tahun'
              }
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Buku',
                  align: 'high'
              }
          },
          plotOptions: {
              series: {
                  stacking: 'normal'
              }
          },
          series: seriesData
      });
  
  </script>


<script>
        // Build the chart
        Highcharts.chart('user1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Perbandingan Pengembalian Buku',
                align: 'center'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<span style="font-size: 1.2em"><b>{point.name}</b></span><br>' +
                            '<span style="opacity: 0.6">{point.percentage:.1f} %</span>',
                        connectorColor: 'rgba(128,128,128,0.5)'
                    }
                }
            },
            series: [{
                name: 'Share',
                data: [
                { name: 'Tepat Waktu', y: @json($usersReturnedOnTime) },
                { name: 'Tidak Tepat Waktu', y: @json($usersReturnedNotOnTime) },
                ]
            }]
            
        });

var belumMeminjam = {!! $active - $usersborrow !!};
var sudahMeminjam = {!! $usersborrow !!};
  Highcharts.chart('user', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Perbandingan Active User',
                align: 'center'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<span style="font-size: 1.2em"><b>{point.name}</b></span><br>' +
                            '<span style="opacity: 0.6">{point.percentage:.1f} %</span>',
                        connectorColor: 'rgba(128,128,128,0.5)'
                    }
                }
            },
            series: [{
                name: 'Share',
                data: [
                { name: 'Belum Pernah Meminjam', y: belumMeminjam },
                { name: 'Sudah Pernah Meminjam', y: sudahMeminjam },
                ]
            }]
        });
  </script>



@endsection