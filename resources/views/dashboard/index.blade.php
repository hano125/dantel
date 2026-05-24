@extends('layouts.app')

@section('title', 'Dentera - لوحة التحكم الطبية')

@push('styles')
    @vite('resources/css/dashboard.css')
@endpush

@section('content')
<!-- Header greeting & action button -->
<div class="flex justify-between items-end mb-8 select-none">
    <div class="text-right">
        <h2 class="font-headline-lg text-headline-lg text-on-surface">مرحباً دكتور أحمد</h2>
        <p class="text-body-lg text-on-surface-variant">نظرة عامة على أداء العيادة اليوم، {{ date('d F Y') }}</p>
    </div>
    <a href="{{ route('appointments') }}" class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-title-md flex items-center gap-2 hover:bg-primary-container transition-all shadow-md active:scale-95">
        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">add</span>
        <span>موعد جديد</span>
    </a>
</div>

<!-- Stats widgets grid -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-stack-lg mb-8 select-none">
    <!-- Total Patients -->
    <div class="bento-card bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex flex-col gap-2 shadow-sm">
        <div class="flex justify-between items-start">
            <span class="text-label-md text-on-surface-variant">إجمالي المرضى</span>
            <span class="material-symbols-outlined text-primary bg-primary/5 p-2 rounded-lg">group</span>
        </div>
        <p class="font-headline-md text-headline-md font-bold">1,284</p>
        <p class="text-label-md text-secondary flex items-center gap-1">
            <span class="material-symbols-outlined text-[16px]">trending_up</span>
            <span>+12% الشهر الماضي</span>
        </p>
    </div>

    <!-- Today's Appointments -->
    <div class="bento-card bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex flex-col gap-2 shadow-sm">
        <div class="flex justify-between items-start">
            <span class="text-label-md text-on-surface-variant">مواعيد اليوم</span>
            <span class="material-symbols-outlined text-primary bg-primary/5 p-2 rounded-lg">event_available</span>
        </div>
        <p class="font-headline-md text-headline-md font-bold">24</p>
        <p class="text-label-md text-on-surface-variant">8 مكتملة، 16 قادمة</p>
    </div>

    <!-- Revenue -->
    <div class="bento-card bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex flex-col gap-2 shadow-sm">
        <div class="flex justify-between items-start">
            <span class="text-label-md text-on-surface-variant">الإيرادات</span>
            <span class="material-symbols-outlined text-secondary bg-secondary/5 p-2 rounded-lg">payments</span>
        </div>
        <p class="font-headline-md text-headline-md font-bold">14.2k</p>
        <p class="text-label-md text-secondary flex items-center gap-0.5">
            <span class="material-symbols-outlined text-[16px]">arrow_upward</span>
            <span>SAR هذا الأسبوع</span>
        </p>
    </div>

    <!-- Pending Payments -->
    <div class="bento-card bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex flex-col gap-2 shadow-sm">
        <div class="flex justify-between items-start">
            <span class="text-label-md text-on-surface-variant">مدفوعات معلقة</span>
            <span class="material-symbols-outlined text-error bg-error/5 p-2 rounded-lg">error</span>
        </div>
        <p class="font-headline-md text-headline-md font-bold">3.8k</p>
        <p class="text-label-md text-on-surface-variant">5 فواتير غير مدفوعة</p>
    </div>

    <!-- Active Treatments -->
    <div class="bento-card bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex flex-col gap-2 shadow-sm">
        <div class="flex justify-between items-start">
            <span class="text-label-md text-on-surface-variant">علاجات نشطة</span>
            <span class="material-symbols-outlined text-primary bg-primary/5 p-2 rounded-lg">dentistry</span>
        </div>
        <p class="font-headline-md text-headline-md font-bold">45</p>
        <p class="text-label-md text-on-surface-variant">تقويم وجراحة</p>
    </div>

    <!-- Doctors Online -->
    <div class="bento-card bg-surface-container-lowest p-6 rounded-xl border border-outline-variant flex flex-col gap-2 shadow-sm">
        <div class="flex justify-between items-start">
            <span class="text-label-md text-on-surface-variant">أطباء متصلون</span>
            <span class="material-symbols-outlined text-secondary bg-secondary/5 p-2 rounded-lg">online_prediction</span>
        </div>
        <p class="font-headline-md text-headline-md font-bold">6/8</p>
        <div class="flex -space-x-2 space-x-reverse justify-end">
            <img class="w-6 h-6 rounded-full border border-surface-container-lowest object-cover" alt="Dr. Ahmed" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVk-DarJYIDgMt5--5WMXXXHMfKGSCHaoiynWIb_nvGJAnOMn-5YI9FN3FSbyJrtn38MZ5g_lJA4_GtIXgn_VULMrGK-72ya1iFZwxVawtgZoRe2I6ISK3u1uwUNe1KA8PzNpFsY4ugJYBI_MixgoAHUDEPgc5jEZTfQeRjEXhgxPfbO3siKDQQALPVZvbs1DcjQD3iLepIl4dHS05O-jgalmFQ8nA9Rml3gevFtBuJvToEKV2NVMQdL72m6sd4GzU4EWpkbmQPmQ"/>
            <div class="w-6 h-6 rounded-full border border-surface-container-lowest bg-primary text-[10px] text-on-primary flex items-center justify-center font-bold">MA</div>
            <div class="w-6 h-6 rounded-full border border-surface-container-lowest bg-secondary text-[10px] text-on-secondary flex items-center justify-center font-bold">FA</div>
        </div>
    </div>
