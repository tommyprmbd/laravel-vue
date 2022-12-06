@extends('layouts.admin')
@section('title', 'Halaman Publisher')
@section('header', 'Publisher')
    
@section('content')
        <div class="row">
            <div class="col-12 mb-4">
              <div class="card">
                <div class="card-header">
                  <a href="{{ route('publisher.create') }}" class="btn btn-primary">Add Publisher</a>
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
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($publisher as $item)
                         <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td class="text-center">
                              <a href="{{ route('publisher.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                              <form action="{{ route('publisher.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are You Sure Delete {{ $item->nama }} ?')">
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