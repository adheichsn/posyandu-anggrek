@extends('layout.app')
@section('title', 'Tambah Anggota')
@section('content')
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-muted"><i class="fas fa-users-cog mr-1"></i> Tambah Masyarakat Baru</h6>
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
            <form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-1">
                    <label class="col-form-label" for="nama" style="font-weight: 500">Nama</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                        name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="alamat" style="font-weight: 500">Alamat</label>
                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                        name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="pekerjaan" style="font-weight: 500">Pekerjaan</label>
                    <input id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                        name="pekerjaan" value="{{ old('pekerjaan') }}" required autocomplete="pekerjaan" autofocus>
                    @error('pekerjaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="tgl_lahir" style="font-weight: 500">Tanggal
                        Lahir</label>
                    <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                        name="tgl_lahir" value="{{ old('tgl_lahir') }}" required autocomplete="tgl_lahir" autofocus>
                    @error('tgl_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="jenis_kelamin" style="font-weight: 500">Jenis
                        Kelamin</label>
                    <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                        name="jenis_kelamin" required>
                        <option value="laki_laki"{{ old('jenis_kelamin') == 'laki_laki' ? ' selected' : '' }}>
                            Laki-laki</option>
                        <option value="perempuan"{{ old('jenis_kelamin') == 'perempuan' ? ' selected' : '' }}>
                            Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="status" style="font-weight: 500">Status Keanggotaan</label>
                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status"
                        required>
                        <option value="aktif"{{ old('status') == 'aktif' ? ' selected' : '' }}>
                            Aktif</option>
                        <option value="non_aktif"{{ old('status') == 'non_aktif' ? ' selected' : '' }}>
                            Non Aktif</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 text-center">
                    <a href="{{ route('anggota.index') }}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection
