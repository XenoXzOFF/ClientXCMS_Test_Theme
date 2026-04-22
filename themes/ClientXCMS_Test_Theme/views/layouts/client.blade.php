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
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title') {{ translated_setting('seo_site_title') }}</title>
    @yield('styles')
    @vite('resources/themes/default/js/app.js')
    @vite('resources/themes/default/css/app.scss')
    {!! app('seo')->head('client', $meta_append ?? null) !!}
    {!! app('seo')->favicon('client') !!}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    {{-- Style LXCHOST pour la zone client --}}
    <style>
        :root {
            --primary: {{ setting('theme_primary_color', '#6366f1') }};
            --primary-light: #818cf8;
            --bg-primary: #030712;
            --bg-secondary: #0f1722;
            --bg-card: rgba(15, 23, 34, 0.7);
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.08);
            --glass-blur: blur(16px);
        }
        
        body {
            background: var(--bg-primary) !important;
            color: var(--text-primary) !important;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        
        .dark\:bg-gray-900, .bg-gray-50 {
            background: var(--bg-primary) !important;
        }
        
        /* Header */
        header {
            background: rgba(3, 7, 18, 0.85) !important;
            backdrop-filter: var(--glass-blur) !important;
            -webkit-backdrop-filter: var(--glass-blur) !important;
            border-bottom: 1px solid var(--border-color) !important;
        }
        
        /* Navigation client (onglets) */
        nav[aria-label="Jump links"] {
            background: rgba(15, 23, 34, 0.7) !important;
            backdrop-filter: var(--glass-blur) !important;
            -webkit-backdrop-filter: var(--glass-blur) !important;
            border-bottom: 1px solid var(--border-color) !important;
            box-shadow: none !important;
            padding: 12px 0 !important;
        }
        
        nav[aria-label="Jump links"] a {
            color: var(--text-secondary) !important;
            font-weight: 500 !important;
            padding: 8px 16px !important;
            border-radius: 50px !important;
            transition: all 0.2s ease !important;
        }
        
        nav[aria-label="Jump links"] a:hover {
            color: var(--text-primary) !important;
            background: rgba(255, 255, 255, 0.05) !important;
        }
        
        nav[aria-label="Jump links"] a.text-indigo-600,
        nav[aria-label="Jump links"] a.text-indigo-500 {
            color: var(--primary-light) !important;
            background: rgba(99, 102, 241, 0.1) !important;
        }
        
        /* Cartes */
        .card, [class*="card"], .bg-white, .dark\:bg-gray-800,
        .shadow, [class*="shadow"], .rounded-lg {
            background: var(--bg-card) !important;
            backdrop-filter: var(--glass-blur) !important;
            -webkit-backdrop-filter: var(--glass-blur) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 20px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3) !important;
        }
        
        /* Boutons */
        .btn, button[type="submit"], .bg-indigo-600, [class*="bg-indigo"] {
            background: linear-gradient(135deg, var(--primary), var(--primary-light)) !important;
            border: none !important;
            color: white !important;
            font-weight: 600 !important;
            border-radius: 50px !important;
            padding: 10px 24px !important;
            transition: all 0.3s ease !important;
        }
        
        .btn:hover, button[type="submit"]:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4) !important;
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
        }
        
        td {
            color: var(--text-secondary) !important;
            border-top: 1px solid var(--border-color) !important;
        }
        
        /* Inputs */
        input, textarea, select {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-primary) !important;
            border-radius: 12px !important;
        }
        
        input:focus, textarea:focus, select:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2) !important;
        }
        
        /* Textes */
        h1, h2, h3, h4, h5, h6, .dark\:text-white {
            color: var(--text-primary) !important;
        }
        
        p, .text-gray-500, .text-gray-600, .dark\:text-gray-400 {
            color: var(--text-secondary) !important;
        }
        
        /* Liens */
        a:not(nav a):not(.btn) {
            color: var(--primary-light) !important;
        }
        
        /* Scrollbar */
        nav[aria-label="Jump links"] ::-webkit-scrollbar {
            height: 6px;
        }
        
        nav[aria-label="Jump links"] ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }
        
        nav[aria-label="Jump links"] ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-gray-50 {{is_darkmode() ? 'dark' : '' }}">
    {!! method_exists(app('seo'), 'header') ? app('seo')->header() : '' !!}
