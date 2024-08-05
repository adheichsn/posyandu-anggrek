@extends('layout.app')
@section('title', 'Edit Data Keuangan')
@section('content')
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-muted"><i class="fas fa-money-bill mr-1"></i> Edit Data Keuangan</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>

                </div>
            @endif
            <form method="POST" action="{{ route('keuangan.update', $keuangan->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="col-form-label" for="type" style="font-weight: 500">Tipe Transaksi</label>
                    <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required>
                        <option value="masuk"{{ $keuangan->type == 'masuk' ? ' selected' : 'disabled' }}>
                            Masuk</option>
                        <option value="keluar"{{ $keuangan->type == 'keluar' ? ' selected' : 'disabled' }}>
                            Keluar</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @if ($type == 'in')
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="nama_penginput" style="font-weight: 500">Nama</label>
                        <input id="nama_penginput" type="text"
                            class="form-control @error('nama_penginput') is-invalid @enderror" name="nama_penginput"
                            value="{{ $keuangan->nama_penginput }}" required autocomplete="nama_penginput" autofocus>
                        @error('nama_penginput')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
                <div class="form-group mb-1">
                    <label class="col-form-label" for="jenis" style="font-weight: 500">Jenis Transaksi</label>
                    <input id="jenis" type="text" class="form-control @error('jenis') is-invalid @enderror"
                        name="jenis" value="{{ $keuangan->jenis }}" required autocomplete="jenis" autofocus>
                    @error('jenis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="nominal" style="font-weight: 500">Nominal Transaksi</label>
                    <input id="nominal" type="number" min="0"
                        class="form-control @error('nominal') is-invalid @enderror" name="nominal"
                        value="{{ $keuangan->nominal }}" required autocomplete="nominal" autofocus>
                    @error('nominal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="tanggal" style="font-weight: 500">Tanggal</label>
                    <input id="tanggal" type="datetime-local" class="form-control @error('tanggal') is-invalid @enderror"
                        name="tanggal" value="{{ $keuangan->tanggal }}" required autocomplete="tanggal" autofocus>
                    @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan" class="col-form-label" style="font-weight: 500">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5">{{ $keuangan->keterangan }}</textarea>
                </div>
                <div class="form-group col-12 text-center">
                    <a href="{{ route('keuangan.index') }}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection
