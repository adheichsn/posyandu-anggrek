<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('vendor/splide-4.1.3/dist/js/splide.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
<script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('vendor/croppie/croppie.js') }}"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('vendor/jqueryTouch/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-signature/jquery.signature.js') }}"></script>
@yield('js')

<script type="text/javascript">
    function delete_data(id) {
        var text = "Data akan dihapus dan tidak bisa dikembalikan"
        var url = "{{ url('/' . \Request::segment(1) . '/') }}";
        var _token = "{{ csrf_token() }}";
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url + "/" + id,
                    type: 'DELETE',
                    data: {
                        _token: _token
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        table.ajax.reload();
                        if (data.status == 'success') {
                            Swal.fire(
                                'Terhapus!',
                                data.message,
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Gagal!',
                                data.message,
                                'error'
                            )
                        }
                        console.log(data)
                    },
                    error: function(ajaxContext) {
                        table.ajax.reload();
                        Swal.fire(
                            'Oops...',
                            'Terjadi kesalahan',
                            'error',
                        )
                    }
                });
            }
        })
    };
</script>
