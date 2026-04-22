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

@extends('layouts/front')
@section('title', setting('theme_home_title_meta', setting('app.name')))
@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div class="stagger-item">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full mb-6" style="background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.2);">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75" style="background: var(--primary);"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2" style="background: var(--primary);"></span>
                    </span>
                    <span class="text-sm font-medium" style="color: var(--primary-light);">LXCHOST - Hébergement Premium</span>
                </div>
                
                <h1 class="block text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight">
                    {{ translated_setting('theme_home_title', setting('theme_home_title', setting('app.name'))) }}
                </h1>
                
                <p class="mt-6 text-lg leading-relaxed">
                    {{ translated_setting('theme_home_subtitle', setting('theme_home_subtitle', 'Hébergeur français de qualité utilisant la nouvelle version Next GEN')) }}
                </p>
                
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#products" class="btn group">
                        <span class="relative z-10">Découvrir nos offres</span>
                        <svg class="inline-block ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="#contact" class="px-8 py-3 rounded-full font-medium transition-all duration-300 hover:-translate-y-1" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.1); color: var(--text-primary);">
                        Nous contacter
                    </a>
                </div>
                
                <div class="mt-10 flex items-center gap-8">
                    <div>
                        <div class="text-3xl font-bold" style="color: var(--primary-light);">99.9%</div>
                        <div class="text-sm" style="color: var(--text-secondary);">Uptime garanti</div>
                    </div>
                    <div style="width: 1px; height: 40px; background: rgba(255, 255, 255, 0.1);"></div>
                    <div>
                        <div class="text-3xl font-bold" style="color: var(--primary-light);">24/7</div>
                        <div class="text-sm" style="color: var(--text-secondary);">Support premium</div>
                    </div>
                </div>
            </div>
            
            {{-- Image plus petite et centrée --}}
            <div class="stagger-item flex justify-center lg:justify-end" style="animation-delay: 0.2s;">
                <div class="relative w-full max-w-md lg:max-w-lg">
                    <div class="absolute inset-0 rounded-3xl blur-3xl opacity-30" style="background: linear-gradient(135deg, var(--primary), var(--primary-light));"></div>
                    <img class="relative rounded-3xl shadow-2xl transition-all duration-500 hover:scale-[1.02] w-full" 
                         src="{{ setting('theme_home_image') }}" alt="LXCHOST">
                </div>
            </div>
        </div>
    </div>
    
    {{-- Sections dynamiques - CORRIGÉ : sans barre de défilement --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="stagger-item" style="animation-delay: 0.3s;">
            {!! render_theme_sections() !!}
        </div>
    </div>
    
    {{-- Section Contact --}}
    <div id="contact" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20 mt-10">
        <div class="stagger-item text-center p-12 lg:p-16 rounded-3xl relative overflow-hidden" 
             style="background: rgba(15, 23, 34, 0.7); backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.08);">
            
            <div class="absolute top-0 right-0 w-64 h-64 rounded-full blur-3xl opacity-20" style="background: var(--primary);"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full blur-3xl opacity-20" style="background: var(--primary-light);"></div>
            
            <div class="relative z-10">
                <h2 class="text-4xl lg:text-5xl font-bold mb-4">Une question ?</h2>
                <p class="text-lg mb-8 max-w-2xl mx-auto" style="color: var(--text-secondary);">
                    Notre équipe d'experts est disponible 24/7 pour vous accompagner dans vos projets.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#" class="btn">
                        <span class="relative z-10">Ouvrir un ticket support</span>
                    </a>
                    <a href="#" class="px-8 py-3 rounded-full font-medium transition-all duration-300 hover:-translate-y-1" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.1); color: var(--text-primary);">
                        Consulter la documentation
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection