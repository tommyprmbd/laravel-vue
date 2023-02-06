@extends('layouts.admin')
@section('header', 'Transaction')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit {{ '#' . $transaction->id }}</h3>
            </div>
            <form action="{{ route('transactions.update', $transaction->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="member" class="col-sm-2 col-form-label">Member</label>
                        <div class="col-sm-10">
                            <select name="member_id" class="custom-select">
                                <option value="" selected disabled>Pilih</option>
                                @foreach ($members as $m)
                                    @if (old('member_id') == $m->id || $m->id == $transaction->member_id)
                                        <option value="{{ $m->id }}" selected>{{ $m->name }}</option>      
                                    @else
                                        <option value="{{ $m->id }}">{{ $m->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('member_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-4">
                            <input type="date" name="date_start" id="date_start" value="{{ old('date_start') ?? $transaction->date_start }}" class="form-control">
                            @error('date_start')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-sm-2 text-center">
                            s/d
                        </div>
                        <div class="col-sm-4">
                            <input type="date" name="date_end" id="date_end" value="{{ old('date_end') ?? $transaction->date_end }}" class="form-control">
                            @error('date_end')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="buku" class="col-sm-2 col-form-label">Buku</label>
                        <div class="col-sm-10">
                            <select class="form-select w-100" name="buku[]" size="6" multiple aria-label="multiple select example">
                                <option selected disabled>Pilih</option>
                                @foreach ($books as $tb)
                                    @if (in_array($tb->id, $transaction->TransactionDetail->pluck('book_id')->toArray()))
                                        <option value="{{ $tb->id }}" selected>{{ $tb->title }}</option>
                                    @else
                                        <option value="{{ $tb->id }}">{{ $tb->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('buku')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="BELUM" {{ strtolower((old('status')) == 'belum' || strtolower($transaction->status) == 'belum') ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    Belum Dikembalikan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="SUDAH" {{ strtolower((old('status')) == 'sudah' || strtolower($transaction->status) == 'sudah') ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    Sudah Dikembalikan
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-secondary text-white">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection