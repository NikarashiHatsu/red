@section('breadcrumb')
<div class="flex items-center justify-between mb-4">
    <h5 class="text-lg font-semibold">
        Dashboard
    </h5>
    <div class="text-sm breadcrumbs">
        <ul>
            <li>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="ml-2">
                        Dashboard
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection

@section('content')
    <p>
        Selamat datang, {{ auth()->user()->name }}
    </p>
@endsection