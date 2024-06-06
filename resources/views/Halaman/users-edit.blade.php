@extends('Template/app')
@section('title', 'Users-Edit')

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
                <h3 class="card-title">Edit User {{$users->slug}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/users-edit/{{$users->slug}}" method="post">
                {{-- keluar dri kategori edit trus masuk lgi, makanaya ada 2 slash --}}
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="id">Username</label>
                        <input type="number" class="form-control" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="judul_buku">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <br>
                     <div class="form-group">
                         <label for="roles">Roles</label>
                         <select class="form-control" name="id_role" id="id_role" required>
                            <option value="id_role" disabled selected>Choose Roles</option>
                            <option>Admin</option>
                            <option>Dosen</option>
                            <option>Mahasiswa</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="roles">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="Status" disabled selected>Choose Status</option>
                            <option>Active</option>
                            <option>Inactive</option>
                       </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
@endsection