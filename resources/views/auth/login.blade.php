@extends('layouts.auth')

@section('title', 'تسجيل الدخول | Dentera Dental ERP')

@push('styles')
    @vite('resources/css/login.css')
@endpush

@section('content')
<main class="flex h-screen w-full select-none">
    <!-- Left Side: Hero Branding Section -->
    <section class="hidden lg:flex lg:w-1/2 relative bg-primary items-center justify-center overflow-hidden">
        <!-- Background Overlay Image -->
        <img class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-30" alt="Dentera Clinic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_PTjg1cSxfHMqpYmBXhCpdHS9P-YrwkAsRuonqgN9CX7YrRBAbM77C4J2A1Td86wlQ7Gz8vguc7GmWjs82kWfqWG5dbEp1LZI681kPB5yYcOfVg-tEgzOc5C1yqR2ugQWD13ldEAF4KigMmaQqzWSfJ7Ly6yDWdHAt8ZdI_sqmg0wEkXYSLO--Ts0U8LTM9KHQZ0_LbwfMfbX0AiaKmeafaXG3-iY25wXqjAtgwb0FP8-rEP_z1uwbk6AHLk2-ibpTnLgcpmo4P8"/>
        <div class="absolute inset-0 login-hero-overlay opacity-90"></div>
        
        <!-- Branding Content -->
        <div class="relative z-10 p-container-margin text-right max-w-xl">
            <div class="flex items-center gap-stack-md mb-stack-lg justify-end">
                <span class="material-symbols-outlined text-white text-[48px]" style="font-variation-settings: 'FILL' 1;">dentistry</span>
                <h1 class="font-headline-lg text-headline-lg text-white">دينتيرا</h1>
            </div>
            <h2 class="font-display-lg text-display-lg text-white mb-stack-md leading-tight">التميز الإكلينيكي في إدارة عيادتك</h2>
            <p class="font-body-lg text-body-lg text-primary-fixed-dim max-w-md">
                نظام متكامل لإدارة عيادات الأسنان يجمع بين الدقة الطبية وسهولة الاستخدام لتقديم أفضل رعاية ممكنة لمرضاك.
            </p>
            <div class="mt-12 grid grid-cols-2 gap-stack-lg">
                <div class="flex flex-col gap-1 border-r-2 border-primary-fixed-dim/30 pr-4">
                    <span class="text-white font-bold text-xl">100%</span>
                    <span class="text-primary-fixed-dim text-sm">أمان تام وبيانات مشفرة</span>
                </div>
                <div class="flex flex-col gap-1 border-r-2 border-primary-fixed-dim/30 pr-4">
                    <span class="text-white font-bold text-xl">24/7</span>
                    <span class="text-primary-fixed-dim text-sm">دعم فني متخصص متواصل</span>
                </div>
            </div>
        </div>
        
        <!-- Abstract Decorative Shapes -->
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-primary-container/20 rounded-full blur-3xl"></div>
        <div class="absolute -top-20 -right-20 w-80 h-80 bg-secondary/10 rounded-full blur-3xl"></div>
    </section>

    <!-- Right Side: Login Form Section -->
    <section class="w-full lg:w-1/2 flex flex-col justify-center items-center bg-surface p-6 md:p-12 lg:p-24 overflow-y-auto">
        <div class="w-full max-w-md">
            <!-- Mobile Logo (Visible only on small screens) -->
            <div class="lg:hidden flex justify-center mb-stack-lg">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[32px]" style="font-variation-settings: 'FILL' 1;">dentistry</span>
                    <span class="font-headline-md text-headline-md text-primary">دينتيرا</span>
                </div>
            </div>

            <!-- Form Header -->
            <div class="text-right mb-10">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-2">مرحباً بك مجدداً</h3>
                <p class="font-body-md text-body-md text-on-surface-variant">الرجاء إدخال بيانات الاعتماد للوصول إلى لوحة التحكم</p>
            </div>

            <!-- Login Form (Redirects to dashboard) -->
            <form action="{{ route('dashboard') }}" method="GET" class="space-y-6">
                <!-- Username/Email Field -->
                <div class="space-y-2 text-right">
                    <label class="block font-label-md text-label-md text-on-surface-variant" for="email">اسم المستخدم أو البريد الإلكتروني</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline">person</span>
                        <input class="w-full pr-10 pl-4 py-3 bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-body-md" id="email" placeholder="example@dentera.com" type="text" required value="admin@dentera.com"/>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="space-y-2 text-right">
                    <div class="flex justify-between items-center">
                        <a class="font-label-md text-label-md text-primary hover:underline transition-all" href="#">نسيت كلمة المرور؟</a>
                        <label class="block font-label-md text-label-md text-on-surface-variant" for="password">كلمة المرور</label>
                    </div>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline">lock</span>
                        <input class="w-full pr-10 pl-12 py-3 bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-body-md" id="password" placeholder="••••••••" type="password" required value="password"/>
                        <button class="absolute left-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface-variant transition-colors" onclick="togglePassword()" type="button">
                            <span class="material-symbols-outlined" id="visibility-icon">visibility</span>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-2 justify-end">
                    <label class="font-body-md text-body-md text-on-surface-variant select-none" for="remember">البقاء متصلاً</label>
                    <input class="w-4 h-4 text-primary border-outline-variant rounded focus:ring-primary" id="remember" type="checkbox"/>
                </div>

                <!-- Primary CTA -->
                <button class="relative w-full py-4 bg-primary text-white font-title-md text-title-md rounded-xl hover:bg-primary-container transition-all shadow-lg shadow-primary-container/20 active:scale-[0.98] flex justify-center items-center gap-2 overflow-hidden" type="submit">
                    <span>تسجيل الدخول</span>
                    <span class="material-symbols-outlined">login</span>
                </button>
            </form>

            <!-- Separator -->
            <div class="relative my-10">
                <div class="absolute inset-0 flex items-center">
                    <span class="w-full border-t border-outline-variant"></span>
                </div>
                <div class="relative flex justify-center text-label-md">
                    <span class="bg-surface px-4 text-on-surface-variant">أو</span>
                </div>
            </div>

            <!-- Secondary Actions -->
            <div class="space-y-4">
                <button class="w-full py-3 border border-outline-variant rounded-lg font-title-md text-title-md text-on-surface hover:bg-surface-container-low transition-all flex justify-center items-center gap-2 group">
                    <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">add_circle</span>
                    <span>تسجيل عيادة جديدة</span>
                </button>
                
                <div class="text-center">
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        تواجه مشكلة؟ 
                        <a class="text-primary font-bold hover:underline" href="#">تواصل مع الدعم الفني</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
    @vite('resources/js/login.js')
@endpush
