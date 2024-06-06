@extends('Template/app')
@section('title', 'Books-Add')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Main content -->
<section class="content">
    <div class="container-fluid" style="margin-top: 5px;">
        <div class="row">
            <!-- left column -->
            <!-- general form elements -->
            <div class="card card-primary" style="width: 100%;">
                <div class="card-header">
                    <h3 class="card-title">Add new Books</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="books-add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">ID Books</label>
                            <input type="number" class="form-control" name="id" id="id" placeholder="ID Books" required>
                        </div>
                        <div class="form-group">
                            <label for="judul_buku">Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Judul Buku" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Cover Buku</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cover" name="cover">
                                    <label class="custom-file-label" for="cover">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Penulis" required>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun Buku</label>
                            <input type="number" class="form-control" name="tahun_buku" id="tahun_buku" placeholder="Tahun buku" required>
                        </div>
                        <div class="form-group">
                            <label for="edisi_buku">Edisi Buku</label>
                            <input type="number" class="form-control" name="edisi_buku" id="edisi_buku" placeholder="Edisi Buku" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="id_kategori" id="id_kategori" required>
                                <option value="Kategori" disabled selected>Choose Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kuantitas">Kuantitas</label>
                            <input type="number" class="form-control" name="stocks" id="stocks" placeholder="Kuantitas" required>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("cover").addEventListener("change", function () {
            var fileName = this.files[0].name;
            var label = document.querySelector(".custom-file-label");
            label.innerHTML = fileName;
        });
    </script>
    
</section>
@endsection
