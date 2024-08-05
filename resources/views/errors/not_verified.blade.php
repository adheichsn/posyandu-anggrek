<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/unj.png') }}" type="image/x-icon">
    @include('layout.css')
    <title>Verifikasi Akun | Posyandu</title>
</head>

<body>
    <div class="container text-center mt-5">
        @if (empty($data))
            <div class="d-flex justify-content-center mb-3">
                <img class="w-25" src="{{ asset('img/verify.png') }}" alt="unverified">
            </div>
            <h2>Akun anda belum terverifikasi!</h2>
            <p>Upload Kartu Tanda Mahasiswa/Tanda pengenal lain untuk melakukan Verifikasi Akun</p>
            <!-- Button trigger modal -->
            <div class="form-group col-6 col-lg-4 mx-auto">
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modelId">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Image
                </button>
            </div>
            {{-- modal --}}
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Gambar Tanda Pengenal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.upload_image.html')
                            <textarea id="image-dropify-send" class="d-none" name="image" required></textarea>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="kirimGambar" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center mb-3">
                <img class="w-25" src="{{ asset($data->tanda_pengenal) }}">
            </div>
            @if ($data->status == 'reject')
                <h2>Verifikasi gagal!</h2>
                <p>Note :</p>
                {!! $data->description ?? '-' !!}
            @else
                <h2>Menunggu Verifikasi!</h2>
                <p>Tanda pengenal anda berhasil dikirim. Mohon tunggu proses verifikasi oleh Administrator</p>
            @endif

            <div class="form-group col-6 col-lg-4 mx-auto">
                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#modelId">
                    <i class="fa fa-undo" aria-hidden="true"></i> Change Image
                </button>
            </div>
            {{-- modal --}}
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ganti Gambar Tanda Pengenal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('components.upload_image.html')
                            <textarea id="image-dropify-send" class="d-none" name="image" required></textarea>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="kirimGambar" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <p>atau</p>
        <div class="form-group col-6 col-lg-4 mx-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger btn-block" type="submit">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                    Logout
                </button>
            </form>
        </div>
    </div>
</body>
@include('layout.js')
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
    var uploadCrop = $('#cropie-demo').croppie({
        viewport: {
            width: 300,
            height: 200
        },
        boundary: {
            width: 450,
            height: 300
        },
    });
    $('#image-dropify').on('change', function() {
        $('#myModal').modal('show');
        var reader = new FileReader();
        reader.onload = function(e) {
            uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function() {
                $('.dropify-render').empty();
                $('.dropify-render').append(
                    '<div class="text-center mt-3"><div class="spinner-grow" style="width: 4rem; height: 4rem;" role="status"><span class="sr-only">Loading...</span></div><h1>Loading...</h1></div>'
                );
            });
        }
        reader.readAsDataURL(this.files[0]);
    });
    $('#crop').on('click', function() {
        var result = uploadCrop.croppie('result', {
            type: 'base64',
            size: {
                width: 600,
                height: 400
            }
        }).then(function(blob) {
            $('#myModal').modal('hide');
            $('.dropify-render').empty();
            $('.dropify-render').append('<img src="' + blob + '">');
            $('#image-dropify-send').val(blob);
        });
    });

    $('#kirimGambar').click(function(e) {
        e.preventDefault();
        Swal.showLoading()
        var croppedImage = $('#image-dropify-send').val();
        var _token = "{{ csrf_token() }}";
        var url = "{{ route('user.send.verify') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: _token,
                image: croppedImage,
            },
            dataType: 'JSON',
            success: function(data) {
                Swal.hideLoading()
                if (data.status == 'success') {
                    Swal.fire(
                        'Done!',
                        data.message,
                        'success'
                    )
                    location.reload();
                } else {
                    Swal.fire(
                        'Failed!',
                        data.message,
                        'error'
                    )
                }
                console.log(data)
            },
            error: function(ajaxContext) {
                Swal.hideLoading()
                Swal.fire(
                    'Oops...',
                    'Terjadi kesalahan',
                    'error',
                )
            }
        });
    });
</script>

</html>
