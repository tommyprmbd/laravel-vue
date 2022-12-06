@extends('layouts.admin')
@section('title', 'Add New Publisher')
@section('header', 'Publisher')

@section('content')
    <div class="container">
        <div class="col-md-6">
            <form action="{{ route('publisher.store') }}" method="post"> 
                @csrf
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
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Name Publisher" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-home"></i></span>
                            </div>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
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