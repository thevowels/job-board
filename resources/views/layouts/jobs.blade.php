<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90%">

    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main >
        <div class="max-w-2xl mx-auto pt-4 text-gray-900">
            @if(session('success'))

                <div role="alert" class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4  text-green-700 opacity-75">
                    <p class="font-bold ">
                        Success!
                    </p>
                    <p>{{session('success')}}</p>
                </div>
            @endif
            @if(session('error'))

                <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4  text-red-700 opacity-75">
                    <p class="font-bold ">
                        Success!
                    </p>
                    <p>{{session('error')}}</p>
                </div>
            @endif
            <ul class="flex space-x-2">
            @auth
                <li>
                    <a href="{{route('my-job-applications.index')}}">
                        {{auth()->user()->name ?? 'Guest'}}: Applications
                    </a>
                </li>
                <li>
                    <a href="{{route('my-jobs.index')}}">My Jobs</a>
                </li>
                @endif
            </ul>
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
