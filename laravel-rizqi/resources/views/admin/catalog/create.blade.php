@extends('layouts.admin')

@section('title', 'Create Catalog')
@section('header', 'Catalog')

@section('content')
        <div class="col-md-6 mt-3">
           <form action="{{ route('catalog.store') }}" method="post">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create New Catalog</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-bookmark "></i></span>
                        </div>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Enter Name Catalog">
                      </div>
                      @error('nama')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </div>
              <!-- /.card -->
              
           </form>
        </div>
@endsection