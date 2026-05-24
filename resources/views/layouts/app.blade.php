<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="description" content="Dentera - نظام إدارة عيادات الأسنان الطبي المتكامل"/>
    <title>@yield('title', 'Dentera - لوحة التحكم')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <!-- Base Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Reusable Styles & Scripts from Partials -->
    @vite(['resources/css/sidebar.css', 'resources/js/sidebar.js'])
    @vite(['resources/css/header.css'])
    @vite(['resources/css/footer.css'])

    <!-- Custom Page-level Styles -->
    @stack('styles')
</head>
<body class="bg-background text-on-surface antialiased">

    <!-- Top Navigation Bar -->
    @include('partials.header')

    <!-- Side Navigation Bar (RTL right-fixed) -->
    @include('partials.sidebar')

    <!-- Main Content Wrapper -->
    <main class="lg:mr-[272px] pt-20 px-7 pb-8 transition-all duration-300 min-h-screen" id="main-content">
        <div class="max-w-[1440px] mx-auto py-6">
            @include('partials.breadcrumb')
            <div class="animate-fade-in-up stagger-children">
                @yield('content')
            </div>
        </div>

        <!-- Reusable Footer -->
        @include('partials.footer')
    </main>

    <!-- Mobile Navigation (Bottom Bar) -->
    <nav class="fixed bottom-0 left-0 right-0 h-16 bg-surface/90 backdrop-blur-lg border-t border-outline-variant flex lg:hidden justify-around items-center px-4 z-50 shadow-xl">
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center gap-0.5 transition-colors {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-on-surface-variant' }}">
            <span class="material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' {{ request()->routeIs('dashboard') ? '1' : '0' }};">dashboard</span>
            <span class="text-[10px] font-semibold">الرئيسية</span>
        </a>
        <a href="{{ route('patients.show', 1) }}" class="flex flex-col items-center gap-0.5 transition-colors {{ request()->routeIs('patients.*') ? 'text-primary' : 'text-on-surface-variant' }}">
            <span class="material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' {{ request()->routeIs('patients.*') ? '1' : '0' }};">person</span>
            <span class="text-[10px] font-semibold">المرضى</span>
        </a>
        <div class="relative -top-5">
            <a href="{{ route('appointments') }}" class="bg-primary text-on-primary w-14 h-14 rounded-2xl shadow-lg shadow-primary/40 flex items-center justify-center hover:scale-105 transition-all active:scale-95">
                <span class="material-symbols-outlined text-[26px]" style="font-variation-settings: 'FILL' 1;">add</span>
            </a>
        </div>
        <a href="{{ route('appointments') }}" class="flex flex-col items-center gap-0.5 transition-colors {{ request()->routeIs('appointments') ? 'text-primary' : 'text-on-surface-variant' }}">
            <span class="material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' {{ request()->routeIs('appointments') ? '1' : '0' }};">calendar_month</span>
            <span class="text-[10px] font-semibold">المواعيد</span>
        </a>
        <a href="{{ route('billing') }}" class="flex flex-col items-center gap-0.5 transition-colors {{ request()->routeIs('billing') ? 'text-primary' : 'text-on-surface-variant' }}">
            <span class="material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' {{ request()->routeIs('billing') ? '1' : '0' }};">payments</span>
            <span class="text-[10px] font-semibold">الفواتير</span>
        </a>
    </nav>

    <!-- Custom Page-level Scripts -->
    @stack('scripts')
</body>
</html>
