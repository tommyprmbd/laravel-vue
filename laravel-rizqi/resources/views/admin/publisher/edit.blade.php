@extends('layouts.admin')
@section('Title', 'Publisher')
@section('header', 'Edit Publisher')
@section('content')
<div class="container">
    <div class="col-md-6">
        <form action="{{ route('publisher.update', $publisher->id) }}" method="post"> 
            @csrf
            @method('PUT')
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create New Publisher</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $publisher->nama }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $publisher->email }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $publisher->phone }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                        </div>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $publisher->address }}" required>
                    </div>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </div>
        </form>
    </div>
</div>
@endsection