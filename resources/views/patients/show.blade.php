@extends('layouts.app')

@section('title', 'الملف الطبي للمريض | Dentera')

@push('styles')
    @vite('resources/css/patient.css')
@endpush

@section('content')
<!-- Patient Header Card Summary -->
<section class="bg-surface-container-lowest border border-outline-variant p-stack-lg rounded-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-stack-lg mb-gutter select-none">
    <div class="flex items-center gap-stack-lg text-right">
        <div class="w-20 h-20 bg-primary-fixed rounded-full flex items-center justify-center border-4 border-surface-container-high overflow-hidden shadow-sm">
            <img alt="أحمد محمد" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDjuwMSghnGq4wxkn-fe5-_qUs_KOcDCSEJN6rbiDghgestbYV3-byS0h71h0KM8pLqDXZufaOr10cVgFLaDkEndI_dypFHUJUf3sjhyO2eegtp4Ij6PGdvv9aYIYjX0wtCLWjeBg_ji7mwKAP5kTLQjeirYRZKSbMzEGKvjVjoGZQucwX_JDqTDpcr9dt-c3Fp8Z-DnSwJUPTQJC0xe5MK4kQQd6llxD1zYE6YtalXdqE1SBMoQcsLnJCUVhG7j3D46Y5SM66OMog"/>
        </div>
        <div>
            <h1 class="font-headline-md text-headline-md text-on-surface mb-1 font-bold">أحمد محمد عبد الله</h1>
            <div class="flex items-center gap-4 text-on-surface-variant">
                <span class="font-label-md text-label-md bg-surface-container px-2.5 py-1 rounded">ID: #DT-8921-2024</span>
                <div class="flex items-center gap-1 font-body-md text-body-md">
                    <span>34 سنة</span>
                    <span class="material-symbols-outlined text-sm">event</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="flex flex-wrap gap-stack-md justify-end">
        <div class="flex items-center gap-2 px-3 py-1.5 bg-error-container text-on-error-container rounded-lg border border-error/30 text-xs font-bold">
            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">warning</span>
            <span>سكري (Diabetes)</span>
        </div>
        <div class="flex items-center gap-2 px-3 py-1.5 bg-error-container text-on-error-container rounded-lg border border-error/30 text-xs font-bold">
            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">medical_services</span>
            <span>حساسية البنسلين</span>
        </div>
        <a href="{{ route('appointments') }}" class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-title-md text-title-md flex items-center gap-2 hover:bg-opacity-90 transition-all active:scale-95">
            <span class="material-symbols-outlined">add</span>
            <span>موعد جديد</span>
        </a>
    </div>
</section>

<!-- Navigation Tabs -->
<nav class="flex border-b border-outline-variant mb-stack-lg overflow-x-auto hide-scrollbar select-none">
    <button class="patient-tab-btn px-6 py-3 border-b-2 border-primary text-primary font-bold font-title-md text-title-md whitespace-nowrap focus:outline-none" data-tab="overview">نظرة عامة</button>
    <button class="patient-tab-btn px-6 py-3 text-on-surface-variant hover:text-on-surface font-title-md text-title-md whitespace-nowrap focus:outline-none" data-tab="history">التاريخ الطبي</button>
    <button class="patient-tab-btn px-6 py-3 text-on-surface-variant hover:text-on-surface font-title-md text-title-md whitespace-nowrap focus:outline-none" data-tab="chart">مخطط الأسنان</button>
    <button class="patient-tab-btn px-6 py-3 text-on-surface-variant hover:text-on-surface font-title-md text-title-md whitespace-nowrap focus:outline-none" data-tab="billing">الفواتير والمالية</button>
</nav>

