@extends('layouts.admin')
@section('title', 'Halaman Catalog')
@section('header', 'Catalog')
    
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-header">
        <h3 class="card-title">Daftar Catalogs</h3>
        <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
        <div class="input-group-append">
        <button type="submit" class="btn btn-default">
        <i class="fas fa-search"></i>
        </button>
        </div>
        </div>
        </div>
        </div>
        
        <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-sm table-hover text-nowrap">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Title Books</th>
                    <th class="text-center">Total Books</th>
                    <th class="text-center">Created At</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($catalogs as $catalog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $catalog->nama }}</td>
                    <td>
                        @foreach ($catalog->books as $dataBook)
                            - {{ $dataBook->title }} <br>
                        @endforeach
                    </td>
                    <td class="text-center">{{ count($catalog->books) }}</td>
                    <td class="text-center">{{ date('d M Y', strtotime($catalog->created_at ))}}</td>
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