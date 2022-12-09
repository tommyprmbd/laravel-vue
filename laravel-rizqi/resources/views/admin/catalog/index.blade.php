@extends('layouts.admin')
@section('title', 'Halaman Catalog')
@section('header', 'Catalog')
    
@section('content')
    <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-header">
              <a href="{{ route('catalog.create') }}" class="btn btn-primary">Add Catalog</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 15px">No.</th>
                        <th>Nama</th>
                        <th>Title Books</th>
                        <th class="text-center">Total Books</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($catalogs as $catalog)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $catalog->nama }}</td>
                        <td>
                            @foreach ($catalog->books as $dataBook)
                                - {{ $dataBook->title }} <br>
                            @endforeach
                        </td>
                        <td class="text-center">{{ count($catalog->books) }}</td>
                        <td class="text-center">{{ date('d M Y', strtotime($catalog->created_at ))}}</td>
                        <td class="text-center">
                            <a href="{{ route('catalog.edit', $catalog->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                            <form action="{{ route('catalog.destroy', $catalog->id) }}" method="post">
                              <input class="btn btn-sm btn-danger" type="submit" value="Delete" onclick="return confirm('Are You Sure Delete {{ $catalog->nama }} ?')">
                              @csrf
                              @method('delete')
                            </form>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection