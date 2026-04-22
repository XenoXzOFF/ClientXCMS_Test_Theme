<?php
/*
 * This file is part of the CLIENTXCMS project.
 * It is the property of the CLIENTXCMS association.
 *
 * Personal and non-commercial use of this source code is permitted.
 * However, any use in a project that generates profit (directly or indirectly),
 * or any reuse for commercial purposes, requires prior authorization from CLIENTXCMS.
 *
 * To request permission or for more information, please contact our support:
 * https://clientxcms.com/client/support
 *
 * Learn more about CLIENTXCMS License at:
 * https://clientxcms.com/eula
 *
 * Year: 2025
 */
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <title>@yield('title') {{ translated_setting('seo_site_title') }}</title>
    @yield('styles')
    @vite('resources/themes/default/css/app.scss')
    @vite('resources/themes/default/js/app.js')
    {!! app('seo')->head('front', $meta_append ?? null) !!}
    {!! app('seo')->favicon('front') !!}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '{{ setting('theme_primary_color', '#6366f1') }}',
                        'primary-light': '#818cf8',
                        'primary-dark': '#4f46e5',
                    }
                }
            }
        }
    </script>
    
    {{-- Polices Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    {{-- Style LXCHOST personnalisé --}}
    <style>
        :root {
            --primary: {{ setting('theme_primary_color', '#6366f1') }};
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --bg-primary: #030712;
            --bg-secondary: #0f1722;
            --bg-card: rgba(15, 23, 34, 0.7);
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.08);
            --glass-blur: blur(16px);
        }
        
        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        
        /* Fond global */
        body {
            background: var(--bg-primary) !important;
            color: var(--text-primary) !important;
        }
        
        .dark\:bg-gray-900, .dark\:bg-gray-800 {
            background: var(--bg-primary) !important;
        }
        
        /* Header Glassmorphism */
        header {
            background: rgba(3, 7, 18, 0.85) !important;
            backdrop-filter: var(--glass-blur) !important;
            -webkit-backdrop-filter: var(--glass-blur) !important;
            border-bottom: 1px solid var(--border-color) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
        }
        
        /* Menu mobile */
        .hs-overlay, #navbar-menu {
            background: rgba(3, 7, 18, 0.98) !important;
            backdrop-filter: var(--glass-blur) !important;
            -webkit-backdrop-filter: var(--glass-blur) !important;
        }
        
        /* Navigation links */
        nav a, header a {
            color: var(--text-secondary) !important;
            font-weight: 500 !important;
            transition: all 0.2s ease !important;
            position: relative !important;
        }
        
        nav a:hover {
            color: var(--text-primary) !important;
        }
        
        nav a::after {
            content: '' !important;
            position: absolute !important;
            bottom: -2px !important;
            left: 50% !important;
            transform: translateX(-50%) scaleX(0) !important;
            width: 60% !important;
            height: 2px !important;
            background: linear-gradient(90deg, var(--primary), var(--primary-light)) !important;
            transition: transform 0.3s ease !important;
            border-radius: 2px !important;
        }
        
        nav a:hover::after,
        nav a.text-indigo-500::after {
            transform: translateX(-50%) scaleX(1) !important;
        }
        
        nav a.text-indigo-500 {
            color: var(--text-primary) !important;
        }
        
        /* Cartes */
        .card, [class*="card"], .bg-white, .dark\:bg-gray-800,
        .shadow, [class*="shadow"] {
            background: var(--bg-card) !important;
            backdrop-filter: var(--glass-blur) !important;
            -webkit-backdrop-filter: var(--glass-blur) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 24px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }
        
        .card:hover, [class*="card"]:hover {
            transform: translateY(-6px) !important;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4) !important;
            border-color: rgba(255, 255, 255, 0.15) !important;
        }
        
        /* Boutons */
        .btn, button[type="submit"], .bg-indigo-600, [class*="bg-indigo"] {
            background: linear-gradient(135deg, var(--primary), var(--primary-light)) !important;
            border: none !important;
            color: white !important;
            font-weight: 600 !important;
            border-radius: 50px !important;
            padding: 12px 28px !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3) !important;
            position: relative !important;
            overflow: hidden !important;
        }
        
        .btn::before, button[type="submit"]::before {
            content: '' !important;
            position: absolute !important;
            top: 0 !important;
            left: -100% !important;
            width: 100% !important;
            height: 100% !important;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent) !important;
            transition: left 0.5s ease !important;
        }
        
        .btn:hover::before, button[type="submit"]:hover::before {
            left: 100% !important;
        }
        
        .btn:hover, button[type="submit"]:hover, .bg-indigo-600:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5) !important;
        }
        
        /* Titres */
        h1, h2, h3, h4, h5, h6 {
            color: var(--text-primary) !important;
            font-weight: 700 !important;
            letter-spacing: -0.02em !important;
        }
        
        h1 {
            background: linear-gradient(135deg, #ffffff, var(--primary-light)) !important;
            -webkit-background-clip: text !important;
            background-clip: text !important;
            color: transparent !important;
        }
        
        /* Textes */
        p, .text-gray-400, .text-gray-500, .text-gray-600, .text-gray-800,
        .dark\:text-gray-400, .dark\:text-gray-500 {
            color: var(--text-secondary) !important;
            line-height: 1.7 !important;
        }
        
        /* Footer */
        footer {
            background: transparent !important;
            border-top: 1px solid var(--border-color) !important;
            padding: 40px 0 !important;
        }
        
        /* Inputs */
        input, textarea, select {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-primary) !important;
            border-radius: 12px !important;
            padding: 12px 16px !important;
            transition: all 0.2s ease !important;
        }
        
        input:focus, textarea:focus, select:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2) !important;
            outline: none !important;
        }
        
        /* Badges */
        .badge, [class*="badge"] {
            background: linear-gradient(135deg, var(--primary), var(--primary-light)) !important;
            color: white !important;
            border-radius: 50px !important;
            padding: 4px 12px !important;
            font-size: 12px !important;
            font-weight: 600 !important;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes glow {
            0%, 100% { box-shadow: 0 0 20px rgba(99, 102, 241, 0.3); }
            50% { box-shadow: 0 0 40px rgba(99, 102, 241, 0.6); }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease forwards !important;
        }
        
        /* Stagger animations */
        .stagger-item {
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards !important;
        }
        
        .stagger-item:nth-child(1) { animation-delay: 0.1s !important; }
        .stagger-item:nth-child(2) { animation-delay: 0.2s !important; }
        .stagger-item:nth-child(3) { animation-delay: 0.3s !important; }
        .stagger-item:nth-child(4) { animation-delay: 0.4s !important; }
        .stagger-item:nth-child(5) { animation-delay: 0.5s !important; }
        .stagger-item:nth-child(6) { animation-delay: 0.6s !important; }
        
        /* Scrollbar personnalisée */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--bg-secondary);
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }
        
        /* Menu hamburger */
        .hs-collapse-toggle {
            color: var(--text-primary) !important;
            background: rgba(255, 255, 255, 0.05) !important;
            border-radius: 12px !important;
            padding: 8px !important;
        }
        
        /* Tables */
        table {
            background: var(--bg-card) !important;
            backdrop-filter: var(--glass-blur) !important;
            border-radius: 20px !important;
            overflow: hidden !important;
        }
        
        th {
            background: rgba(255, 255, 255, 0.05) !important;
            color: var(--text-primary) !important;
            font-weight: 600 !important;
            padding: 16px !important;
        }
        
        td {
            color: var(--text-secondary) !important;
            padding: 16px !important;
            border-top: 1px solid var(--border-color) !important;
        }
        
        /* Alertes */
        .alert {
            background: var(--bg-card) !important;
            backdrop-filter: var(--glass-blur) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 16px !important;
        }
    </style>
