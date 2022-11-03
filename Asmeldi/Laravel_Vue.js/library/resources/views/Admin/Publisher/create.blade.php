@extends('layouts.admin')
@section('header', 'Create Publisher')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Create Publisher</h3>
                        </div>
                        <form action="{{ url('publishers') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter email" required="">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter email" required="">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPhoneNumber">Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number"
                                        placeholder="Enter Phone Number" required="">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPhoneNumber">Adress</label>
                                    <input type="text" class="form-control" name="adress" id="adress"
                                        placeholder="Enter Adress" required="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
