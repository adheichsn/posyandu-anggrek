@extends('layout.app')
@section('title', 'Edit Jadwal Pelayanan')
@section('content')
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-muted"><i class="fas fa-calendar-alt mr-1"></i> Edit Jadwal Pelayanan
            </h6>
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
            <form method="POST" action="{{ route('jadwal.update', $jadwal->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="col-form-label" for="jenis_pelayanan" style="font-weight: 500">Jenis
                        Pelayanan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                data-target="#modal_jenis_pelayanan">Tambah Jenis Pelayanan
                                <i class="fas fa-plus-circle"></i> </button>
                        </div>
                        <select id="jenis_pelayanan" class="form-control @error('jenis_pelayanan') is-invalid @enderror"
                            name="jenis_pelayanan" required>
                            <option value="" selected>- Pilih Jenis Pelayanan -</option>
                            @foreach ($jenis_pelayanan as $item)
                                <option value="{{ $item->nama }}"
                                    {{ $jadwal->jenis_pelayanan == $item->nama ? ' selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('jenis_pelayanan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="lokasi" style="font-weight: 500">Lokasi</label>
                    <input id="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror"
                        name="lokasi" value="{{ $jadwal->lokasi }}" required autocomplete="lokasi" autofocus>
                    @error('lokasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="tanggal" style="font-weight: 500">Tanggal
                        Pelayanan</label>
                    <input id="tanggal" type="datetime-local" class="form-control @error('tanggal') is-invalid @enderror"
                        name="tanggal" value="{{ $jadwal->tanggal }}" required autocomplete="tanggal" autofocus>
                    @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="col-form-label" style="font-weight: 500">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ $jadwal->deskripsi }}</textarea>
                </div>
                <div class="form-group col-12 text-center">
                    <a href="{{ route('jadwal.index') }}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

            {{-- modal --}}
            <div class="modal fade" id="modal_jenis_pelayanan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Jenis Pelayanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('jadwal.add_jenis_pelayanan') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="add_jenis_pelayanan">Jenis Pelayanan</label>
                                    <input type="text" class="form-control" name="add_jenis_pelayanan"
                                        id="add_jenis_pelayanan" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
