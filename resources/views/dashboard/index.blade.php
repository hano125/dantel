@extends('layouts.app')

@section('title', 'Dentera - لوحة التحكم الطبية')

@push('styles')
    @vite('resources/css/dashboard.css')
@endpush

@section('content')

{{-- ─── Page Header ─── --}}
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 select-none">
    <div class="text-right">
        <h1 class="text-2xl font-bold text-on-surface tracking-tight">مرحباً، د. أحمد 👋</h1>
        <p class="text-sm text-on-surface-variant mt-1">نظرة شاملة على أداء العيادة — {{ date('d F Y') }}</p>
    </div>
    <a href="{{ route('appointments') }}"
       class="btn-primary shrink-0">
        <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">add_circle</span>
        <span>موعد جديد</span>
    </a>
</div>

{{-- ─── KPI Cards ─── --}}
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5 mb-8 stagger-children">

    {{-- Total Patients --}}
    <div class="kpi-card bento-card p-5 col-span-1">
        <div class="flex justify-between items-start mb-3">
            <span class="icon-badge icon-badge-primary material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">group</span>
            <span class="badge badge-success text-[10px]">
                <span class="material-symbols-outlined text-[12px]">trending_up</span>+12%
            </span>
        </div>
        <p class="text-[13px] text-on-surface-variant font-medium mb-1">إجمالي المرضى</p>
        <p class="text-2xl font-bold text-on-surface tracking-tight">1,284</p>
        <p class="text-[11px] text-on-surface-variant mt-1.5">مقارنة بالشهر الماضي</p>
    </div>

    {{-- Today's Appointments --}}
    <div class="kpi-card bento-card p-5 col-span-1">
        <div class="flex justify-between items-start mb-3">
            <span class="icon-badge icon-badge-primary material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">event_available</span>
            <span class="text-[11px] font-bold text-on-surface-variant bg-surface-container px-2 py-0.5 rounded-full">اليوم</span>
        </div>
        <p class="text-[13px] text-on-surface-variant font-medium mb-1">مواعيد اليوم</p>
        <p class="text-2xl font-bold text-on-surface tracking-tight">24</p>
        <div class="flex gap-2 mt-1.5">
            <span class="text-[10px] font-bold text-secondary bg-secondary/8 px-1.5 py-0.5 rounded">✓ 8 مكتملة</span>
            <span class="text-[10px] font-bold text-primary bg-primary/8 px-1.5 py-0.5 rounded">◷ 16 قادمة</span>
        </div>
    </div>

    {{-- Revenue --}}
    <div class="kpi-card bento-card p-5 col-span-1">
        <div class="flex justify-between items-start mb-3">
            <span class="icon-badge icon-badge-secondary material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">payments</span>
            <span class="badge badge-success text-[10px]">
                <span class="material-symbols-outlined text-[12px]">arrow_upward</span>+8%
            </span>
        </div>
        <p class="text-[13px] text-on-surface-variant font-medium mb-1">إيرادات الأسبوع</p>
        <p class="text-2xl font-bold text-on-surface tracking-tight">14.2k</p>
        <p class="text-[11px] text-on-surface-variant mt-1.5">ريال سعودي</p>
    </div>

    {{-- Pending Payments --}}
    <div class="kpi-card bento-card p-5 col-span-1">
        <div class="flex justify-between items-start mb-3">
            <span class="icon-badge icon-badge-error material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">pending_actions</span>
            <span class="badge badge-error text-[10px]">5 فواتير</span>
        </div>
        <p class="text-[13px] text-on-surface-variant font-medium mb-1">مدفوعات معلقة</p>
        <p class="text-2xl font-bold text-on-surface tracking-tight">3.8k</p>
        <p class="text-[11px] text-on-surface-variant mt-1.5">يجب المتابعة</p>
    </div>

    {{-- Active Treatments --}}
    <div class="kpi-card bento-card p-5 col-span-1">
        <div class="flex justify-between items-start mb-3">
            <span class="icon-badge icon-badge-primary material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">dentistry</span>
        </div>
        <p class="text-[13px] text-on-surface-variant font-medium mb-1">علاجات نشطة</p>
        <p class="text-2xl font-bold text-on-surface tracking-tight">45</p>
        <p class="text-[11px] text-on-surface-variant mt-1.5">تقويم وجراحة وجذور</p>
    </div>

    {{-- Doctors Online --}}
    <div class="kpi-card bento-card p-5 col-span-1">
        <div class="flex justify-between items-start mb-3">
            <span class="icon-badge icon-badge-secondary material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">online_prediction</span>
            <span class="badge badge-success text-[10px]">متصل</span>
        </div>
        <p class="text-[13px] text-on-surface-variant font-medium mb-1">الأطباء المتصلون</p>
        <p class="text-2xl font-bold text-on-surface tracking-tight">6 <span class="text-base text-on-surface-variant font-medium">/ 8</span></p>
        <div class="flex -space-x-1.5 space-x-reverse mt-2">
            <img class="w-6 h-6 rounded-full border-2 border-surface-container-lowest object-cover" alt="Dr" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVk-DarJYIDgMt5--5WMXXXHMfKGSCHaoiynWIb_nvGJAnOMn-5YI9FN3FSbyJrtn38MZ5g_lJA4_GtIXgn_VULMrGK-72ya1iFZwxVawtgZoRe2I6ISK3u1uwUNe1KA8PzNpFsY4ugJYBI_MixgoAHUDEPgc5jEZTfQeRjEXhgxPfbO3siKDQQALPVZvbs1DcjQD3iLepIl4dHS05O-jgalmFQ8nA9Rml3gevFtBuJvToEKV2NVMQdL72m6sd4GzU4EWpkbmQPmQ"/>
            <div class="w-6 h-6 rounded-full border-2 border-surface-container-lowest bg-primary text-[9px] text-on-primary flex items-center justify-center font-bold">MA</div>
            <div class="w-6 h-6 rounded-full border-2 border-surface-container-lowest bg-secondary text-[9px] text-on-secondary flex items-center justify-center font-bold">FA</div>
            <div class="w-6 h-6 rounded-full border-2 border-surface-container-lowest bg-outline-variant text-[9px] text-on-surface-variant flex items-center justify-center font-bold">+3</div>
        </div>
    </div>
</div>

{{-- ─── Charts + Calendar Row ─── --}}
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">

    {{-- Revenue Chart (8 cols) --}}
    <div class="lg:col-span-8 premium-card p-6 flex flex-col" style="min-height:360px;">
        <div class="flex justify-between items-center mb-6 select-none">
            <h2 class="text-[15px] font-bold text-on-surface">رسم بياني للإيرادات (SAR)</h2>
            <div class="graph-toggle-group">
                <button class="graph-toggle" data-period="week">أسبوع</button>
                <button class="graph-toggle active" data-period="month">شهر</button>
                <button class="graph-toggle" data-period="year">سنة</button>
            </div>
        </div>

        {{-- Y-axis labels + bars --}}
        <div class="flex gap-3 flex-1 items-end pb-2 min-h-[220px]">
            <div class="flex flex-col justify-between h-full text-[10px] text-on-surface-variant text-left pr-2 select-none" style="min-width:38px;">
                <span>20k</span>
                <span>15k</span>
                <span>10k</span>
                <span>5k</span>
                <span>0</span>
            </div>
            <div class="flex-1 flex items-end gap-2.5 border-b-2 border-outline-variant relative">
                @php
                    $months = ['سبتمبر','أكتوبر','نوفمبر','ديسمبر','يناير','فبراير','مارس'];
                    $values = [40, 65, 50, 85, 70, 95, 80];
                    $labels = ['8k','13k','10k','17k','14k','19k','16k'];
                @endphp
                @foreach($values as $i => $h)
                <div class="flex-1 flex flex-col items-center gap-1">
                    <div
                        class="chart-bar w-full rounded-t-lg cursor-pointer group"
                        data-height="{{ $h }}%"
                        data-value="{{ $labels[$i] }}"
                        style="height: {{ $h }}%; background: linear-gradient(180deg, rgba(26,86,219,{{ 0.4 + $h/200 }}) 0%, rgba(26,86,219,{{ 0.2 + $h/300 }}) 100%);"
                    ></div>
                    <span class="text-[10px] text-on-surface-variant select-none whitespace-nowrap">{{ $months[$i] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Today's Appointments List (4 cols) --}}
    <div class="lg:col-span-4 premium-card p-6 flex flex-col gap-4">
        <div class="flex justify-between items-center select-none">
            <a href="{{ route('appointments') }}" class="text-[13px] text-primary font-bold hover:underline">عرض الكل</a>
            <h2 class="text-[15px] font-bold text-on-surface">مواعيد اليوم</h2>
        </div>

        <div class="space-y-3">
            @php
                $appointments = [
                    ['time' => '09:00', 'period' => 'ص', 'name' => 'أحمد محمد عبد الله', 'service' => 'تنظيف وتلميع', 'status' => 'done', 'color' => 'secondary'],
                    ['time' => '10:30', 'period' => 'ص', 'name' => 'سارة علي الناصر', 'service' => 'علاج عصب (جلسة 2)', 'status' => 'active', 'color' => 'primary'],
                    ['time' => '12:00', 'period' => 'ظ', 'name' => 'فهد ناصر السديري', 'service' => 'تقويم - متابعة', 'status' => 'upcoming', 'color' => 'primary'],
                    ['time' => '01:00', 'period' => 'م', 'name' => 'ياسر حسين القحطاني', 'service' => 'حشوة طارئة', 'status' => 'late', 'color' => 'error'],
                ];
            @endphp
            @foreach($appointments as $appt)
            <div class="appt-slot flex items-center gap-3 p-3 bg-background rounded-xl border-r-[3px] border-{{ $appt['color'] }} select-none">
                <div class="text-center min-w-[48px]">
                    <p class="text-lg font-bold text-{{ $appt['color'] }} leading-none">{{ $appt['time'] }}</p>
                    <p class="text-[10px] text-on-surface-variant mt-0.5">{{ $appt['period'] }}</p>
                </div>
                <div class="flex-1 text-right min-w-0">
                    <p class="text-[13px] font-semibold truncate">{{ $appt['name'] }}</p>
                    <p class="text-[11px] text-on-surface-variant truncate">{{ $appt['service'] }}</p>
                </div>
                @if($appt['status'] === 'done')
                    <span class="material-symbols-outlined text-secondary text-[20px] flex-shrink-0" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                @elseif($appt['status'] === 'active')
                    <span class="material-symbols-outlined text-primary text-[20px] flex-shrink-0 animate-pulse" style="font-variation-settings: 'FILL' 1;">pending</span>
                @elseif($appt['status'] === 'late')
                    <span class="badge badge-error text-[10px] flex-shrink-0">متأخر</span>
                @else
                    <span class="material-symbols-outlined text-on-surface-variant text-[20px] flex-shrink-0">schedule</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ─── Recent Patients + Inventory ─── --}}
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

    {{-- Recent Patients Table (8 cols) --}}
    <div class="lg:col-span-8 premium-card overflow-hidden">
        <div class="p-5 flex justify-between items-center border-b border-outline-variant select-none">
            <h2 class="text-[15px] font-bold text-on-surface">المرضى الأخيرون في العيادة</h2>
            <button class="flex items-center gap-1.5 text-on-surface-variant hover:text-primary transition-colors text-[13px] font-medium">
                <span class="material-symbols-outlined text-[18px]">filter_list</span>
                <span>تصفية</span>
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>المريض</th>
                        <th>آخر زيارة</th>
                        <th>الحالة</th>
                        <th class="text-left">إجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $patients = [
                            ['initials' => 'لخ', 'name' => 'ليلى خالد العمر', 'date' => '22 أكتوبر 2023', 'status' => 'منتهية', 'type' => 'neutral'],
                            ['initials' => 'فع', 'name' => 'فهد عبدالرحمن السعد', 'date' => '23 أكتوبر 2023', 'status' => 'قيد الانتظار', 'type' => 'pending'],
                            ['initials' => 'مي', 'name' => 'منى إبراهيم العلي', 'date' => 'منذ ساعة', 'status' => 'في الكرسي', 'type' => 'success'],
                            ['initials' => 'خر', 'name' => 'خالد رشيد الحربي', 'date' => 'أمس', 'status' => 'مكتملة', 'type' => 'success'],
                        ];
                    @endphp
                    @foreach($patients as $p)
                    <tr class="patient-row border-b border-outline-variant last:border-0">
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-primary/8 flex items-center justify-center text-primary font-bold text-[13px] flex-shrink-0">{{ $p['initials'] }}</div>
                                <span class="font-semibold text-[14px]">{{ $p['name'] }}</span>
                            </div>
                        </td>
                        <td class="text-on-surface-variant text-[13px]">{{ $p['date'] }}</td>
                        <td>
                            <span class="badge badge-{{ $p['type'] }}">{{ $p['status'] }}</span>
                        </td>
                        <td class="text-left">
                            <a href="{{ route('patients.show', 1) }}" class="text-primary hover:underline font-semibold text-[13px]">عرض الملف</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Inventory Alerts (4 cols) --}}
    <div class="lg:col-span-4 premium-card p-6 flex flex-col gap-5">
        <div class="flex items-center gap-2 select-none">
            <span class="icon-badge icon-badge-error material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">inventory_2</span>
            <h2 class="text-[15px] font-bold text-on-surface flex-1 text-right">تنبيهات المخزون</h2>
        </div>

        {{-- Critical --}}
        <div class="p-4 rounded-xl bg-error-container/15 border border-error/15 text-right select-none">
            <div class="flex justify-between items-center mb-2">
                <span class="badge badge-error text-[10px]">حرج</span>
                <p class="font-semibold text-[13px] text-on-surface">مخدر موضعي (2%)</p>
            </div>
            <div class="inventory-progress mb-2">
                <div class="inventory-progress-fill danger" style="width: 15%"></div>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-[11px] text-on-surface-variant">الحد الأدنى: 15</span>
                <span class="text-[12px] font-bold text-error">5 متبقي</span>
            </div>
        </div>

        {{-- Warning --}}
        <div class="p-4 rounded-xl bg-surface-container border border-outline-variant text-right select-none">
            <div class="flex justify-between items-center mb-2">
                <span class="badge badge-warning text-[10px]">تحذير</span>
                <p class="font-semibold text-[13px] text-on-surface">قفازات معقمة (L)</p>
            </div>
            <div class="inventory-progress mb-2">
                <div class="inventory-progress-fill" style="width: 40%"></div>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-[11px] text-on-surface-variant">اقترب من الحد الأدنى</span>
                <span class="text-[12px] font-bold text-on-surface">12 علبة</span>
            </div>
        </div>

        <button class="w-full py-3 border-2 border-dashed border-outline-variant rounded-xl text-on-surface-variant text-[13px] font-semibold flex items-center justify-center gap-2 hover:border-primary hover:text-primary hover:bg-primary/3 transition-all">
            <span class="material-symbols-outlined text-[18px]">shopping_cart</span>
            <span>فتح طلبات التوريد</span>
        </button>
    </div>
</div>

@endsection

@push('scripts')
    @vite('resources/js/dashboard.js')
@endpush
