<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/unj.png') }}" type="image/x-icon">
    @include('layout.css')
    <title>Ooppss Not Found! | Posyandu</title>
</head>

<body>
    <div class="container text-center mt-5">
        <div class="d-flex justify-content-center mb-3">
            <img class="w-25" src="{{ asset('img/404.svg') }}" alt="Unauthirized">
        </div>
        <h1>Not Found!</h1>
        <h4 class="mb-5">Ooopss!!! laman yang anda cari tidak ditemukan</h4>
        <a href="{{ route('home') }}" class="btn btn-primary"> <i class="fas fa-chevron-circle-left"></i> Kembali ke
            halaman awal</a>
    </div>
</body>

</html>
