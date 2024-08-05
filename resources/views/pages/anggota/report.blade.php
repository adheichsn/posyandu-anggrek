<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Masyarakat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Masyarakat</h4>
        </h5>
    </center>

    <table class='table table-bordered' width="100%" style="table-layout:fixed;">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Pekerjaan</th>
                <th class="text-center">Tgl Lahir</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($anggota as $item)
                <tr>
                    <td class="text-center" style="width:5%">{{ $i++ }}</td>
                    <td style="width: 30%">
                        {{ $item->nama }}
                    </td>
                    <td class="text-center" style="width: 10%">
                        @switch($item->jenis_kelamin)
                            @case('laki_laki')
                                <span class="badge badge-pill badge-primary">Laki-laki</span>
                            @break

                            @case('perempuan')
                                <span class="badge badge-pill badge-success">Perempuan</span>
                            @break

                            @default
                                <span class="badge rounded-pill text-bg-danger">{{ $item->jenis_kelamin }}</span>
                            @break
                        @endswitch
                    </td>
                    <td class="text-center" style="width: 20%">
                        {{ $item->alamat }}
                    </td>
                    <td class="text-center" style="width: 20%">
                        {{ $item->pekerjaan }}
                    </td>
                    <td class="text-center" style="width: 10%">
                        {{ $item->tgl_lahir }}
                    </td>
                    <td class="text-center" style="width: 10%">
                        @switch($item->status)
                            @case('aktif')
                                <span class="badge badge-pill badge-primary">Aktif</span>
                            @break

                            @case('non_aktif')
                                <span class="badge badge-pill badge-danger">Nonaktif</span>
                            @break

                            @default
                                <span class="badge rounded-pill text-bg-secondary">{{ $item->status }}</span>
                            @break
                        @endswitch
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
