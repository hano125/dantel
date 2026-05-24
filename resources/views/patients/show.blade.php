@extends('layouts.app')

@section('title', 'الملف الطبي للمريض | Dentera')

@push('styles')
    @vite('resources/css/patient.css')
@endpush

@section('content')

{{-- ── Patient Header Card ── --}}
<section class="patient-header-card p-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-5 mb-6 select-none">
    <div class="flex items-center gap-5 text-right">
        <div class="relative flex-shrink-0">
            <div class="w-20 h-20 rounded-2xl overflow-hidden patient-avatar-ring">
                <img
                    alt="أحمد محمد"
                    class="w-full h-full object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDjuwMSghnGq4wxkn-fe5-_qUs_KOcDCSEJN6rbiDghgestbYV3-byS0h71h0KM8pLqDXZufaOr10cVgFLaDkEndI_dypFHUJUf3sjhyO2eegtp4Ij6PGdvv9aYIYjX0wtCLWjeBg_ji7mwKAP5kTLQjeirYRZKSbMzEGKvjVjoGZQucwX_JDqTDpcr9dt-c3Fp8Z-DnSwJUPTQJC0xe5MK4kQQd6llxD1zYE6YtalXdqE1SBMoQcsLnJCUVhG7j3D46Y5SM66OMog"
                />
            </div>
            <span class="absolute -bottom-1.5 -left-1.5 w-6 h-6 bg-secondary rounded-full border-2 border-white flex items-center justify-center">
                <span class="material-symbols-outlined text-white text-[12px]" style="font-variation-settings: 'FILL' 1;">check</span>
            </span>
        </div>
        <div>
            <h1 class="text-xl font-bold text-on-surface mb-1">أحمد محمد عبد الله</h1>
            <div class="flex items-center gap-3 flex-wrap">
                <span class="text-[12px] font-bold bg-surface-container text-on-surface-variant px-3 py-1 rounded-lg border border-outline-variant">ID: #DT-8921-2024</span>
                <span class="text-[13px] text-on-surface-variant">34 سنة</span>
                <span class="badge badge-pending text-[11px]">مريض نشط</span>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap gap-3 justify-start md:justify-end">
        <span class="allergy-badge">
            <span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">warning</span>
            سكري
        </span>
        <span class="allergy-badge">
            <span class="material-symbols-outlined text-[15px]" style="font-variation-settings: 'FILL' 1;">medical_services</span>
            حساسية البنسلين
        </span>
        <a href="{{ route('appointments') }}" class="btn-primary">
            <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">add</span>
            <span>موعد جديد</span>
        </a>
    </div>
</section>

{{-- ── Navigation Tabs ── --}}
<nav class="flex border-b border-outline-variant mb-6 overflow-x-auto hide-scrollbar select-none">
    <button class="patient-tab-btn active" data-tab="overview">نظرة عامة</button>
    <button class="patient-tab-btn" data-tab="history">التاريخ الطبي</button>
    <button class="patient-tab-btn" data-tab="chart">مخطط الأسنان</button>
    <button class="patient-tab-btn" data-tab="billing">الفواتير</button>
</nav>

