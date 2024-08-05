<!DOCTYPE html>
<html>

<head>
    <title>User List Report</title>
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
        <h5>User List Report</h4>
        </h5>
    </center>

    <table class='table table-bordered' width="100%" style="table-layout:fixed;">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Username</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">No HP</th>
                {{-- <th class="text-center">NIK Ibu</th> --}}
                <th class="text-center">Nama Ibu</th>
                <th class="text-center">Tgl Lahir Ibu</th>
                <th class="text-center">NIK Anak</th>
                <th class="text-center">Nama Anak</th>
                <th class="text-center">Tgl Lahir</th>
                <th class="text-center">Usia</th>
                <th class="text-center">Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($user as $item)
                <tr>
                    <td class="text-center" style="width:5%">{{ $i++ }}</td>
                    <td>
                        {{ $item->username }}
                    </td>
                    <td class="text-center">
                        {{ $item->alamat }}
                    </td>
                    <td class="text-center">
                        {{ $item->no_hp }}
                    </td>
                    {{-- <td class="text-center">
                        {{ $item->nik_ibu }}
                    </td> --}}
                    <td class="text-center">
                        {{ $item->nama_ibu }}
                    </td>
                    <td class="text-center">
                        {{ $item->tgl_lahir_ibu }}
                    </td>
                    <td class="text-center">
                        {{ $item->nik_anak }}
                    </td>
                    <td class="text-center">
                        {{ $item->nama_anak }}
                    </td>
                    <td class="text-center">
                        {{ $item->tgl_lahir }}
                    </td>
                    <td class="text-center" style="width: 5%">
                        {{ $item->usia }}
                    </td>
                    <td class="text-center" style="width: 5%">
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
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