</div>

<!-- Bento grid for charts & lists -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-stack-lg items-start">
    <!-- Revenue Graph (8 columns) -->
    <div class="lg:col-span-8 bg-surface-container-lowest p-6 rounded-xl border border-outline-variant shadow-sm h-[400px] flex flex-col justify-between">
        <div class="flex justify-between items-center mb-6 select-none">
            <h3 class="font-title-lg text-title-lg">رسم بياني للإيرادات (SAR)</h3>
            <div class="flex gap-2">
                <button class="graph-toggle px-3 py-1 bg-surface-container text-on-surface-variant rounded text-label-md cursor-pointer hover:bg-outline-variant transition-colors">أسبوع</button>
                <button class="graph-toggle px-3 py-1 bg-primary text-on-primary rounded text-label-md cursor-pointer transition-colors">شهر</button>
            </div>
        </div>
        
        <div class="flex-grow flex items-end gap-3 pb-2 border-b border-outline-variant h-64">
            <div class="chart-bar flex-grow bg-primary/20 rounded-t-lg transition-all hover:bg-primary/30" data-height="40%" style="height: 40%"></div>
            <div class="chart-bar flex-grow bg-primary/30 rounded-t-lg transition-all hover:bg-primary/40" data-height="65%" style="height: 65%"></div>
            <div class="chart-bar flex-grow bg-primary/40 rounded-t-lg transition-all hover:bg-primary/50" data-height="50%" style="height: 50%"></div>
            <div class="chart-bar flex-grow bg-primary/50 rounded-t-lg transition-all hover:bg-primary/60" data-height="85%" style="height: 85%"></div>
            <div class="chart-bar flex-grow bg-primary/60 rounded-t-lg transition-all hover:bg-primary/70" data-height="70%" style="height: 70%"></div>
            <div class="chart-bar flex-grow bg-primary/80 rounded-t-lg transition-all hover:bg-primary/90" data-height="95%" style="height: 95%"></div>
            <div class="chart-bar flex-grow bg-primary rounded-t-lg transition-all hover:opacity-90" data-height="80%" style="height: 80%"></div>
        </div>
        
        <div class="flex justify-between pt-4 text-label-md text-on-surface-variant select-none">
            <span>سبتمبر</span>
            <span>أكتوبر</span>
            <span>نوفمبر</span>
            <span>ديسمبر</span>
            <span>يناير</span>
            <span>فبراير</span>
            <span>مارس</span>
        </div>
    </div>

    <!-- Appointment Calendar Overview (4 columns) -->
    <div class="lg:col-span-4 bg-surface-container-lowest p-6 rounded-xl border border-outline-variant shadow-sm flex flex-col gap-4">
        <div class="flex justify-between items-center mb-2 select-none">
            <h3 class="font-title-lg text-title-lg">تقويم المواعيد اليومية</h3>
            <a href="{{ route('appointments') }}" class="text-primary text-body-md hover:underline font-bold">عرض الكل</a>
        </div>
        
        <div class="space-y-4">
            <!-- Ahmad Mohammad -->
            <div class="flex items-center gap-4 p-3 bg-background rounded-lg border-r-4 border-secondary select-none">
                <div class="text-center min-w-[50px]">
                    <p class="font-bold text-headline-md leading-none text-secondary">09:00</p>
                    <p class="text-label-md text-on-surface-variant">صباحاً</p>
                </div>
                <div class="flex-grow text-right">
                    <p class="font-title-md">أحمد محمد عبد الله</p>
                    <p class="text-body-md text-on-surface-variant">تنظيف أسنان وتلميع</p>
                </div>
                <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
            </div>

            <!-- Sarah Ali -->
            <div class="flex items-center gap-4 p-3 bg-background rounded-lg border-r-4 border-primary select-none">
                <div class="text-center min-w-[50px]">
                    <p class="font-bold text-headline-md leading-none text-primary">10:30</p>
                    <p class="text-label-md text-on-surface-variant">صباحاً</p>
                </div>
                <div class="flex-grow text-right">
                    <p class="font-title-md">سارة علي الناصر</p>
                    <p class="text-body-md text-on-surface-variant">علاج عصب (جلسة 2)</p>
                </div>
                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">pending</span>
            </div>

            <!-- Yasser Hussein -->
            <div class="flex items-center gap-4 p-3 bg-background rounded-lg border-r-4 border-error select-none">
                <div class="text-center min-w-[50px]">
                    <p class="font-bold text-headline-md leading-none text-error">01:00</p>
                    <p class="text-label-md text-on-surface-variant">مساءً</p>
                </div>
                <div class="flex-grow text-right">
                    <p class="font-title-md">ياسر حسين القحطاني</p>
                    <p class="text-body-md text-on-surface-variant">حشوة تجميلية طارئة</p>
                </div>
                <span class="bg-error-container text-error px-2 py-0.5 rounded text-label-md font-bold">متأخر</span>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-stack-lg items-start mt-8">
    <!-- Recent Patients list table (8 columns) -->
    <div class="lg:col-span-8 bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden">
        <div class="p-6 flex justify-between items-center border-b border-outline-variant select-none">
            <h3 class="font-title-lg text-title-lg">المرضى الأخيرون في العيادة</h3>
            <button class="text-on-surface-variant flex items-center gap-2 hover:text-primary transition-colors focus:outline-none">
                <span class="material-symbols-outlined">filter_list</span>
                <span>تصفية الحالات</span>
            </button>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-right border-collapse">
                <thead>
                    <tr class="bg-surface-container-low text-on-surface-variant text-label-md border-b border-outline-variant select-none">
                        <th class="p-4 font-medium">اسم المريض</th>
                        <th class="p-4 font-medium">آخر زيارة للعيادة</th>
                        <th class="p-4 font-medium">حالة المريض الحالية</th>
                        <th class="p-4 font-medium text-left">الملف الطبي</th>
                    </tr>
                </thead>
                <tbody class="text-body-md">
                    <!-- Leila Khaled -->
                    <tr class="border-b border-outline-variant hover:bg-surface-container transition-colors">
                        <td class="p-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold text-xs">لخ</div>
                            <span>ليلى خالد العمر</span>
                        </td>
                        <td class="p-4">22 أكتوبر 2023</td>
                        <td class="p-4">
                            <span class="bg-secondary/10 text-secondary px-3 py-1 rounded-full text-label-md border border-secondary/20">منتهى</span>
                        </td>
                        <td class="p-4 text-left">
                            <a href="{{ route('patients.show', 1) }}" class="text-primary hover:underline font-bold">عرض الملف الطبي</a>
                        </td>
                    </tr>
                    
                    <!-- Fahd Abdulrahman -->
                    <tr class="border-b border-outline-variant hover:bg-surface-container transition-colors">
                        <td class="p-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-secondary-fixed flex items-center justify-center text-secondary font-bold text-xs">فع</div>
                            <span>فهد عبدالرحمن السعد</span>
                        </td>
                        <td class="p-4">23 أكتوبر 2023</td>
                        <td class="p-4">
                            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-label-md border border-primary/20">قيد الانتظار</span>
                        </td>
                        <td class="p-4 text-left">
                            <a href="{{ route('patients.show', 1) }}" class="text-primary hover:underline font-bold">عرض الملف الطبي</a>
                        </td>
                    </tr>
                    
                    <!-- Mona Ibrahim -->
                    <tr class="hover:bg-surface-container transition-colors">
                        <td class="p-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary font-bold text-xs">مي</div>
                            <span>منى إبراهيم العلي</span>
                        </td>
                        <td class="p-4">منذ ساعة واحدة</td>
                        <td class="p-4">
                            <span class="bg-secondary/10 text-secondary px-3 py-1 rounded-full text-label-md border border-secondary/20">في الكرسي</span>
                        </td>
                        <td class="p-4 text-left">
                            <a href="{{ route('patients.show', 1) }}" class="text-primary hover:underline font-bold">عرض الملف الطبي</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Inventory Alerts (4 columns) -->
    <div class="lg:col-span-4 bg-surface-container-lowest p-6 rounded-xl border border-outline-variant shadow-sm flex flex-col gap-4">
        <div class="flex items-center gap-2 select-none border-b border-outline-variant pb-2">
            <span class="material-symbols-outlined text-error">inventory_2</span>
            <h3 class="font-title-lg text-title-lg">تنبيهات المخزون الطبي</h3>
        </div>
        
        <div class="space-y-4">
            <!-- Local Anesthetic -->
            <div class="p-4 rounded-lg bg-error-container/20 border border-error-container/30 text-right select-none">
                <div class="flex justify-between items-center mb-2">
                    <p class="font-title-md text-error">مخدر موضعي (2%)</p>
                    <span class="text-label-md font-bold text-error">5 متبقي</span>
                </div>
                <div class="w-full bg-error/10 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-error h-full" style="width: 15%"></div>
                </div>
                <p class="text-label-md mt-2 text-on-surface-variant">أقل من الحد الأدنى الحرج للمستودع (15)</p>
            </div>

            <!-- Gloves -->
            <div class="p-4 rounded-lg bg-surface-container border border-outline-variant text-right select-none">
                <div class="flex justify-between items-center mb-2">
                    <p class="font-title-md">قفازات طبية معقمة (L)</p>
                    <span class="text-label-md font-bold">12 علبة متبقية</span>
                </div>
                <div class="w-full bg-outline-variant h-1.5 rounded-full overflow-hidden">
                    <div class="bg-primary h-full" style="width: 40%"></div>
                </div>
                <p class="text-label-md mt-2 text-on-surface-variant">اقترب من الحد الأدنى لإعادة الطلب</p>
            </div>
            
            <button class="w-full py-3 border border-dashed border-outline rounded-lg text-on-surface-variant font-title-md flex items-center justify-center gap-2 hover:bg-surface-container transition-all">
                <span class="material-symbols-outlined">shopping_cart</span>
                <span>فتح طلبات التوريد والشراء</span>
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @vite('resources/js/dashboard.js')
@endpush
