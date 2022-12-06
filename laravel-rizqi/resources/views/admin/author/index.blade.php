@extends('layouts.admin')
@section('title', 'Halaman Author')
@section('header', 'Author')
    
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-header">
              <a href="" class="btn btn-primary">Add Author</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($author as $item)
                     <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                     </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection