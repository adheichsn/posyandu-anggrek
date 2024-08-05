@php
    if ($type == 'in') {
        $tipe = 'Pemasukan';
    } elseif ($type == 'out') {
        $tipe = 'Pengeluaran';
    } else {
        $tipe = '';
    }
@endphp
@extends('layout.app')
@section('title', $tipe . ' Keuangan ')
@section('content')
    @if ($tipe == '')
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Total Kas Keuangan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                    {{ number_format($total_keseluruhan, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        @if ($tipe == 'Pemasukan')
            <div class="col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Pemasukan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                    {{ number_format($total_masuk, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-arrow-alt-circle-down fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($tipe == 'Pengeluaran')
            <div class="col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Pengeluaran</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                    {{ number_format($total_keluar, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-arrow-alt-circle-up fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Pemasukan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                    {{ number_format($total_masuk, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-arrow-alt-circle-down fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Pengeluaran</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                    {{ number_format($total_keluar, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-arrow-alt-circle-up fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-muted"><i class="fas fa-money-bill mr-1"></i> Data {{ $tipe }}
                Keuangan </h6>
        </div>
        <div class="card-body">
            <div class="d-lg-flex justify-content-lg-between mb-3 d-block">
                <div class="my-2">
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'bendahara')
                        @if ($type != '')
                            <a href="{{ route('keuangan.create', ['type' => $type]) }}" class="btn btn-primary btn-sm">
                                New
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        @endif
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
                            <a href="{{ route('keuangan.index') }}" class="btn btn-sm btn-danger">
                                Reset
                            </a>
                        </div>
                    @endif
                </form>
            </div>
            <div class="d-lg-flex justify-content-lg-end mb-3 d-block">
                <form action="{{ route('keuangan.index') }}" method="GET">
                    <input type="text" name="type" class="d-none" value="{{ $type ?? '' }}">
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
                            <a href="{{ route('keuangan.index') }}" class="btn btn-sm btn-danger">
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
                            <th class="text-center">Tipe</th>
                            @if ($type != 'out')
                                <th class="text-center">Nama</th>
                            @endif
                            <th class="text-center">Jenis</th>
                            <th class="text-center">Nominal</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Keterangan</th>
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'bendahara')
                                <th class="text-center">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center" style="width:5%">
                                    {{ $data->firstItem() + $loop->index }}</td>
                                <td class="text-center">
                                    @switch($item->type)
                                        @case('masuk')
                                            <span class="badge badge-primary">MASUK</span>
                                        @break

                                        @case('keluar')
                                            <span class="badge badge-danger">KELUAR</span>
                                        @break

                                        @default
                                            <span class="badge badge-secondary">{{ $item->type }}</span>
                                        @break
                                    @endswitch
                                </td>
                                @if ($type != 'out')
                                    <td>{{ $item->nama_penginput }}</td>
                                @endif
                                <td>{{ $item->jenis }}</td>
                                <td>Rp {{ $item->format_nominal }}</td>
                                <td>{{ $item->format_tanggal }}</td>
                                <td>{{ $item->keterangan }}</td>
                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'bendahara')
                                    <td class="text-center" style="width: 10%">
                                        <div class="d-flex row justify-content-center">
                                            <form action="{{ route('keuangan.edit', $item->id) }}" class="col-8 m-1">
                                                <input type="text" name="type" value="{{ $type }}"
                                                    class="d-none">
                                                <button class="btn btn-success btn-sm">
                                                    Edit <i class="bi bi-pencil ms-2"></i>
                                                </button>
                                            </form>
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
                                                    <form action="{{ route('keuangan.destroy', $item->id) }}"
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
                    <a href="{{ route('keuangan.report', ['type' => $type, 'choose_bulan' => $choose_bulan]) }}"
                        class="btn btn-danger btn-sm" target="_blank">Cetak
                        <i class="fas fa-file-pdf"></i></a>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
