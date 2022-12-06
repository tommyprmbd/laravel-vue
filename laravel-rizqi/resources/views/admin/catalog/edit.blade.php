@extends('layouts.admin')
@section('header', 'Edit Catalog')
@section('title', 'Edit Catalog')
@section('content')
<div class="container mt-3">
    <div class="col-md-6">
       <form action="{{ route('catalog.update', $catalog->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Edit Catalog</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Name</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-bookmark"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $catalog->nama }}">
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-warning">Update</button>
            </div>
          </div>
       </form>
    </div>  
</div>
@endsection