@extends('layout.app')
@section('title', 'Edit Data Pelayanan')
@section('content')
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-muted"><i class="fas fa-ambulance mr-1"></i> Edit Data Pelayanan
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
            <form method="POST" action="{{ route('pelayanan.update', $pelayanan->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p class="h4 font-italic">I. Data Peserta</p>
                <div class="form-group">
                    <label class="col-form-label" for="user_id" style="font-weight: 500">ID Bayi</label>
                    <div class="input-group">
                        <select id="user_id" class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                            required>
                            <option value="" selected>- Pilih Data Bayi -</option>
                            @foreach ($user as $item)
                                <option
                                    value="{{ $item->id }}"{{ $pelayanan->user_id == $item->id ? ' selected' : '' }}>
                                    {{ $item->id }} - {{ $item->nama_anak }} ({{ $item->nik_anak }})</option>
                            @endforeach
                        </select>
                        {{-- <div class="input-group-append">
                            <button class="btn btn-primary btn-sm" type="button">Validasi</button>
                        </div> --}}
                    </div>
                    @error('jenis_imunisasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <p class="h4 font-italic">II. Data Pelayanan</p>
                <div class="row form-group">
                    <div class="col-12 col-lg-4">
                        <label class="col-form-label" for="tinggi_badan" style="font-weight: 500">Tinggi Badan</label>
                        <div class="input-group">
                            <input id="tinggi_badan" type="text" pattern="([0-9]+.{0,1}[0-9]*,{0,1})*[0-9]"
                                class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan"
                                value="{{ $pelayanan->tinggi_badan }}" required autocomplete="tinggi_badan" autofocus>
                            <div class="input-group-append">
                                <span class=" input-group-text">
                                    Cm
                                </span>
                            </div>
                            @error('tinggi_badan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <label class="col-form-label" for="berat_badan" style="font-weight: 500">Berat Badan</label>
                        <div class="input-group">
                            <input id="berat_badan" type="text" pattern="([0-9]+.{0,1}[0-9]*,{0,1})*[0-9]"
                                class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan"
                                value="{{ $pelayanan->berat_badan }}" required autocomplete="berat_badan" autofocus>
                            <div class="input-group-append">
                                <span class=" input-group-text">
                                    Kg
                                </span>
                            </div>
                            @error('berat_badan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <label class="col-form-label" for="lingkar_kepala" style="font-weight: 500">Lingkar
                            Kepala</label>
                        <div class="input-group">
                            <input id="lingkar_kepala" type="text" pattern="([0-9]+.{0,1}[0-9]*,{0,1})*[0-9]"
                                class="form-control @error('lingkar_kepala') is-invalid @enderror" name="lingkar_kepala"
                                value="{{ $pelayanan->lingkar_kepala }}" required autocomplete="lingkar_kepala" autofocus>
                            <div class="input-group-append">
                                <span class=" input-group-text">
                                    Cm
                                </span>
                            </div>
                            @error('lingkar_kepala')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-lg-6">
                        <label class="col-form-label" for="jenis_imunisasi" style="font-weight: 500">Jenis
                            Imunisasi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary btn-sm" type="button" data-toggle="modal"
                                    data-target="#modal_jenis_imunisasi">Tambah
                                    <i class="fas fa-plus-circle"></i> </button>
                            </div>
                            <select id="jenis_imunisasi" class="form-control @error('jenis_imunisasi') is-invalid @enderror"
                                name="jenis_imunisasi">
                                <option value="" selected>- Pilih Jenis Imunisasi -</option>
                                @foreach ($jenis_imunisasi as $item)
                                    <option
                                        value="{{ $item->nama }}"{{ $pelayanan->jenis_imunisasi == $item->nama ? ' selected' : '' }}>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('jenis_imunisasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="col-form-label" for="jenis_vitamin" style="font-weight: 500">Jenis
                            Vitamin</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-warning btn-sm" type="button" data-toggle="modal"
                                    data-target="#modal_jenis_vitamin">Tambah
                                    <i class="fas fa-plus-circle"></i> </button>
                            </div>
                            <select id="jenis_vitamin" class="form-control @error('jenis_vitamin') is-invalid @enderror"
                                name="jenis_vitamin">
                                <option value="" selected>- Pilih Jenis Vitamin -</option>
                                @foreach ($jenis_vitamin as $item)
                                    <option
                                        value="{{ $item->nama }}"{{ $pelayanan->jenis_vitamin == $item->nama ? ' selected' : '' }}>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('jenis_vitamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="tanggal_pelayanan" style="font-weight: 500">Tanggal
                        Pelayanan</label>
                    <input id="tanggal_pelayanan" type="datetime-local"
                        class="form-control @error('tanggal_pelayanan') is-invalid @enderror" name="tanggal_pelayanan"
                        value="{{ $pelayanan->tanggal_pelayanan }}" required autocomplete="tanggal_pelayanan" autofocus>
                    @error('tanggal_pelayanan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ $pelayanan->deskripsi }}</textarea>
                </div>
                <div class="form-group col-12 text-center">
                    <a href="{{ route('pelayanan.index') }}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

            {{-- modal --}}
            <div class="modal fade" id="modal_jenis_imunisasi" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Jenis Imunisasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('pelayanan.add_jenis_imunisasi') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="add_jenis_imunisasi">Jenis Imunisasi</label>
                                    <input type="text" class="form-control" name="add_jenis_imunisasi"
                                        id="add_jenis_imunisasi" required>
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
            {{-- modal --}}
            <div class="modal fade" id="modal_jenis_vitamin" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Jenis Vitamin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('pelayanan.add_jenis_vitamin') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="add_jenis_vitamin">Jenis Vitamin</label>
                                    <input type="text" class="form-control" name="add_jenis_vitamin"
                                        id="add_jenis_vitamin" required>
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