<div class="dark:bg-gray-900 min-h-screen">
    <main id="content" role="main">
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
                                <a class="font-medium sm:px-2 mr-3 {{ is_subroute($link) ? 'text-indigo-500 hover:text-indigo-400 dark:text-indigo-400 dark:hover:text-indigo-500' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}" href="{{ $link->trans('url') }}">
                                    <i class="{{ $link->trans('icon') }}  mr-1"></i> {{ $link->trans('name') }}
                                    @if (isset($link->badge))
                                        <span class="inline ms-1 font-medium text-xs bg-indigo-600 text-white py-1 px-2 rounded full">{{ $link->trans('badge') }}</span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex items-center justify-end ms-auto sm:justify-between sm:gap-x-3 sm:order-3">
                        <div class="sm:hidden">
                            <button type="button" class="hs-collapse-toggle size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700" data-hs-collapse="#navbar-menu" aria-controls="navbar-menu" aria-label="Toggle navigation">
                                <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                                <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                            </button>
                        </div>

                        <div class="flex flex-row items-center justify-end gap-2">
                            @include('shared.layouts.iconright')
                        </div>
                    </div>
                </nav>
            </header>

        </div>

        {{-- Navigation client (onglets) - CORRIGÉ : pas de barre de défilement disgracieuse --}}
        <nav class="print:hidden -top-px text-sm font-medium ring-1 ring-gray-900 ring-opacity-5 border-t shadow-sm shadow-gray-100 pt-6 md:pb-6 -mt-px dark:bg-gray-700 dark:border-gray-800 dark:shadow-gray-700/[.7]" aria-label="Jump links">
            <div class="max-w-7xl w-full flex items-center gap-2 overflow-x-auto px-4 sm:px-6 lg:px-8 pb-2 md:pb-0 mx-auto scrollbar-hide">
                @foreach(\App\Http\Navigation\ClientNavigationMenu::getItems() as $item)
                    <div class="snap-center shrink-0">
                        <a class="inline-flex items-center gap-x-2 px-4 py-2 rounded-full whitespace-nowrap {{ is_subroute(route($item['route'])) && $item['route'] != 'front.client.index' ? 'active' : '' }}" href="{{ route($item['route']) }}">
                            <i class="{{ $item['icon'] }}"></i> {{ $item['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </nav>

        <div id="navbar-menu" class="dark:bg-gray-800 dark:border-gray-700 hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow" tabindex="-1">
            <div class="mx-auto flex flex-col gap-y-4 gap-x-0 my-5 ml-3 sm:flex-row sm:items-center sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
                @foreach (app('theme')->getFrontLinks() as $link => $data)
                    <a class="font-medium sm:px-2 mr-3 {{ is_subroute($link) ? 'text-indigo-500 hover:text-indigo-400 dark:text-indigo-400 dark:hover:text-indigo-500' : 'text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}" href="{{ $link }}">
                        <i class="{{ $data['icon'] }} mr-1"></i> {{ $data['name'] }}
                    </a>
                @endforeach
            </div>
        </div>

        @yield('content')
    </main>
    @include('layouts.footer')
</div>
@yield('scripts')
{!! app('seo')->foot('client') !!}

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
</script>

{{-- Style pour cacher la scrollbar disgracieuse --}}
<style>
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    
    /* Style actif pour les onglets */
    nav[aria-label="Jump links"] a.active {
        color: var(--primary-light) !important;
        background: rgba(99, 102, 241, 0.15) !important;
        border: 1px solid rgba(99, 102, 241, 0.2) !important;
    }
</style>
</body>
</html>