{{-- ── Content Grid ── --}}
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

    {{-- Main Content (8 cols) --}}
    <div class="lg:col-span-8 space-y-6">

        {{-- Tab: Overview --}}
        <div id="overview-panel" class="patient-tab-panel space-y-6">

            {{-- Dental Chart --}}
            <div class="premium-card overflow-hidden">
                <div class="p-4 border-b border-outline-variant flex justify-between items-center bg-surface-container-low/50">
                    <div class="flex items-center gap-2">
                        <button class="header-icon-btn text-on-surface-variant"><span class="material-symbols-outlined">zoom_in</span></button>
                        <button class="header-icon-btn text-on-surface-variant"><span class="material-symbols-outlined">print</span></button>
                    </div>
                    <h2 class="text-[15px] font-bold text-on-surface flex items-center gap-2">
                        <span class="font-bold">مخطط الأسنان التفاعلي</span>
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">dentistry</span>
                    </h2>
                </div>

                <div class="p-6 bg-gradient-to-b from-white to-surface-container-low/20">
                    <div class="w-full max-w-3xl mx-auto">
                        {{-- Upper Teeth (1–16) --}}
                        <p class="text-center text-[11px] font-bold text-on-surface-variant uppercase tracking-wider mb-3 select-none">الفك العلوي</p>
                        <div class="tooth-grid mb-6">
                            @for($i = 1; $i <= 16; $i++)
                                @php
                                    $isProblem = ($i === 3 || $i === 12);
                                    $extraClass = $isProblem ? 'bg-error text-white border-error shadow-md shadow-error/20' : '';
                                    $icon = $isProblem ? 'warning' : 'check_circle';
                                    $state = $isProblem ? 'needs-treatment' : 'healthy';
                                @endphp
                                <div class="flex flex-col items-center gap-1">
                                    <span class="text-[9px] text-on-surface-variant select-none font-semibold">{{ $i }}</span>
                                    <div
                                        data-tooth-id="{{ $i }}"
                                        data-state="{{ $state }}"
                                        class="tooth-item {{ $extraClass }}"
                                    >
                                        <span class="material-symbols-outlined text-[10px]">{{ $icon }}</span>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        {{-- Lower Teeth (17–32) --}}
                        <div class="tooth-grid mb-3">
                            @for($i = 17; $i <= 32; $i++)
                                @php
                                    $isProgress = ($i === 24);
                                    $extraClass = $isProgress ? 'bg-primary text-white border-primary shadow-md shadow-primary/20' : '';
                                    $icon = $isProgress ? 'pending' : 'check_circle';
                                    $state = $isProgress ? 'in-progress' : 'healthy';
                                @endphp
                                <div class="flex flex-col items-center gap-1">
                                    <div
                                        data-tooth-id="{{ $i }}"
                                        data-state="{{ $state }}"
                                        class="tooth-item {{ $extraClass }}"
                                    >
                                        <span class="material-symbols-outlined text-[10px]">{{ $icon }}</span>
                                    </div>
                                    <span class="text-[9px] text-on-surface-variant select-none font-semibold">{{ $i }}</span>
                                </div>
                            @endfor
                        </div>
                        <p class="text-center text-[11px] font-bold text-on-surface-variant uppercase tracking-wider mt-2 select-none">الفك السفلي</p>
                    </div>

                    {{-- Console --}}
                    <div class="mt-4 p-3 border border-outline-variant rounded-xl bg-surface-container-low/40 flex justify-between items-center text-right select-none">
                        <span id="selected-tooth-number" class="font-bold text-primary text-[13px]">حدد سنّاً</span>
                        <span id="selected-tooth-details" class="text-[12px] text-on-surface-variant">انقر فوق أي سن لعرض التفاصيل...</span>
                    </div>

                    {{-- Legend --}}
                    <div class="flex flex-wrap gap-4 mt-4 justify-center select-none">
                        <div class="flex items-center gap-1.5 text-[11px]">
                            <div class="w-3.5 h-3.5 bg-error rounded border border-error"></div>
                            <span class="font-semibold text-on-surface">يحتاج علاج</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-[11px]">
                            <div class="w-3.5 h-3.5 bg-primary rounded border border-primary"></div>
                            <span class="font-semibold text-on-surface">قيد العلاج</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-[11px]">
                            <div class="w-3.5 h-3.5 bg-surface-container-low rounded border border-outline-variant"></div>
                            <span class="text-on-surface-variant">سليم</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Medical Timeline --}}
            <div class="premium-card overflow-hidden">
                <div class="p-4 border-b border-outline-variant bg-surface-container-low/50">
                    <h2 class="text-[15px] font-bold text-on-surface text-right">السجل الزمني للمراجعات</h2>
                </div>
                <div class="p-6 relative text-right">
                    <div class="timeline-line"></div>
                    <div class="space-y-5">
                        <div class="timeline-bullet">
                            <div class="bg-white border border-outline-variant p-4 rounded-xl shadow-sm">
                                <div class="flex justify-between items-start mb-2 flex-row-reverse">
                                    <h3 class="text-[14px] font-bold text-on-surface">تنظيف جيري وتلميع شامل</h3>
                                    <span class="text-[11px] text-on-surface-variant bg-surface-container px-2.5 py-1 rounded-lg">12 مارس 2024</span>
                                </div>
                                <p class="text-[13px] text-on-surface-variant leading-relaxed mb-3">تم عمل إزالة كاملة للرواسب الجيرية وتلميع الأسنان بالفلورايد. حالة اللثة ممتازة ومستقرة.</p>
                                <div class="flex items-center gap-2 justify-end">
                                    <span class="text-[11px] font-bold text-on-surface-variant bg-surface-container px-2.5 py-1 rounded-lg">د. سارة الهاشمي</span>
                                    <span class="badge badge-success text-[10px]">مكتملة</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-bullet">
                            <div class="bg-white border border-outline-variant p-4 rounded-xl shadow-sm">
                                <div class="flex justify-between items-start mb-2 flex-row-reverse">
                                    <h3 class="text-[14px] font-bold text-on-surface">حشوة تجميلية - سن رقم 12</h3>
                                    <span class="text-[11px] text-on-surface-variant bg-surface-container px-2.5 py-1 rounded-lg">05 يناير 2024</span>
                                </div>
                                <p class="text-[13px] text-on-surface-variant leading-relaxed mb-3">معالجة نخر تسوس وإعادة بناء السن التجميلي بمادة الكومبوزيت عالية الصلابة.</p>
                                <div class="flex items-center gap-2 justify-end">
                                    <span class="text-[11px] font-bold text-on-surface-variant bg-surface-container px-2.5 py-1 rounded-lg">د. خالد العمر</span>
                                    <span class="badge badge-success text-[10px]">مكتملة</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-bullet">
                            <div class="bg-primary/5 border border-primary/15 p-4 rounded-xl shadow-sm">
                                <div class="flex justify-between items-start mb-2 flex-row-reverse">
                                    <h3 class="text-[14px] font-bold text-primary">حشو عصب - سن رقم 24</h3>
                                    <span class="text-[11px] text-primary/70 bg-primary/8 px-2.5 py-1 rounded-lg">جارٍ حالياً</span>
                                </div>
                                <p class="text-[13px] text-on-surface-variant leading-relaxed mb-3">جلسة علاج جذور ثلاثية المراحل — اكتملت المرحلة الأولى.</p>
                                <div class="flex items-center gap-2 justify-end">
                                    <span class="text-[11px] font-bold text-primary bg-primary/8 px-2.5 py-1 rounded-lg">د. أحمد سمير</span>
                                    <span class="badge badge-pending text-[10px]">قيد العلاج</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tab: History --}}
        <div id="history-panel" class="patient-tab-panel hidden space-y-6">
            <div class="premium-card overflow-hidden">
                <div class="p-5 border-b border-outline-variant">
                    <h2 class="text-[15px] font-bold text-right">التاريخ الطبي الكامل</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>التشخيص</th>
                                <th>الخطة العلاجية</th>
                                <th>الطبيب</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-outline-variant">
                                <td class="font-semibold">التهاب عصب سن 24</td>
                                <td>حشو عصب ثلاثي الجلسات</td>
                                <td>د. أحمد سمير</td>
                                <td class="text-on-surface-variant">مستمر حالياً</td>
                            </tr>
                            <tr class="border-b border-outline-variant">
                                <td class="font-semibold">تسوس سن 12</td>
                                <td>حشوة ضوئية تجميلية</td>
                                <td>د. خالد العمر</td>
                                <td class="text-on-surface-variant">05 يناير 2024</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">جيري وترسبات</td>
                                <td>تنظيف وتلميع شامل</td>
                                <td>د. سارة الهاشمي</td>
                                <td class="text-on-surface-variant">12 مارس 2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Tab: Chart --}}
        <div id="chart-panel" class="patient-tab-panel hidden space-y-6">
            <div class="premium-card p-6 text-right">
                <h2 class="text-[15px] font-bold mb-4">الأسنان المحددة والحالات</h2>
                <div class="space-y-3">
                    <div class="p-4 bg-error-container/15 rounded-xl border border-error/15 flex justify-between items-center flex-row-reverse">
                        <span class="font-bold text-[13px] text-error">السن 3: تسوس عميق — علاج عاجل</span>
                        <span class="badge badge-error">العلوي الأيمن</span>
                    </div>
                    <div class="p-4 bg-primary/6 rounded-xl border border-primary/15 flex justify-between items-center flex-row-reverse">
                        <span class="font-bold text-[13px] text-primary">السن 24: حشوة جذر مؤقتة — قيد المراجعة</span>
                        <span class="badge badge-pending">السفلي الأيسر</span>
                    </div>
                    <div class="p-4 bg-error-container/15 rounded-xl border border-error/15 flex justify-between items-center flex-row-reverse">
                        <span class="font-bold text-[13px] text-error">السن 12: تسوس تم علاجه سابقاً</span>
                        <span class="badge badge-neutral">العلوي الأيسر</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tab: Billing --}}
        <div id="billing-panel" class="patient-tab-panel hidden space-y-6">
            <div class="premium-card overflow-hidden">
                <div class="p-5 border-b border-outline-variant">
                    <h2 class="text-[15px] font-bold text-right">فواتير المريض</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>رقم الفاتورة</th>
                                <th>الخدمات</th>
                                <th>المبلغ</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-outline-variant">
                                <td class="font-bold text-primary">#INV-2024-001</td>
                                <td>تاج زيركون + كشف</td>
                                <td class="font-bold">2,450 ر.س</td>
                                <td><span class="badge badge-success">مدفوع</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Right Sidebar (4 cols) --}}
    <div class="lg:col-span-4 space-y-5 select-none">

        {{-- Next Appointment --}}
        <div class="next-appt-card p-6">
            <div class="relative z-10 text-right">
                <p class="text-primary-fixed-dim text-[12px] font-semibold uppercase tracking-wider mb-2">الجلسة القادمة</p>
                <h3 class="text-xl font-bold text-white mb-1">غداً، 10:30 صباحاً</h3>
                <p class="text-primary-fixed-dim text-[13px] mb-5">زراعة سن (مرحلة أولى)</p>
                <p class="text-primary-fixed-dim text-[12px] mb-5 opacity-80">مع د. خالد العمر — غرفة رقم 3</p>
                <button class="bg-white/15 hover:bg-white/25 text-white border border-white/20 px-5 py-2.5 rounded-xl font-semibold text-[13px] backdrop-blur-sm transition-all active:scale-95">
                    تأكيد الحضور
                </button>
            </div>
        </div>

        {{-- Current Medications --}}
        <div class="premium-card overflow-hidden">
            <div class="p-4 border-b border-outline-variant bg-surface-container-low/50 flex justify-between items-center">
                <button class="header-icon-btn text-primary"><span class="material-symbols-outlined text-[18px]">edit</span></button>
                <h2 class="text-[14px] font-bold text-on-surface">الأدوية الحالية</h2>
            </div>
            <div class="p-4 space-y-3">
                <div class="medication-item p-3 flex gap-3 items-start flex-row-reverse">
                    <span class="material-symbols-outlined text-primary mt-0.5" style="font-variation-settings: 'FILL' 1;">pill</span>
                    <div class="text-right">
                        <p class="text-[13px] font-bold text-on-surface">ميتفورمين (500mg)</p>
                        <p class="text-[12px] text-on-surface-variant">حبتين يومياً — صباحاً ومساءً</p>
                    </div>
                </div>
                <div class="medication-item p-3 flex gap-3 items-start flex-row-reverse">
                    <span class="material-symbols-outlined text-primary mt-0.5" style="font-variation-settings: 'FILL' 1;">pill</span>
                    <div class="text-right">
                        <p class="text-[13px] font-bold text-on-surface">أسبرين (81mg)</p>
                        <p class="text-[12px] text-on-surface-variant">حبة واحدة يومياً بعد الغداء</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contact Info --}}
        <div class="premium-card overflow-hidden">
            <div class="p-4 border-b border-outline-variant bg-surface-container-low/50">
                <h2 class="text-[14px] font-bold text-on-surface text-right">جهة الاتصال الطارئة</h2>
            </div>
            <div class="p-5 space-y-3 text-right">
                <div class="flex justify-between items-center flex-row-reverse">
                    <span class="text-[12px] text-on-surface-variant font-medium">الاسم</span>
                    <span class="text-[13px] font-bold">ليلى محمد (الزوجة)</span>
                </div>
                <div class="flex justify-between items-center flex-row-reverse">
                    <span class="text-[12px] text-on-surface-variant font-medium">الجوال</span>
                    <span class="text-[13px] font-bold" dir="ltr">+966 50 123 4567</span>
                </div>
                <button class="w-full mt-2 py-2.5 bg-primary/6 border border-primary/20 text-primary rounded-xl font-bold text-[13px] hover:bg-primary hover:text-white hover:border-primary transition-all active:scale-[0.98] flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">call</span>
                    <span>اتصال مباشر</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    @vite('resources/js/patient-profile.js')
@endpush
