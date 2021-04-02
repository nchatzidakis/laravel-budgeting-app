<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-lg-down-none">
            Laravel Budgeting App
        </div>
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('panel.dashboard') }}">
                    Dashboard
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('panel.sites.index') }}">
                    Sites
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('panel.expenses.create') }}">
                    Expenses
                </a>
            </li>
        </ul>
    </div>
    <div class="c-wrapper c-fixed-components">
        <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none"
                    type="button"
                    data-target="#sidebar"
                    data-class="c-sidebar-lg-show"
                    responsive="true">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="c-header-nav d-md-down-none">
                @foreach ($header['navigation']['sites'] ?? [] as $site)
                    <li class="c-header-nav-item px-3">
                        <a href="{{ route('panel.sites.show', $site->uuid) }}" class="c-header-nav-link">
                            {{ $site->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul class="c-header-nav ml-auto mr-4">
                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <div class="c-avatar">
                            <img class="c-avatar-img" src="https://via.placeholder.com/150" />
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                        {!! Form::open(['route' => 'logout', 'id' => 'logout-form']) !!}
                        {!! Form::close() !!}
                        <a class="dropdown-item logout-trigger">
                            <i class="fas fa-lock"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <div class="c-subheader px-3">
                {{ $breadcrumbs ?? null}}
            </div>
        </header>

        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </main>
            <footer class="c-footer">
                <div class="ml-auto">
                    Developed by <a href="https://github.com/nchatzidakis/laravel-budgeting-app">Nikolas Chatzidakis</a> |
                    Admin template by&nbsp;<a href="https://coreui.io/">CoreUI</a>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(function () {
            $('.logout-trigger').on('click', function () {
                $('#logout-form').submit();
            });
        })
    </script>
</body>
</html>
