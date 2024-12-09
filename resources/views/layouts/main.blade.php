<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
    $lastSegment = Request::segment(count(Request::segments()));
    $secondLastSegment = Request::segment(count(Request::segments()) - 1);
    $thirdLastSegment = Request::segment(count(Request::segments()) - 2);
    // jika segmen terakhir adalah angka, maka gabungkan dua segmen sebelumnya
    $pageTitle = is_numeric($lastSegment) ? $thirdLastSegment . ' ' . $secondLastSegment : $lastSegment;
    $pageTitle = ucfirst(str_replace('-', ' ', $pageTitle));
    @endphp
    @stack('css')
    <title>{{ $pageTitle }} - Management Team</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-300 rounded-lg h-auto mt-16">
            <div class="h-auto items-center justify-center mb-4 rounded">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
</body>

</html>