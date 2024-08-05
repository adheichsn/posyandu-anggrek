@extends('layout.app')
@section('title', 'Tambah User')
@section('content')

    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-muted"><i class="fas fa-book mr-1"></i> Tambah User Baru</h6>
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
            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-1">
                    <label class="col-form-label" for="username" style="font-weight: 500">Username</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="password" style="font-weight: 500">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="password-confirm" style="font-weight: 500">Konfirmasi
                        Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
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
                    <label class="col-form-label" for="no_hp" style="font-weight: 500">Nomor HP</label>
                    <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                        name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus>
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="form-group mb-1">
                    <label class="col-form-label" for="nik_ibu" style="font-weight: 500">NIK Ibu</label>
                    <input id="nik_ibu" type="text" class="form-control @error('nik_ibu') is-invalid @enderror"
                        name="nik_ibu" value="{{ old('nik_ibu') }}" required autocomplete="nik_ibu" autofocus>
                    @error('nik_ibu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                <div class="form-group mb-1">
                    <label class="col-form-label" for="nik_anak" style="font-weight: 500">NIK Anak</label>
                    <input id="nik_anak" type="text" class="form-control @error('nik_anak') is-invalid @enderror"
                        name="nik_anak" value="{{ old('nik_anak') }}" required autocomplete="nik_anak" autofocus>
                    @error('nik_anak')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="nama_ibu" style="font-weight: 500">Nama Ibu</label>
                    <input id="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror"
                        name="nama_ibu" value="{{ old('nama_ibu') }}" required autocomplete="nama_ibu" autofocus>
                    @error('nama_ibu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="tgl_lahir_ibu" style="font-weight: 500">Tanggal
                        Lahir Ibu</label>
                    <input id="tgl_lahir_ibu" type="date" class="form-control @error('tgl_lahir_ibu') is-invalid @enderror"
                        name="tgl_lahir_ibu" value="{{ old('tgl_lahir_ibu') }}" required autocomplete="tgl_lahir_ibu" autofocus>
                    @error('tgl_lahir_ibu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label class="col-form-label" for="nama_anak" style="font-weight: 500">Nama Anak</label>
                    <input id="nama_anak" type="text" class="form-control @error('nama_anak') is-invalid @enderror"
                        name="nama_anak" value="{{ old('nama_anak') }}" required autocomplete="nama_anak" autofocus>
                    @error('nama_anak')
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
                <div class="form-group mb-1">
                    <label class="col-form-label" for="usia" style="font-weight: 500">Usia</label>
                    <input id="usia" type="text" class="form-control @error('usia') is-invalid @enderror"
                        name="usia" value="{{ old('usia') }}" required autocomplete="usia" autofocus>
                    @error('usia')
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
                    <label class="col-form-label" for="role" style="font-weight: 500">Role</label>
                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role"
                        required>
                        <option value="admin"{{ old('role') == 'admin' ? ' selected' : '' }}>
                            Admin</option>
                        <option value="user"{{ old('role') == 'user' ? ' selected' : '' }}>
                            User</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 text-center">
                    <a href="{{ route('user.index') }}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection
