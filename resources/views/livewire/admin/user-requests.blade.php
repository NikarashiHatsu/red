<div>
    @if ($form_orders->count() > 0)
        <p>
            Ada {{ $form_orders->count() }} Toko yang menunggu
            <a href="{{ route('admin.user_request.index') }}">persetujuan</a>
        </p>
    @else
        <p>
            Belum ada Toko yang menunggu persetujuan.
        </p>
    @endif
</div>
