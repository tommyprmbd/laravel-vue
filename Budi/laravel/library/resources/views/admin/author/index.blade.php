@extends('layouts.admin')
@section('header', 'author')

@section('content')
 <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Author Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">NO</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone Number</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($authors as $key => $author)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td class="text-center">{{ $author->name }}</td>
                      <td class="text-center">{{ $author->email }}</td>
                      <td class="text-center">{{ $author->phone_number }}</td>
                      <td class="text-center">{{ $author->address }}</td>
                      <td class="text-center">{{ date('H:i:s - d M Y', strtotime($author->created_at)) }}</td>
                          @csrf
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
             </div>
            </div>
        </div>
            <!-- /.card -->
@endsection
