@extends('Template/app')
@section('title', '')

@section('content')
<style>
  .custom-img {
    height: 400px;
    object-fit: cover;
  }
</style>

<form action="" method="get">
    <br>
    <div class="row">
        <div class="col-12 col-sm-6">
            <select class="form-control" name="category" id="category">
                <option value="">Seluruh Kategori</option>
                @foreach ($category as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group col-12 col-sm-6">
            <input type="search" class="form-control" placeholder="Title" id="judul_buku" name="judul_buku">
            <div class="input-group-append">
                <button type="submit" class="btn  btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
    
    </form>
          
</form>
<br>
                

<div class="row">
  @foreach ($books as $item)
  <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
    <div class="card h-100">
      <img src="{{ asset('cover/' . $item->cover) }}" class="card-img-top custom-img" draggable="false">
      <div class="card-header" style="height: 100px;">
        <h5 class="card-title">{{ Str::limit($item->judul_buku, 255) }}</h5>
      </div>
      <div class="card-body" style="overflow: hidden;">
        <p class="card-text"><strong>Penulis:</strong> {{ $item->penulis }}</p>
        <p class="card-text"><strong>Penerbit:</strong> {{ $item->penerbit }}</p>
        <p class="card-text"><strong>Tahun:</strong> {{ $item->tahun_buku }}</p>
        <p class="card-text"><strong>Edisi:</strong> {{ $item->edisi_buku }}</p>
        <p class="card-text"><strong>Kategori:</strong> {{ $item->category->category }}</p>
      </div>
      <div class="card-footer">
        <p class="card-text" style="text-align: right;"><strong>Stocks:</strong> {{ $item->stocks > 0 ? $item->stocks : 'Not Available' }}</p>
      </div>
    </div>
  </div>
  @endforeach
</div>



@endsection
