@extends('layouts.admin')
@section('title', 'Halaman Edit Transaction')
    
@section('css')
    
@endsection

@section('content')
<div class="col-md-6 mt-3 offset-md-3">
    <form action="{{ url('transaction/' .$transaction->id) }}" method="post">
     @csrf
     @method('PUT')
     <div class="card card-warning">
         <div class="card-header">
           <h3 class="card-title">Edit Transaksi</h3>
         </div>
         <div class="card-body">
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Peminjam</label>
                <div class="input-group col-sm-9">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <select class="form-control" name="nama" id="nama" disabled="true">
                        <option value="" readonly>-- Pilih Nama Peminjam -</option>
                          @foreach ($member as $item)
                            <option value="{{ $item->id }}" {{($item->id === $transaction->member_id) ? 'Selected' : ''}}>{{ $item->nama }}</option>
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
                  <input type="date" class="form-control" id="date_star" name="date_star" value="{{ $transaction->date_star }}"  readonly>
                </div>
              </div>
            <div class="form-group row">
                <label for="date_end" class="col-sm-3 col-form-label">Tanggal Kembali</label>
                <div class="input-group col-sm-9">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                  <input type="date" class="form-control" id="date_end" name="date_end" value="{{ $transaction->date_end }}"  readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="book" class="col-sm-3 col-form-label">Judul Buku</label>
                <div class="input-group col-sm-9 select2-info">
                        <select class="form-control select2" name="buku[]" id="buku[]" multiple="multiple" data-dropdown-css-class="select2-info" style="width: 100%;" disabled="true">
                          @foreach ($book as $item)
                            <option readonly value="{{ $item->id }}" {{ in_array($item->id, $transactionDetails) ? 'selected' : '' }}>{{ $item->title }}</option>
                          @endforeach
                          </select>
                  </div>
              </div>
            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">Status Buku</label>
                <div class="input-group col-sm-9">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio1" name="status" value="1" {{ $transaction->status == 1 ? 'checked' : ''}}>
                            <label for="customRadio1" class="custom-control-label">Sudah Dikembalikan</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio2" name="status" value="0" {{ $transaction->status == 2 ? 'checked' : ''}}>
                            <label for="customRadio2" class="custom-control-label">Belum Dikembalikan</label>
                        </div>
                    </div>
                </div>
            </div>

              
              
            </div>
            <!-- /.card-body -->
         {{-- footer --}}
         <div class="modal-footer justify-content-between mt-3">
           <a href="{{ url('transaction') }}" class="btn btn-secondary">Kembali</a>
           <button type="submit" class="btn btn-warning">Ubah</button>
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