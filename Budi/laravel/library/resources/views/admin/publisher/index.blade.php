@extends('layouts.admin')
@section('header', 'publisher')

@section('content')
 <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ url('publishers/create') }}" class="btn btn-sm btn-primary pull-right">Create New publishers</a>
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 10px">NO</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone Number</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Created At</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($publishers as $key => $publisher)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td class="text-center">{{ $publisher->name }}</td>
                      <td class="text-center">{{ $publisher->email }}</td>
                      <td class="text-center">{{ $publisher->phone_number }}</td>
                      <td class="text-center">{{ $publisher->address }}</td>
                      <td class="text-center">{{ date('H:i:s - d M Y', strtotime($publisher->created_at)) }}</td>
                      <td class="text-center"><a href="{{ url('publishers/'.$publisher->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ url('publishers', ['id' => $publisher->id]) }}" method="post">
                          <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return
                                confirm('Are you sure?')">    
                          @method('delete')
                          @csrf                      
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
