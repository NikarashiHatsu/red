@if (session()->has('success'))
    <script>
        jQuery(function() {
            swal.fire(
                'Berhasil',
                '{{ session()->get("success") }}',
                'success'
            )
        })
    </script>
@endif

@if (session()->has('error'))
    <script>
        jQuery(function() {
            swal.fire(
                'Gagal',
                '{{ session()->get("error") }}',
                'error'
            )
        })
    </script>
@endif