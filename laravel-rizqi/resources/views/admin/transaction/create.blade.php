@extends('layouts.admin')
@section('title', 'Halaman Create Transaction')
    
@section('css')
    
@endsection

@section('content')
<div class="col-md-6 mt-3 offset-md-3">
    <form action="{{ url('transaction') }}" method="post">
     @csrf
     <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">Tambah Transaksi</h3>
         </div>
         <div class="card-body">
            <div class="form-group row">
                <label for="member_id" class="col-sm-3 col-form-label">Nama Peminjam</label>
                <div class="input-group col-sm-9">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <select class="form-control" name="member_id" id="member_id">
                        <option value="">-- Pilih Nama Peminjam -</option>
                          @foreach ($member as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                      </select>
                </div>
              </div>
            <div class="form-group row">
                <label for="date_star" class="col-sm-3 col-form-label">Tanggal Pinjam</label>
                <div class="input-group col-sm-9">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                  <input type="date" class="form-control" id="date_star" name="date_star" placeholder="Enter Name Author"  required>
                </div>
              </div>
            <div class="form-group row">
                <label for="date_end" class="col-sm-3 col-form-label">Tanggal Kembali</label>
                <div class="input-group col-sm-9">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                  <input type="date" class="form-control" id="date_end" name="date_end" placeholder="Enter Name Author"  required>
                </div>
              </div>
              <input type="hidden"  name="status" value="2">
            <div class="form-group row">
                <label for="book" class="col-sm-3 col-form-label">Judul Buku</label>
                <div class="input-group col-sm-9 select2-purple">
                        <select class="form-control select2" name="buku[]" id="buku[]" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                          @foreach ($book as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                          @endforeach
                          </select>
                  </div>
              </div>
            </div>
            <!-- /.card-body -->
         {{-- footer --}}
         <div class="modal-footer justify-content-between mt-3">
           <a href="{{ url('transaction') }}" class="btn btn-secondary">Kembali</a>
           <button type="submit" class="btn btn-primary">Tambah</button>
         </div>
       </div>
       <!-- /.card -->
    </form>
 </div>
@endsection


@section('js')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      placeholder: "Pilih Buku"
    });
  });
</script>
@endsection