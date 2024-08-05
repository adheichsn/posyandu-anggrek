<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pelayanan</title>
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
        <h5>Laporan Data Pelayanan</h4>
        </h5>
    </center>

    <table class='table table-bordered' width="100%" style="table-layout:fixed;">
        <thead>
            <tr>
                <th class="text-center text-wrap">No.</th>
                <th class="text-center text-wrap">Tanggal Pemeriksaan</th>
                <th class="text-center text-wrap">ID Bayi</th>
                <th class="text-center text-wrap">Nama Bayi</th>
                <th class="text-center text-wrap">Nama Ibu</th>
                <th class="text-center text-wrap" style="width: 5%">Usia</th>
                <th class="text-center text-wrap" style="width: 5%">Berat <br>Badan</th>
                <th class="text-center text-wrap" style="width: 5%">Tinggi <br>Badan</th>
                <th class="text-center text-wrap">Imunisasi</th>
                <th class="text-center text-wrap">Vitamin</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($pelayanan as $item)
                <tr>
                    <td class="text-center" style="width:5%">{{ $i++ }}</td>
                    <td>
                        {{ $item->format_tanggal_pelayanan }} WIB
                    </td>
                    <td class="text-center" style="width: 5%">
                        {{ $item->user_id }}
                    </td>
                    <td class="text-wrap">
                        {{ $item->user->nama_anak }} <br>
                        {{ $item->user->nik_anak }}
                    </td class="text-wrap">
                    <td>
                        {{ $item->user->nama_ibu }} <br>
                        {{ $item->user->nik_ibu }}
                    </td>
                    <td style="width: 6%">
                        {{ $item->user->usia }} thn
                    </td>
                    <td style="width: 6%">
                        {{ $item->berat_badan }} kg
                    </td>
                    <td style="width: 6%">
                        {{ $item->tinggi_badan }} cm
                    </td>
                    <td class="text-wrap">
                        {{ $item->jenis_imunisasi }}
                    </td>
                    <td class="text-wrap">
                        {{ $item->jenis_vitamin }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
