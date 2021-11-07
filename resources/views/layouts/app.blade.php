<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('images/logo.webp') }}" type="image/x-icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jQueryLibraries.js') }}"></script>

        @livewireStyles()
    </head>
    <body class="font-sans antialiased text-gray-700">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @livewireScripts()

        <script>
            function confirmDeletion(event)
            {
                let form = $(event.target).parents('form');

                swal.fire({
                    title: 'Hapus data?',
                    text: 'Apakah Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: false
                }).then((result) => {
                    if (result.value) {
                        form.submit();

                        return swal.fire(
                            'Dikonfirmasi',
                            'Data akan dihapus.',
                            'success'
                        );
                    }

                    return swal.fire(
                        'Dibatalkan',
                        'Data tetap disimpan.',
                        'warning'
                    );
                });
            }
        </script>
    </body>
</html>