</head>
<body class="{{is_darkmode() ? 'dark' : '' }} flex flex-col h-full">
    {!! app('seo')->header() !!}

<div class="dark:bg-gray-900 h-full">
    <main id="content" role="main" class="shrink-0">
        <div class="overflow-hidden">
            <header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full py-2.5 sm:py-4 bg-white border-b border-gray-200 text-sm py-3 sm:py-0 dark:bg-gray-800 dark:border-gray-700 print:hidden">
                <nav class="max-w-7xl flex basis-full items-center mx-auto px-4 sm:px-6 lg:px-8" aria-label="Global">
                    <div class="me-5 md:me-8">
                        @if (setting('theme_header_logo', false))
                            <a class="flex-none text-xl font-semibold dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/" aria-label="{{ setting('app_name') }}">
                                <img class="mx-auto h-10 w-auto" src="{{ setting('app_logo_text', asset('images/logo.png')) }}" alt="{{ setting('app_name') }}">
                            </a>
                        @else
                            <a class="flex-none text-xl font-semibold dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/" aria-label="{{ setting('app_name') }}">{{ setting('app_name') }}</a>
                        @endif
                    </div>
                    <div class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full fixed top-0 start-0 transition-all duration-300 transform h-full max-w-xs w-full z-[60] bg-white border-e basis-full grow sm:order-2 sm:static sm:block sm:h-auto sm:max-w-none sm:w-auto sm:border-r-transparent sm:transition-none sm:translate-x-0 sm:z-40 sm:basis-auto dark:bg-gray-800 dark:border-r-gray-700 sm:dark:border-r-transparent sm:block" tabindex="-1">
                        <div class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:mt-0 sm:ps-7">
                            @foreach (app('theme')->getFrontLinks() as $link)
                                <a class="font-medium sm:px-2 mr-3 {{ is_subroute($link->trans('url')) ? 'text-indigo-500 hover:text-indigo-400 dark:text-indigo-400 dark:hover:text-indigo-500' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}" href="{{ $link->trans('url') }}">
                                    {!! $link->getHtmlIcon() !!} {{ $link->trans('name') }}
                                    @if (isset($link->badge))
                                        <span class="inline ms-1 font-medium text-xs bg-indigo-600 text-white py-1 px-2 rounded full">{{ $link->trans('badge') }}</span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex items-center justify-end ms-auto sm:justify-between sm:gap-x-3 sm:order-3">
                        <div class="flex flex-row items-center justify-end gap-2">
                            @include('shared.layouts.iconright')
                        </div>

                        <div class="sm:hidden">
                            <button type="button" class="hs-collapse-toggle size-9 flex justify-center items-center text-sm font-semibold rounded-lg text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 p-1" data-hs-collapse="#navbar-menu" aria-controls="navbar-menu" aria-label="Toggle navigation">
                                <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                                <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                            </button>
                        </div>
                    </div>
                </nav>
            </header>

            <div id="navbar-menu" class="dark:bg-gray-800 dark:border-gray-700 hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow" tabindex="-1">
                <div class="mx-auto flex flex-col gap-y-4 gap-x-0 my-5 ml-3 sm:flex-row sm:items-center sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
                    @foreach (app('theme')->getFrontLinks() as $link)
                        <a class="font-medium sm:px-2 mr-3 {{ is_subroute($link->trans('url')) ? 'text-indigo-500 hover:text-indigo-400 dark:text-indigo-400 dark:hover:text-indigo-500' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}" href="{{ $link->trans('url') }}">
                            <i class="{{ $link->icon }} mr-1"></i> {{ $link->trans('name') }}
                            @if (isset($link->badge))
                                <span class="inline ms-1 font-medium text-xs bg-indigo-600 text-white py-1 px-2 rounded-full">{{ $link->trans('badge') }}</span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @yield('content')

    </main>
    @include('layouts.footer')
