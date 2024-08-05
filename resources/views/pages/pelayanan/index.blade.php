@extends('layout.app')
@section('title', 'Data Pelayanan')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-muted"><i class="fas fa-medkit mr-1"></i> Data Pelayanan </h6>
        </div>
        <div class="card-body">
            <div class="d-lg-flex justify-content-lg-between mb-3 d-block">
                <div class="my-2">
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('pelayanan.create') }}" class="btn btn-primary btn-sm">
                            New
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    @endif
                </div>
                <form action="" method="GET">
                    <div class="input-group my-2">
                        <input type="text" class="form-control" placeholder="Search" name="search" aria-label="Search"
                            value="{{ $search ?? '' }}" aria-describedby="search_button" />
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="search_button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    @if (!empty($search))
                        <div class="text-end">
                            <a href="{{ route('pelayanan.index') }}" class="btn btn-sm btn-danger">
                                Reset
                            </a>
                        </div>
                    @endif
                </form>
            </div>
            <div class="d-lg-flex justify-content-lg-end mb-3 d-block">
                <form action="{{ route('pelayanan.index') }}" method="GET">
                    <div class="input-group my-2">
                        <select name="choose_bulan" id="choose_bulan" class="custom-select ">
                            <option value="" {{ empty($choose_bulan) ? 'selected' : '' }}>Semua Bulan</option>
                            @foreach ($bulan as $item)
                                <option value="{{ $item->bulan }}" {{ $choose_bulan == $item->bulan ? 'selected' : '' }}>
                                    {{ $item->nama_bulan }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="search_button">
                                Filter
                            </button>
                        </div>
                    </div>
                    @if (!empty($month))
                        <div class="text-end">
                            <a href="{{ route('pelayanan.index') }}" class="btn btn-sm btn-danger">
                                Reset
                            </a>
                        </div>
                    @endif
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Tanggal Pemeriksaan</th>
                            <th class="text-center">ID Bayi</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Usia</th>
                            <th class="text-center">Detail Pelayanan</th>
                            @if (Auth::user()->role == 'admin')
                                <th class="text-center">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center" style="width:5%">
                                    {{ $data->firstItem() + $loop->index }}</td>
                                <td>
                                    {{ $item->format_tanggal_pelayanan }} WIB
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-center">{{ $item->user_id }}</p>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modal_id_{{ $item->id }}">
                                            Detail <i class="fas fa-search-plus"></i>
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal_id_{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Bayi ID : {{ $item->user_id }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="nama_ibu"
                                                                style="font-weight: 500">Nama Ibu</label>
                                                            <input readonly id="nama_ibu" type="text"
                                                                class="form-control" name="nama_ibu"
                                                                value="{{ $item->user->nama_ibu }}" required
                                                                autocomplete="nama_ibu" autofocus>

                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="nama_anak"
                                                                style="font-weight: 500">Nama Anak</label>
                                                            <input readonly id="nama_anak" type="text"
                                                                class="form-control" name="nama_anak"
                                                                value="{{ $item->user->nama_anak }}" required
                                                                autocomplete="nama_anak" autofocus>

                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="alamat"
                                                                style="font-weight: 500">Alamat</label>
                                                            <input readonly id="alamat" type="text"
                                                                class="form-control" name="alamat"
                                                                value="{{ $item->user->alamat }}" required
                                                                autocomplete="alamat" autofocus>
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="no_hp"
                                                                style="font-weight: 500">Nomor HP</label>
                                                            <input readonly id="no_hp" type="text"
                                                                class="form-control" name="no_hp"
                                                                value="{{ $item->user->no_hp }} " required
                                                                autocomplete="no_hp" autofocus>

                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="nik_ibu"
                                                                style="font-weight: 500">NIK Ibu</label>
                                                            <input readonly id="nik_ibu" type="text"
                                                                class="form-control" name="nik_ibu"
                                                                value="{{ $item->user->nik_ibu }}" required
                                                                autocomplete="nik_ibu" autofocus>

                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="nik_anak"
                                                                style="font-weight: 500">NIK Anak</label>
                                                            <input readonly id="nik_anak" type="text"
                                                                class="form-control" name="nik_anak"
                                                                value="{{ $item->user->nik_anak }}" required
                                                                autocomplete="nik_anak" autofocus>

                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="tgl_lahir"
                                                                style="font-weight: 500">Tanggal
                                                                Lahir</label>
                                                            <input readonly id="tgl_lahir" type="date"
                                                                class="form-control" name="tgl_lahir"
                                                                value="{{ $item->user->tgl_lahir }}" required
                                                                autocomplete="tgl_lahir" autofocus>

                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="usia"
                                                                style="font-weight: 500">Usia</label>
                                                            <input readonly id="usia" type="text"
                                                                class="form-control" name="usia"
                                                                value="{{ $item->user->usia }}" required
                                                                autocomplete="usia" autofocus>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="jenis_kelamin"
                                                                style="font-weight: 500">Jenis
                                                                Kelamin</label>
                                                            <select disabled id="jenis_kelamin" class="form-control"
                                                                name="jenis_kelamin" required>
                                                                <option
                                                                    value="laki_laki"{{ $item->user->jenis_kelamin == 'laki_laki' ? ' selected' : '' }}>
                                                                    Laki-laki</option>
                                                                <option
                                                                    value="perempuan"{{ $item->user->jenis_kelamin == 'perempuan' ? ' selected' : '' }}>
                                                                    Perempuan</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $item->user->nama_anak }}
                                </td>
                                <td>
                                    {{ $item->user->usia }} thn
                                </td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#deskripsi_{{ $item->id }}">
                                            Lihat <i class="fas fa-search-plus"></i>
                                        </button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deskripsi_{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Bayi ID : {{ $item->user_id }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="berat_badan"
                                                                style="font-weight: 500">Berat Badan</label>
                                                            <input readonly id="berat_badan" type="text"
                                                                class="form-control" name="berat_badan"
                                                                value="{{ $item->berat_badan }} kg" required
                                                                autocomplete="berat_badan" autofocus>
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="tinggi_badan"
                                                                style="font-weight: 500">Tinggi Badan</label>
                                                            <input readonly id="tinggi_badan" type="text"
                                                                class="form-control" name="tinggi_badan"
                                                                value="{{ $item->tinggi_badan }} cm" required
                                                                autocomplete="tinggi_badan" autofocus>
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="lingkar_kepala"
                                                                style="font-weight: 500">Lingkar Kepala</label>
                                                            <input readonly id="lingkar_kepala" type="text"
                                                                class="form-control" name="lingkar_kepala"
                                                                value="{{ $item->lingkar_kepala }} cm" required
                                                                autocomplete="lingkar_kepala" autofocus>
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="jenis_imunisasi"
                                                                style="font-weight: 500">Jenis Imunisasi</label>
                                                            <input readonly id="jenis_imunisasi" type="text"
                                                                class="form-control" name="jenis_imunisasi"
                                                                value="{{ $item->jenis_imunisasi == '' ? '-' : $item->jenis_imunisasi }}"
                                                                required autocomplete="jenis_imunisasi" autofocus>
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <label class="col-form-label" for="jenis_vitamin"
                                                                style="font-weight: 500">Jenis Vitamin</label>
                                                            <input readonly id="jenis_vitamin" type="text"
                                                                class="form-control" name="jenis_vitamin"
                                                                value="{{ $item->jenis_vitamin == '' ? '-' : $item->jenis_vitamin }}"
                                                                required autocomplete="jenis_vitamin" autofocus>
                                                        </div>
                                                        <div>
                                                            <label class="col-form-label"
                                                                style="font-weight: 500">Deskripsi</label>
                                                            <textarea class="form-control" cols="30" rows="10" readonly>{{ $item->deskripsi == '' ? '-' : $item->deskripsi }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="text-center" style="width: 10%">
                                        <div class="d-flex row justify-content-center">
                                            <a class="btn btn-success btn-sm col-8 m-1"
                                                href="{{ route('pelayanan.edit', $item->id) }}">
                                                Edit <i class="bi bi-pencil ms-2"></i>
                                            </a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm col-8 m-1"
                                                data-toggle="modal" data-target="#model_delete{{ $item->id }}">
                                                Delete <i class="bi bi-trash3-fill ms-2"></i>
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="model_delete{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('pelayanan.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title">Peringatan!</h5>
                                                            <button type="button" class="btn btn-close bg-light"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body border-0">
                                                            Apakah anda yakin ingin menghapus data ini?
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center border-0">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-2">
                    <a href="{{ route('pelayanan.report') }}" class="btn btn-danger btn-sm" target="_blank">Cetak
                        <i class="fas fa-file-pdf"></i></a>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
