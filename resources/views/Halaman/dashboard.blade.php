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
                <h3>{{$book_count}}</h3>

                <p>Total Pustaka</p>
              </div>
              <a href="books" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$category_count}}</h3>

                <p>Total Kategori</p>
              </div>
              <a href="kategori" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$user_count}}</h3>

                <p>User Account Activate</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$user_counti}}</h3>

                <p>User Account Inactive</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="users-registered" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- <div class="row"> -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rent Book Table</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="overflow-y: auto;overflow-x: auto;">
                <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>Judul Buku</th>
                    <th>Username</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Tanggal Asli Kembali</th>
                    <th>Status</th>
                  </tr>
                  @foreach ($rentlog as $item)
                  <tr>
                    {{-- <tr class="{{ $item->tanggal_asli_kembali == null ? '' : ($item->tanggal_kembali < $item->tanggal_asli_kembali ? 'table-danger' : 'table-success') }}"> --}}
                      <td>{{ $item->book->judul_buku}}</td>
                      <td>{{ $item->user->username}}</td>
                      <td>{{ $item->tanggal_sewa }}</td>
                      <td>{{ $item->tanggal_kembali }}</td>
                      <td>{{ $item->tanggal_asli_kembali }}</td>
                      <td>
                        @if ($item->tanggal_asli_kembali === null)
                          Not Defined
                        @elseif ($item->tanggal_asli_kembali > $item->tanggal_kembali)
                          <span style="color: red"><strong>TELAT</strong></span>
                        @else
                        <span style="color: green"><strong>TEPAT WAKTU</strong></span>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
            
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Request Book Table</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="overflow-y: auto;overflow-x: auto;">
                <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>Judul Buku</th>
                    <th>Cover</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Buku</th>
                    <th>Edisi Buku</th>
                    <th>Status</th>
                  </tr>
                  @foreach ($request as $item)
                  @if ($item->created_at == $item->updated_at)
                  <tr style="color: black; background-color:white;">
                    {{-- <tr class="{{ $item->tanggal_asli_kembali == null ? '' : ($item->tanggal_kembali < $item->tanggal_asli_kembali ? 'table-danger' : 'table-success') }}"> --}}
                      <td>{{ $item->judul_buku}}</td>
                      @if ($item->cover == null)
                      <td><span style="color: red"><strong>Not Available</strong></span></td>
                      @else
                          <td><img src="{{ asset('cover/' . $item->cover) }}" class="card-img-top custom-img" draggable="false"></td>
                      @endif
                      <td>{{ $item->kategori }}</td>
                      <td>{{ $item->penulis }}</td>
                      <td>{{ $item->penerbit }}</td>
                      <td>{{ $item->tahun_buku }}</td>
                      <td>{{ $item->edisi_buku }}</td>
                      <td>
                        @if ($item->created_at == $item->updated_at)
                        <span style="color: red"><strong>Not Available</strong></span>
                        @else
                        <span style="color: green"><strong>Available</strong></span>
                        @endif
                    @endif
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
        </div>
          <!-- ./col -->
        </div>
        
        <!-- /.row -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
          <div class="panel">
            <div id="chartkategori"></div>
          </div>
              </div>
          <div class="col-md-6">
          <div class="panel">
            <div id="chartkembali">
            </div>
          </div>
          </div></div>

          <div class="col-md-6">
            <div class="panel">
              <div id="chartkembali2">

        <br>
          <!-- /.card-body -->
          <script src="https://code.highcharts.com/highcharts.js"></script>
          <script>
            Highcharts.chart('chartkategori', {
              chart: {
                  type: 'column'
              },
              title: {
                  text: 'Jumlah Buku per Kategori',
                  align: 'center'
              },
              subtitle: {
                  // text:
                  //     'Jumlah Kategori Buku',
                  // align: 'left'
              },
              xAxis: {
                  categories: @json($categories),
                  crosshair: true,
                  accessibility: {
                      description: 'Kategori'
                  }
              },
              // yAxis: {
              //     min: 0,
              //     title: {
              //         text: '1000 metric tons (MT)'
              //     }
              // },
              // tooltip: {
              //     valueSuffix: ' (1000 MT)'
              // },
              plotOptions: {
                  column: {
                      pointPadding: 0.2,
                      borderWidth: 0
                  }
              },
              series: [
                  {
                      name: 'Jumlah',
                      data: @json($jumlahPerKategori)
                  },
              ]
          });
          Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

        // Build the chart
        Highcharts.chart('chartkembali', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Pie Chart Pengembalian Buku',
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
                { name: 'Tepat Waktu', y: @json($jumlah) },
                { name: 'Tidak Tepat Waktu', y: @json($jumlah2) },
                ]
            }]
        });

    //     Highcharts.chart('chartkembali2', {
    // chart: {
    //     type: 'pie'
    // },
    // title: {
    //     text: 'Egg Yolk Composition'
    // },
    // tooltip: {
    //     valueSuffix: '%'
    // },
    // subtitle: {
    //     text:
    //     'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
    // },
    // plotOptions: {
    //     series: {
    //         allowPointSelect: true,
    //         cursor: 'pointer',
    //         dataLabels: [{
    //             enabled: true,
    //             distance: 20
    //         }, {
    //             enabled: true,
    //             distance: -40,
    //             format: '{point.percentage:.1f}%',
    //             style: {
    //                 fontSize: '1.2em',
    //                 textOutline: 'none',
    //                 opacity: 0.7
    //             },
    //             filter: {
    //                 operator: '>',
    //                 property: 'percentage',
    //                 value: 10
    //             }
    //         }]
    //     }
    // },
    // series: [
    //     {
    //         name: 'Percentage',
    //         colorByPoint: true,
    //         data: [
    //             { name: 'Tepat Waktu', y: @json($jumlah) },
    //             { name: 'Tidak Tepat Waktu', y: @json($jumlah2) },
    //             ]
    //         }]
    //     });
            
</script>
@endsection