</div>
@yield('scripts')
{!! app('seo')->foot('front') !!}
<form method="POST" action="{{ route('logout') }}" id="logout-form">
    @csrf
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    document.querySelectorAll('.confirmation-popup').forEach(
        function (element) {
            element.addEventListener('submit', function (event) {
                event.preventDefault();
                confirmation(element).then((result) => {
                    if (result.isConfirmed) {
                        element.submit();
                    }
                });
            });
        }
    )
    function confirmation(element) {
        const text = element.getAttribute('data-text') ?? '{{ __('admin.doyouwantreally') }}';
        const icon = element.getAttribute('data-icon') ?? 'warning';
        const confirmButtonText = element.getAttribute('data-confirm-button-text') ?? '{{ __('global.delete') }}';
        const showCancelButton = element.getAttribute('data-show-cancel-button') ?? true;
        const cancelButtonText = element.getAttribute('data-cancel-button-text') ?? '{{ __('global.cancel') }}';
        return Swal.fire({
            text: text,
            icon: icon,
            confirmButtonText: confirmButtonText,
            showCancelButton: showCancelButton,
            cancelButtonText: cancelButtonText,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
        })
    }
    
    // Animation au scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.stagger-item, .card, [class*="card"]').forEach(el => {
        observer.observe(el);
    });
</script>

</body>
</html>