<!-- Tab Content Bento Grid Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
    <!-- Main Left-side Content Area -->
    <div class="lg:col-span-8 space-y-gutter">
        
        <!-- Tab panel 1: Overview & Medical Chart -->
        <div id="overview-panel" class="patient-tab-panel space-y-gutter">
            <!-- Dental Chart Placeholder -->
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
                <div class="p-4 border-b border-outline-variant flex justify-between items-center bg-surface-container-low select-none">
                    <h2 class="font-title-lg text-title-lg text-on-surface flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">dentistry</span>
                        <span class="font-bold">مخطط الأسنان التفاعلي</span>
                    </h2>
                    <div class="flex gap-2">
                        <button class="p-1 hover:bg-surface-container rounded transition-colors"><span class="material-symbols-outlined text-on-surface-variant">zoom_in</span></button>
                        <button class="p-1 hover:bg-surface-container rounded transition-colors"><span class="material-symbols-outlined text-on-surface-variant">print</span></button>
                    </div>
                </div>
                
                <div class="p-gutter min-h-[300px] flex flex-col items-center justify-center bg-white relative overflow-hidden">
                    <div class="w-full max-w-4xl opacity-90 py-6">
                        <!-- Top Upper Teeth (1 to 16) -->
                        <div class="tooth-grid mb-8">
                            @for($i = 1; $i <= 16; $i++)
                                @php
                                    $isProblem = ($i === 3 || $i === 12);
                                    $color = $isProblem ? 'bg-error text-white border-error shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high';
                                    $icon = $isProblem ? 'warning' : 'check_circle';
                                    $state = $isProblem ? 'needs-treatment' : 'healthy';
                                @endphp
                                <div class="flex flex-col items-center gap-1">
                                    <span class="font-label-md text-label-md text-on-surface-variant select-none">{{ $i }}</span>
                                    <div data-tooth-id="{{ $i }}" data-state="{{ $state }}" class="tooth-item w-full aspect-square rounded {{ $color }} border border-outline-variant flex items-center justify-center cursor-pointer">
                                        <span class="material-symbols-outlined text-xs">{{ $icon }}</span>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        
                        <!-- Bottom Lower Teeth (17 to 32) -->
                        <div class="tooth-grid">
                            @for($i = 17; $i <= 32; $i++)
                                @php
                                    $isProgress = ($i === 24);
                                    $color = $isProgress ? 'bg-primary text-white border-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high';
                                    $icon = $isProgress ? 'pending' : 'check_circle';
                                    $state = $isProgress ? 'in-progress' : 'healthy';
                                @endphp
                                <div class="flex flex-col items-center gap-1">
                                    <div data-tooth-id="{{ $i }}" data-state="{{ $state }}" class="tooth-item w-full aspect-square rounded {{ $color }} border border-outline-variant flex items-center justify-center cursor-pointer">
                                        <span class="material-symbols-outlined text-xs">{{ $icon }}</span>
                                    </div>
                                    <span class="font-label-md text-label-md text-on-surface-variant select-none">{{ $i }}</span>
                                </div>
                            @endfor
                        </div>
                    </div>
                    
                    <!-- Selected Tooth Console -->
                    <div class="mt-4 p-4 border border-outline-variant rounded-xl bg-surface-container-low/50 w-full text-right flex justify-between items-center select-none">
                        <span id="selected-tooth-details" class="text-sm text-on-surface-variant">انقر فوق أي سن في المخطط أعلاه لعرض التفاصيل وتاريخ العلاج المعين...</span>
                        <span id="selected-tooth-number" class="font-bold text-primary text-sm">حدد سنّاً</span>
                    </div>

                    <!-- Legend indicators -->
                    <div class="flex gap-6 mt-6 bg-surface-container-lowest p-3 rounded-lg border border-outline-variant text-xs select-none">
                        <div class="flex items-center gap-2"><div class="w-3.5 h-3.5 bg-error rounded border border-error"></div><span class="font-bold text-on-surface">يحتاج علاج</span></div>
                        <div class="flex items-center gap-2"><div class="w-3.5 h-3.5 bg-primary rounded border border-primary"></div><span class="font-bold text-on-surface">قيد العلاج الحالية</span></div>
                        <div class="flex items-center gap-2"><div class="w-3.5 h-3.5 bg-surface-container-low rounded border border-outline-variant"></div><span>سليم</span></div>
                    </div>
                </div>
            </div>

            <!-- Medical Timeline summary -->
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
                <div class="p-4 border-b border-outline-variant bg-surface-container-low select-none">
                    <h2 class="font-title-lg text-title-lg text-on-surface font-bold text-right">موجز السجل الزمني للمراجعات</h2>
                </div>
                <div class="p-gutter relative text-right">
                    <div class="absolute right-[43px] top-gutter bottom-gutter w-px bg-outline-variant"></div>
                    <div class="space-y-stack-lg">
                        <!-- Timeline Item 1 -->
                        <div class="relative pr-10 timeline-bullet">
                            <div class="bg-white border border-outline-variant p-4 rounded-lg">
                                <div class="flex justify-between items-start mb-2 flex-row-reverse">
                                    <h3 class="font-title-md text-title-md text-on-surface font-bold">تنظيف جيري وتلميع شامل</h3>
                                    <span class="font-label-md text-label-md text-on-surface-variant">12 مارس 2024</span>
                                </div>
                                <p class="font-body-md text-body-md text-on-surface-variant mb-2">تم عمل إزالة كاملة للرواسب الجيرية وتلميع الأسنان بالفلورايد لمنع التسوس. حالة اللثة ممتازة ومستقرة.</p>
                                <span class="px-2.5 py-1 bg-surface-container text-on-surface-variant text-[10px] rounded font-bold">د. سارة الهاشمي</span>
                            </div>
                        </div>
                        
                        <!-- Timeline Item 2 -->
                        <div class="relative pr-10 timeline-bullet">
                            <div class="bg-white border border-outline-variant p-4 rounded-lg">
                                <div class="flex justify-between items-start mb-2 flex-row-reverse">
                                    <h3 class="font-title-md text-title-md text-on-surface font-bold">حشوة تجميلية - سن رقم 12</h3>
                                    <span class="font-label-md text-label-md text-on-surface-variant">05 يناير 2024</span>
                                </div>
                                <p class="font-body-md text-body-md text-on-surface-variant mb-2">معالجة نخر تسوس بسيط وإعادة بناء السن التجميلي بمادة الكومبوزيت عالية الصلابة.</p>
                                <span class="px-2.5 py-1 bg-surface-container text-on-surface-variant text-[10px] rounded font-bold">د. خالد العمر</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab panel 2: History (Toggled via JS) -->
        <div id="history-panel" class="patient-tab-panel hidden space-y-gutter">
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 shadow-sm text-right">
                <h3 class="font-title-lg text-title-lg font-bold mb-4">التاريخ الطبي الكامل للمريض</h3>
                <div class="border border-outline-variant rounded-xl overflow-hidden">
                    <table class="w-full text-right border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low text-on-surface-variant text-xs border-b border-outline-variant">
                                <th class="p-4 font-bold">التشخيص الطبي</th>
                                <th class="p-4 font-bold">الخطة العلاجية</th>
                                <th class="p-4 font-bold">الطبيب</th>
                                <th class="p-4 font-bold">التاريخ</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-outline-variant hover:bg-surface-container/50">
                                <td class="p-4 font-bold">التهاب عصب سن 24</td>
                                <td class="p-4">حشو عصب ثلاثي الجلسات</td>
                                <td class="p-4">د. أحمد سمير</td>
                                <td class="p-4 text-on-surface-variant">مستمر حالياً</td>
                            </tr>
                            <tr class="border-b border-outline-variant hover:bg-surface-container/50">
                                <td class="p-4 font-bold">تسوس سن 12</td>
                                <td class="p-4">حشوة ضوئية تجميلية</td>
                                <td class="p-4">د. خالد العمر</td>
                                <td class="p-4 text-on-surface-variant">05 يناير 2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tab panel 3: Custom Chart (Toggled via JS) -->
        <div id="chart-panel" class="patient-tab-panel hidden space-y-gutter">
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 shadow-sm text-right">
                <h3 class="font-title-lg text-title-lg font-bold mb-2">أرقام وحالات الأسنان</h3>
                <p class="text-sm text-on-surface-variant mb-4">قائمة بالأسنان المصابة والتي خضعت لعلاج سابق.</p>
                <ul class="space-y-3">
                    <li class="p-3 bg-error-container/20 text-error rounded-lg flex justify-between items-center flex-row-reverse border border-error/20">
                        <span class="font-bold">السن 3: تسوس عميق يحتاج علاج عاجل</span>
                        <span class="font-bold">العلوي الأيمن</span>
                    </li>
                    <li class="p-3 bg-primary-container/10 text-primary rounded-lg flex justify-between items-center flex-row-reverse border border-primary/20">
                        <span class="font-bold">السن 24: حشوة جذر مؤقتة قيد المراجعة</span>
                        <span class="font-bold">السفلي الأيسر</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tab panel 4: Finance (Toggled via JS) -->
        <div id="billing-panel" class="patient-tab-panel hidden space-y-gutter">
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 shadow-sm text-right">
                <h3 class="font-title-lg text-title-lg font-bold mb-4">فواتير ومعاملات المريض</h3>
                <div class="border border-outline-variant rounded-xl overflow-hidden">
                    <table class="w-full text-right border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low border-b border-outline-variant text-xs font-bold text-on-surface-variant">
                                <th class="p-4">رقم الفاتورة</th>
                                <th class="p-4">الخدمات الطبية</th>
                                <th class="p-4">المبلغ الكلي</th>
                                <th class="p-4">حالة السداد</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-outline-variant hover:bg-surface-container/50">
                                <td class="p-4 font-bold text-primary">#INV-2024-001</td>
                                <td class="p-4">تركيب تاج زيركون + كشف</td>
                                <td class="p-4 font-bold">2,450 ر.س</td>
                                <td class="p-4"><span class="bg-secondary/10 text-secondary border border-secondary/20 px-2 py-0.5 rounded text-xs font-bold">مدفوع بالكامل</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Right-side Sidebar: Medications & Next Appointment -->
    <div class="lg:col-span-4 space-y-gutter select-none">
        
        <!-- Next Appointment Box -->
        <div class="bg-primary-container text-on-primary-container rounded-xl p-6 shadow-md relative overflow-hidden group">
            <div class="absolute -right-10 -bottom-10 opacity-10 group-hover:rotate-12 transition-transform duration-500">
                <span class="material-symbols-outlined text-[120px]">calendar_today</span>
            </div>
            <div class="relative z-10 text-right">
                <h3 class="font-headline-md text-headline-md font-bold mb-2 text-white">الجلسة القادمة</h3>
                <p class="font-title-lg text-title-lg mb-4 text-white">غداً، 10:30 صباحاً</p>
                <p class="font-body-md text-body-md opacity-90 mb-6 text-primary-fixed-dim">زراعة سن (مرحلة أولى) مع الدكتور خالد العمر</p>
                <button class="bg-white text-primary px-5 py-2.5 rounded-lg font-bold text-title-md hover:bg-opacity-95 active:scale-95 transition-all focus:outline-none">تأكيد حضور المريض</button>
            </div>
        </div>

        <!-- Current Medications -->
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm text-right">
            <div class="p-4 border-b border-outline-variant bg-surface-container-low flex justify-between items-center">
                <span class="material-symbols-outlined text-primary cursor-pointer hover:bg-surface-container p-1 rounded-full">edit</span>
                <h2 class="font-title-md text-title-md text-on-surface font-bold">الأدوية الطبية الحالية</h2>
            </div>
            <div class="p-4 space-y-4">
                <div class="flex gap-4 items-start p-3 bg-surface-container-low/50 border border-outline-variant rounded-lg flex-row-reverse">
                    <span class="material-symbols-outlined text-primary mt-0.5">pill</span>
                    <div>
                        <p class="font-title-md text-title-md text-on-surface font-bold">ميتفورمين Metformin (500mg)</p>
                        <p class="font-body-md text-body-md text-on-surface-variant">حبتين يومياً (صباحاً ومساءً بعد الوجبات)</p>
                    </div>
                </div>
                
                <div class="flex gap-4 items-start p-3 bg-surface-container-low/50 border border-outline-variant rounded-lg flex-row-reverse">
                    <span class="material-symbols-outlined text-primary mt-0.5">pill</span>
                    <div>
                        <p class="font-title-md text-title-md text-on-surface font-bold">أسبرين Aspirin (81mg)</p>
                        <p class="font-body-md text-body-md text-on-surface-variant">حبة واحدة يومياً بعد وجبة الغداء</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Emergency Contact -->
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm text-right">
            <div class="p-4 border-b border-outline-variant bg-surface-container-low">
                <h2 class="font-title-md text-title-md text-on-surface font-bold">جهة اتصال الطوارئ</h2>
            </div>
            <div class="p-4">
                <div class="space-y-3">
                    <div class="flex justify-between items-center flex-row-reverse">
                        <span class="font-label-md text-label-md text-on-surface-variant">اسم الاتصال:</span>
                        <span class="font-body-md text-body-md font-bold">ليلى محمد (الزوجة)</span>
                    </div>
                    <div class="flex justify-between items-center flex-row-reverse">
                        <span class="font-label-md text-label-md text-on-surface-variant">رقم الجوال:</span>
                        <span class="font-body-md text-body-md font-bold" dir="ltr">+966 50 123 4567</span>
                    </div>
                    <button class="w-full mt-2 py-2.5 border border-primary text-primary rounded-lg font-bold text-title-md hover:bg-primary hover:text-white transition-all active:scale-[0.98]">اتصال هاتفي مباشر</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @vite('resources/js/patient-profile.js')
@endpush
