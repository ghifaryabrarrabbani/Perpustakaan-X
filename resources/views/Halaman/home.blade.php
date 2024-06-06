@extends('Template/app')
@section('title', 'Profile')


@section('content')
<style>
    .slider {
  position: relative;
  overflow: hidden;
  width: 100%;
  margin: 0 auto;
}

.slides {
margin-top:2px;
  display: flex;
  overflow: hidden;
  border-radius: 10px;
}

.slide {
  flex: 0 0 100%;
  transition: 0.5s ease;
}

.slide img {
  width: 100%;
  height: auto;
}

input[type="radio"] {
  display: none;
}

input[type="radio"]:checked + .slides .slide {
  transform: translateX(-100%);
}

.navigation {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
}

.navigation label {
  display: inline-block;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: gray;
  margin: 0 5px;
  cursor: pointer;
}

input[type="radio"]:checked + .navigation label {
  background-color: black;
}

.card {
    min-height: min-content; /* Tinggi card mengikuti panjang isi font */
  font-size: 1rem; /* Ukuran font yang responsif */
  
}
  .user-image img {
    width: 80px; /* Atur lebar gambar */
    height: 80px; /* Atur tinggi gambar */
    object-fit: cover; /* Memastikan gambar terisi dengan baik pada area yang ditentukan */
    border-radius: 50%; /* Untuk membuat gambar berbentuk lingkaran */
  }
  .custom-img {
    height: 400px;
    object-fit: cover;
  }

</style>
<div class="slider">
    <input type="radio" name="slider" id="slide1" checked>
    <input type="radio" name="slider" id="slide2">
    <!-- Add more input elements for additional slides -->
  
    <div class="slides">
      <div class="slide mt-2" id="img1">
        <img src="{{ asset('Images/Perpustakaan XX.jpg') }}" alt="Image 1">
      </div>
      <div class="slide" id="img2">
        <img src="{{ asset('Images/Orang 2.jpg') }}" alt="Image 2">
      </div>
    </div>
  
    <div class="navigation">
      <label for="slide1"></label>
      <label for="slide2"></label>
      <!-- Add more labels for additional slides -->
    </div>
  </div>
  
<h1 style="text-align: center"><strong>Layanan</strong> Kami </h1>
<h3 style="text-align: center">Layanan Perpustakan X </h3>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa-solid fa-hand-holding-hand mr-1"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Peminjaman</span>
              {{-- <span class="info-box-number"></span> --}}
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fa-solid fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Buku</span>
              <span class="info-box-number">29</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fa-solid fa-code-pull-request"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Request</span>
              {{-- <span class="info-box-number">13,648</span> --}}
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        {{-- <div class="col-md-4 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">93,139</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
                <div class="col-md-4 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">LOREM IPSUM</span>
              <span class="info-box-number">LOREM IPSUM</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">93,139</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div> --}}
          <!-- /.col -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <h1 style="text-align: center"><strong>Buku Terbaru</strong></h1>        
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 mb-1">
          <div class="card h-100">
            <img src="{{ asset('cover/1698311739.jpg') }}" class="card-img-top custom-img" draggable="false">
          </div>
        </div>
      
        <div class="col-lg-4 col-md-4 col-sm-6 mb-1">
          <div class="card h-100">
            <img src="{{ asset('cover/1698311964.jpg') }}" class="card-img-top custom-img" draggable="false">
          </div>
        </div>
      
        <div class="col-lg-4 col-md-4 col-sm-6 mb-1">
          <div class="card h-100">
            <img src="{{ asset('cover/1698311868.jpeg') }}" class="card-img-top custom-img" draggable="false">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary d-block mx-auto">
        <a href="books-list" style="color:white; text-decoration:none;">Lihat semua</a>
    </button>
      
        </div>
          <h1 style="text-align:center"><strong>Testimoni</strong> Kami</h1>
          <h3 style="text-align: center">Kata Mereka tentang Perpustakaan X</h3>
          <div class="row g-2 user-card">
            <div class="col-md-4">
                <div class="card p-3 text-center px-4">
                    
                    <div class="user-image">
                        
                <img src="https://tse1.mm.bing.net/th?id=OIP.6T6PcOWwq0D_Y5Ue1RuudwHaHa&pid=Api&P=0&h=180" class="rounded-circle" width="80"
                        >
                        
                    </div>
                    
                    <div class="user-content">
                        
                        <h5 class="mb-0">Indah Fahmiyah</h5>
                        <span> <strong>Dosen FTMM</strong></span>
                        <p> "Saya bangga dengan sistem penyewaan buku di Perpustakaan X. Mudah dan Lengkap."</p>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                
                <div class="card p-3 text-center px-4">
                    
                    <div class="user-image">
                        
                <img src="https://tse2.mm.bing.net/th?id=OIP.w-PDIALPOSwqyan0hF12DwHaFj&pid=Api&P=0&h=180" class="rounded-circle" width="80"
                        >
                        
                    </div>
                    
                    <div class="user-content">
                        
                        <h5 class="mb-0">Nasih</h5>
                        <span> <strong>Rektor UNAIR</strong></span>
                        <p>"Sebagai seseorang yang senang membaca, saya sungguh suka meminjam buku disini. Sangat lengkap dan mudah serta aman!"</p>
                        
                    </div>
                    
                    
                </div>
                
            </div>
        
            <div class="col-md-4">
                <div class="card p-3 text-center px-4">
                    <div class="user-image">
                <img src="https://scholar.unair.ac.id/files-asset/27566391/IMG_20211114_110935.jpg?w=320&f=webp" class="rounded-circle" width="80"
                        >
                    </div>
                    <div class="user-content">
                        <h5 class="mb-0">Sediono</h5>
                        <span> <strong>Dosen FST</strong></span>
                        <p>"Saya selalu menyarankan mahasiswa saya untuk mencari buku disini. Saya sendiri pun juga suka meminjam buku disini."</p>
                    </div>
                </div>
            </div>
              
<script>
    // JavaScript to automatically change slides every 5 seconds
let currentSlide = 0;
const slides = document.querySelectorAll('.slider input[type="radio"]');

function nextSlide() {
  slides[currentSlide].checked = false;
  currentSlide = (currentSlide + 1) % slides.length;
  slides[currentSlide].checked = true;
}

setInterval(nextSlide, 4000); // Change slide every 5 seconds (5000 milliseconds)
// Temukan tinggi terpanjang dari semua card
window.onload = function() {
  const cards = document.querySelectorAll('.user-card .card');
  
  let maxHeight = 0;
  cards.forEach(function(card) {
    const cardHeight = card.offsetHeight;
    if (cardHeight > maxHeight) {
      maxHeight = cardHeight;
    }
  });

  cards.forEach(function(card) {
    card.style.minHeight = maxHeight + 'px';
  });
}

</script>
@endsection