@extends('Template/app')
@section('title', 'Kategori-Edit')

@section('content')

    @if ($errors->any())
    <div class="alert-alert danger"  style="margin-top: 10px;">
      <div class="alert alert-danger alert-dismissible">
        {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
        {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
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
                <h3 class="card-title">Edit Category {{$category->category}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/kategori-edit/{{$category->slug}}" method="post">
                {{-- keluar dri kategori edit trus masuk lgi, makanaya ada 2 slash --}}
                @csrf
                @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="id">ID Category</label>
                    <input type="number" class="form-control" name="id" id="id" value="" placeholder="Enter ID Category" required>
                  </div>
                  <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" name="category" id="category" placeholder="Category" value="" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
@endsection