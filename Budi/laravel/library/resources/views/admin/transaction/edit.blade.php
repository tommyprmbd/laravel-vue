@extends('layouts.admin')
@section('header', 'transaction')

@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Transaction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('transactions/'.$transaction->id) }}" method="post">
                @csrf
                {{ method_field('PUT')}}

              <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Anggota</label>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select name="member_id" class="custom-select">
                              @foreach ($members as $m)
                                <option value="{{ $m->id }}">{{ $m->name }}</option>
                              @endforeach
                             </select>
                        </div>
                     </div>
                </div>
                                   
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
@endsection