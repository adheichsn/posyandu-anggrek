<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Jadwal Pelayanan</title>
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
        <h5>Laporan Data Jadwal Pelayanan</h4>
        </h5>
    </center>

    <table class='table table-bordered' width="100%" style="table-layout:fixed;">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Jenis Pelayanan</th>
                <th class="text-center">Lokasi</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($jadwal as $item)
                <tr>
                    <td class="text-center" style="width:5%">{{ $i++ }}</td>
                    <td>
                        {{ $item->jenis_pelayanan }}
                    </td>
                    <td>
                        {{ $item->lokasi }}
                    </td>
                    <td class="text-center">
                        {{ $item->format_tanggal }} WIB
                    </td>
                    <td style="width: 30%">
                        {{ $item->deskripsi }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
