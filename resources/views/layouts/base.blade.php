<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')

        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @livewireStyles
    <script src="{{asset('js/app.js')}}" defer></script>
{{--    <script src="{{asset('js/init-alpine.js')}}"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/theme-change@1.2.0/dist/select.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="darks" data-theme="light">
<body class="font-sans bg-grayBackground dark:bg-gray-900 text-gray-900 text-sm">

@livewire('header-component')
{{--@livewire('sidebar-component')--}}
<main class="container mx-auto max-w-custom flex flex-col md:flex-row">
    @livewire('idea-component')

    <div class="w-full px-2 md:px-0 md:w-175">
        @livewire('status-component')

        <div class="mt-8">
           @yield('body')
        </div>
    </div>
</main>
@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('js')
<x-livewire-alert::scripts />
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>

</body>
</html>
