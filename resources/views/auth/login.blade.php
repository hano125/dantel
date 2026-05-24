@extends('layouts.auth')

@section('title', 'تسجيل الدخول | Dentera Dental ERP')

@push('styles')
    @vite('resources/css/login.css')
@endpush

@section('content')
<main class="flex h-screen w-full select-none overflow-hidden">

    {{-- ── Left: Hero Branding ── --}}
    <section class="hidden lg:flex lg:w-[55%] relative items-center justify-center overflow-hidden">
        {{-- Background image --}}
        <img
            class="absolute inset-0 w-full h-full object-cover"
            alt="Dentera Clinic"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_PTjg1cSxfHMqpYmBXhCpdHS9P-YrwkAsRuonqgN9CX7YrRBAbM77C4J2A1Td86wlQ7Gz8vguc7GmWjs82kWfqWG5dbEp1LZI681kPB5yYcOfVg-tEgzOc5C1yqR2ugQWD13ldEAF4KigMmaQqzWSfJ7Ly6yDWdHAt8ZdI_sqmg0wEkXYSLO--Ts0U8LTM9KHQZ0_LbwfMfbX0AiaKmeafaXG3-iY25wXqjAtgwb0FP8-rEP_z1uwbk6AHLk2-ibpTnLgcpmo4P8"
        />
        {{-- Gradient overlay --}}
        <div class="absolute inset-0 login-hero-overlay"></div>

        {{-- Decorative floating circles --}}
        <div class="login-hero-shape w-96 h-96 -top-32 -right-32 bg-white/5"></div>
        <div class="login-hero-shape w-64 h-64 bottom-0 left-0 bg-white/5" style="animation-delay:1.5s;"></div>
        <div class="login-hero-shape w-32 h-32 top-1/2 right-1/3 bg-white/8" style="animation-delay:3s;"></div>

        {{-- Content --}}
        <div class="relative z-10 p-14 text-right max-w-xl w-full">
            {{-- Logo --}}
            <div class="flex items-center gap-3 justify-end mb-10">
                <div>
                    <h1 class="text-3xl font-bold text-white">دينتيرا</h1>
                    <p class="text-primary-fixed-dim text-sm font-medium">نظام إدارة عيادات الأسنان</p>
                </div>
                <div class="w-14 h-14 bg-white/15 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/20">
                    <span class="material-symbols-outlined text-white text-[32px]" style="font-variation-settings: 'FILL' 1;">dentistry</span>
                </div>
            </div>

            {{-- Headline --}}
            <h2 class="text-4xl font-bold text-white leading-tight mb-5">
                التميز الإكلينيكي<br/>في إدارة عيادتك
            </h2>
            <p class="text-primary-fixed-dim text-base leading-relaxed mb-12 max-w-sm mr-auto">
                نظام متكامل يجمع بين الدقة الطبية وسهولة الاستخدام لتقديم أفضل رعاية لمرضاك.
            </p>

            {{-- Stats --}}
            <div class="grid grid-cols-2 gap-4">
                <div class="login-stat-item text-right">
                    <p class="text-2xl font-bold text-white mb-1">+1,200</p>
                    <p class="text-primary-fixed-dim text-sm">عيادة تستخدم دينتيرا</p>
                </div>
                <div class="login-stat-item text-right">
                    <p class="text-2xl font-bold text-white mb-1">100%</p>
                    <p class="text-primary-fixed-dim text-sm">أمان وتشفير كامل</p>
                </div>
                <div class="login-stat-item text-right">
                    <p class="text-2xl font-bold text-white mb-1">24/7</p>
                    <p class="text-primary-fixed-dim text-sm">دعم فني متخصص</p>
                </div>
                <div class="login-stat-item text-right">
                    <p class="text-2xl font-bold text-white mb-1">99.9%</p>
                    <p class="text-primary-fixed-dim text-sm">وقت تشغيل مضمون</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Right: Login Form ── --}}
    <section class="w-full lg:w-[45%] login-form-panel flex flex-col justify-center items-center p-8 md:p-12 overflow-y-auto">
        <div class="w-full max-w-sm">

            {{-- Mobile Logo --}}
            <div class="lg:hidden flex justify-center mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary to-primary-light rounded-2xl flex items-center justify-center shadow-lg shadow-primary/30">
                        <span class="material-symbols-outlined text-white text-[26px]" style="font-variation-settings: 'FILL' 1;">dentistry</span>
                    </div>
                    <span class="text-2xl font-bold text-primary">دينتيرا</span>
                </div>
            </div>

            {{-- Form Header --}}
            <div class="text-right mb-8">
                <h2 class="text-2xl font-bold text-on-surface mb-2">مرحباً بك مجدداً 👋</h2>
                <p class="text-[14px] text-on-surface-variant">أدخل بياناتك للوصول إلى لوحة التحكم</p>
            </div>

            {{-- Login Form --}}
            <form action="{{ route('dashboard') }}" method="GET" class="space-y-5">

                {{-- Email --}}
                <div class="text-right">
                    <label class="block text-[13px] font-semibold text-on-surface-variant mb-1.5" for="email">البريد الإلكتروني</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-outline text-[18px] pointer-events-none">alternate_email</span>
                        <input
                            class="login-input"
                            id="email"
                            placeholder="example@dentera.com"
                            type="email"
                            required
                            value="admin@dentera.com"
                        />
                    </div>
                </div>

                {{-- Password --}}
                <div class="text-right">
                    <div class="flex justify-between items-center mb-1.5">
                        <a class="text-[12px] text-primary hover:underline font-semibold" href="#">نسيت كلمة المرور؟</a>
                        <label class="text-[13px] font-semibold text-on-surface-variant" for="password">كلمة المرور</label>
                    </div>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-outline text-[18px] pointer-events-none">lock</span>
                        <input
                            class="login-input"
                            id="password"
                            placeholder="••••••••"
                            type="password"
                            required
                            value="password"
                        />
                        <button
                            class="absolute left-4 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface-variant transition-colors focus:outline-none"
                            onclick="togglePassword()"
                            type="button"
                        >
                            <span class="material-symbols-outlined text-[18px]" id="visibility-icon">visibility</span>
                        </button>
                    </div>
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center gap-2.5 justify-end">
                    <label class="text-[13px] text-on-surface-variant cursor-pointer" for="remember">البقاء متصلاً</label>
                    <div class="relative">
                        <input class="sr-only peer" id="remember" type="checkbox"/>
                        <div class="w-9 h-5 bg-outline-variant rounded-full peer-checked:bg-primary transition-colors cursor-pointer" onclick="document.getElementById('remember').click()"></div>
                        <div class="absolute top-0.5 right-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform peer-checked:translate-x-[-16px]"></div>
                    </div>
                </div>

                {{-- Submit CTA --}}
                <button class="login-btn-primary mt-2" type="submit" id="login-submit-btn">
                    <span>تسجيل الدخول</span>
                    <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">login</span>
                </button>
            </form>

            {{-- Separator --}}
            <div class="relative my-7">
                <div class="absolute inset-0 flex items-center">
                    <span class="w-full border-t border-outline-variant"></span>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-surface px-4 text-[12px] text-on-surface-variant font-medium">أو</span>
                </div>
            </div>

            {{-- Secondary Actions --}}
            <button class="btn-secondary w-full justify-center">
                <span class="material-symbols-outlined text-[18px]">add_business</span>
                <span>تسجيل عيادة جديدة</span>
            </button>

            <p class="text-center text-[13px] text-on-surface-variant mt-6">
                تواجه مشكلة؟
                <a class="text-primary font-bold hover:underline" href="#">تواصل مع الدعم</a>
            </p>
        </div>
    </section>
</main>
@endsection

@push('scripts')
    @vite('resources/js/login.js')
@endpush
