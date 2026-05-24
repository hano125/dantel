@extends('layouts.app')

@section('title', 'إدارة الفواتير والمالية | Dentera')

@push('styles')
    @vite('resources/css/billing.css')
@endpush

@section('content')
<!-- Header Section -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8 select-none text-right">
    <div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">إدارة الفواتير والمالية</h1>
        <p class="font-body-md text-body-md text-on-surface-variant">تتبع الإيرادات والمطالبات المالية والمبالغ غير المحصلة</p>
    </div>
    
    <button class="bg-primary text-on-primary px-6 py-3 rounded-xl font-bold text-title-md flex items-center gap-2 hover:bg-primary-container transition-all shadow-lg shadow-primary/20 active:scale-95">
        <span class="material-symbols-outlined">add</span>
        <span>إنشاء فاتورة جديدة</span>
    </button>
</div>

<!-- Stats Dashboard Grid -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-8 select-none text-right">
    <!-- Stat 1 -->
    <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant hover:border-primary transition-all group shadow-sm">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 rounded-lg bg-primary/10 text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
                <span class="material-symbols-outlined">account_balance_wallet</span>
            </div>
            <span class="text-secondary text-xs font-bold">+12.5%</span>
        </div>
        <p class="text-on-surface-variant text-label-md font-bold mb-1">إجمالي الفواتير الصادرة</p>
        <h3 class="font-headline-md text-headline-md font-bold">45,280 ر.س</h3>
    </div>
    
    <!-- Stat 2 -->
    <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant hover:border-error transition-all group shadow-sm">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 rounded-lg bg-error/10 text-error group-hover:bg-error group-hover:text-on-error transition-colors">
                <span class="material-symbols-outlined">pending_actions</span>
            </div>
            <span class="text-error text-xs font-bold">-2.1%</span>
        </div>
        <p class="text-on-surface-variant text-label-md font-bold mb-1">المبالغ المستحقة والمعلقة</p>
        <h3 class="font-headline-md text-headline-md font-bold">8,420 ر.س</h3>
    </div>
    
    <!-- Stat 3 -->
    <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant hover:border-secondary transition-all group shadow-sm">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 rounded-lg bg-secondary/10 text-secondary group-hover:bg-secondary group-hover:text-on-secondary transition-colors">
                <span class="material-symbols-outlined">fact_check</span>
            </div>
            <span class="text-secondary text-xs font-bold">+5.4%</span>
        </div>
        <p class="text-on-surface-variant text-label-md font-bold mb-1">الفواتير المحصلة بالكامل</p>
        <h3 class="font-headline-md text-headline-md font-bold">36,860 ر.س</h3>
    </div>
    
    <!-- Stat 4 -->
    <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant hover:border-tertiary transition-all group shadow-sm">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 rounded-lg bg-tertiary/10 text-tertiary group-hover:bg-tertiary group-hover:text-on-tertiary transition-colors">
                <span class="material-symbols-outlined">description</span>
            </div>
        </div>
        <p class="text-on-surface-variant text-label-md font-bold mb-1">متوسط قيمة الفاتورة</p>
        <h3 class="font-headline-md text-headline-md font-bold">1,200 ر.س</h3>
    </div>
</div>

<!-- Main Table Layout -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden shadow-sm">
    <div class="p-6 border-b border-outline-variant flex justify-between items-center bg-surface-bright select-none">
        <h2 class="font-title-lg text-title-lg font-bold">الفواتير الأخيرة الصادرة</h2>
        <div class="flex gap-2">
            <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-all focus:outline-none">
                <span class="material-symbols-outlined text-on-surface-variant">filter_list</span>
            </button>
            <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-all focus:outline-none">
                <span class="material-symbols-outlined text-on-surface-variant">download</span>
            </button>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-right border-collapse">
            <thead>
                <tr class="bg-surface-container-low text-on-surface-variant border-b border-outline-variant select-none">
                    <th class="p-4 font-bold text-label-md">رقم الفاتورة</th>
                    <th class="p-4 font-bold text-label-md">اسم المريض</th>
                    <th class="p-4 font-bold text-label-md">تاريخ الإصدار</th>
                    <th class="p-4 font-bold text-label-md">المبلغ المطلوب</th>
                    <th class="p-4 font-bold text-label-md">الحالة الحالية</th>
                    <th class="p-4 font-bold text-label-md text-left">إجراءات</th>
                </tr>
            </thead>
            <tbody>
                <!-- INV 001 -->
                <tr class="border-b border-outline-variant hover:bg-surface-container-low/50 cursor-pointer transition-colors" 
                    onclick="togglePreview('#INV-2024-001', 'أحمد محمد علي', '14 أكتوبر 2023', '2,450 ر.س', 'مدفوع بالكامل')">
                    <td class="p-4 font-body-md font-bold">#INV-2024-001</td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xs select-none">أم</div>
                            <span class="font-bold">أحمد محمد علي</span>
                        </div>
                    </td>
                    <td class="p-4 font-body-md text-on-surface-variant">14 أكتوبر 2023</td>
                    <td class="p-4 font-bold">2,450 ر.س</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full bg-secondary-container/30 text-on-secondary-container text-xs font-bold border border-secondary/20">مدفوع</span>
                    </td>
                    <td class="p-4 text-left">
                        <button class="text-outline hover:text-primary transition-colors focus:outline-none">
                            <span class="material-symbols-outlined">more_vert</span>
                        </button>
                    </td>
                </tr>

                <!-- INV 002 -->
                <tr class="border-b border-outline-variant hover:bg-surface-container-low/50 cursor-pointer transition-colors"
                    onclick="togglePreview('#INV-2024-002', 'سارة ناصر السالم', '12 أكتوبر 2023', '1,800 ر.س', 'معلق')">
                    <td class="p-4 font-body-md font-bold">#INV-2024-002</td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-tertiary/10 flex items-center justify-center text-tertiary font-bold text-xs select-none">سن</div>
                            <span class="font-bold">سارة ناصر السالم</span>
                        </div>
                    </td>
                    <td class="p-4 font-body-md text-on-surface-variant">12 أكتوبر 2023</td>
                    <td class="p-4 font-bold">1,800 ر.س</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full bg-primary-container/10 text-primary text-xs font-bold border border-primary/20">قيد الانتظار</span>
                    </td>
                    <td class="p-4 text-left">
                        <button class="text-outline hover:text-primary transition-colors focus:outline-none">
                            <span class="material-symbols-outlined">more_vert</span>
                        </button>
                    </td>
                </tr>

                <!-- INV 003 -->
                <tr class="border-b border-outline-variant hover:bg-surface-container-low/50 cursor-pointer transition-colors"
                    onclick="togglePreview('#INV-2024-003', 'خالد خلف الرشيد', '08 أكتوبر 2023', '4,200 ر.س', 'متأخر السداد')">
                    <td class="p-4 font-body-md font-bold">#INV-2024-003</td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-error/10 flex items-center justify-center text-error font-bold text-xs select-none">خخ</div>
                            <span class="font-bold">خالد خلف الرشيد</span>
                        </div>
                    </td>
                    <td class="p-4 font-body-md text-on-surface-variant">08 أكتوبر 2023</td>
                    <td class="p-4 font-bold">4,200 ر.س</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full bg-error-container/30 text-on-error-container text-xs font-bold border border-error/20">متأخر</span>
                    </td>
                    <td class="p-4 text-left">
                        <button class="text-outline hover:text-primary transition-colors focus:outline-none">
                            <span class="material-symbols-outlined">more_vert</span>
                        </button>
                    </td>
                </tr>

                <!-- INV 004 -->
                <tr class="hover:bg-surface-container-low/50 cursor-pointer transition-colors"
                    onclick="togglePreview('#INV-2024-004', 'منى فهد الدوسري', '05 أكتوبر 2023', '850 ر.س', 'مدفوع بالكامل')">
                    <td class="p-4 font-body-md font-bold">#INV-2024-004</td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-secondary/10 flex items-center justify-center text-secondary font-bold text-xs select-none">مف</div>
                            <span class="font-bold">منى فهد الدوسري</span>
                        </div>
                    </td>
                    <td class="p-4 font-body-md text-on-surface-variant">05 أكتوبر 2023</td>
                    <td class="p-4 font-bold">850 ر.س</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full bg-secondary-container/30 text-on-secondary-container text-xs font-bold border border-secondary/20">مدفوع</span>
                    </td>
                    <td class="p-4 text-left">
                        <button class="text-outline hover:text-primary transition-colors focus:outline-none">
                            <span class="material-symbols-outlined">more_vert</span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="p-4 border-t border-outline-variant flex items-center justify-between select-none">
        <span class="text-label-md text-on-surface-variant">عرض 4 من أصل 28 فاتورة حالية</span>
        <div class="flex gap-2">
            <button class="px-3 py-1 border border-outline-variant rounded-lg text-xs hover:bg-surface-container transition-colors focus:outline-none">السابق</button>
            <button class="px-3 py-1 bg-primary text-on-primary rounded-lg text-xs shadow focus:outline-none">1</button>
            <button class="px-3 py-1 border border-outline-variant rounded-lg text-xs hover:bg-surface-container transition-colors focus:outline-none">التالي</button>
        </div>
    </div>
</div>

<!-- Dark Backdrop overlay for sliding drawer -->
<div id="invoice-overlay"></div>

<!-- Sliding Invoice Preview Drawer (Left anchored) -->
<div id="invoicePreview" class="hidden flex flex-col justify-between select-none">
    <!-- Header Drawer -->
    <div class="p-6 bg-primary text-on-primary flex justify-between items-center text-right">
        <button class="p-1 hover:bg-on-primary/20 rounded transition-colors focus:outline-none" onclick="togglePreview()">
            <span class="material-symbols-outlined text-white">close</span>
        </button>
        <h3 class="font-title-lg text-title-lg font-bold text-white">معاينة تفاصيل الفاتورة</h3>
    </div>
    
    <!-- Body Drawer -->
    <div class="p-8 flex-grow overflow-y-auto text-right">
        <!-- Branding logo & clinic details -->
        <div class="flex justify-between items-start mb-8 flex-row-reverse">
            <div class="text-primary font-bold text-2xl">دينتيرا</div>
            <div class="text-left text-xs text-on-surface-variant">
                <p>طريق الملك عبدالله، العليا، الرياض</p>
                <p>finance@dentera.com</p>
                <p>+966 11 000 0000</p>
            </div>
        </div>
        
        <!-- Metadata -->
        <div class="mb-8 pb-6 border-b border-outline-variant border-dashed">
            <div class="flex justify-between mb-2 flex-row-reverse">
                <span class="text-on-surface-variant font-bold">رقم الفاتورة:</span>
                <span class="font-bold text-primary" id="drawer-inv-num">#INV-2024-001</span>
            </div>
            <div class="flex justify-between mb-2 flex-row-reverse">
                <span class="text-on-surface-variant font-bold">تاريخ الإصدار:</span>
                <span id="drawer-inv-date">14/10/2023</span>
            </div>
            <div class="flex justify-between flex-row-reverse">
                <span class="text-on-surface-variant font-bold">حالة الفاتورة:</span>
                <span class="text-secondary font-bold" id="drawer-inv-status">تم السداد</span>
            </div>
        </div>
        
        <!-- Patient Details -->
        <div class="mb-8">
            <h4 class="text-label-md font-bold text-outline uppercase mb-2">بيانات المريض المدين</h4>
            <p class="font-bold text-title-md text-on-surface" id="drawer-patient-name">أحمد محمد علي</p>
            <p class="text-xs text-on-surface-variant mt-1">رقم الملف: P-88231</p>
        </div>
        
        <!-- Services table list -->
        <div class="space-y-4 mb-8">
            <h4 class="text-label-md font-bold text-outline uppercase mb-2">الخدمات الطبية المقدمة</h4>
            <div class="flex justify-between text-sm flex-row-reverse">
                <span class="font-bold" id="drawer-total-amount">2,450 ر.س</span>
                <span>تاج زيركون مخصص + كشف دوري</span>
            </div>
            <div class="flex justify-between text-xs text-on-surface-variant flex-row-reverse">
                <span>0.00 ر.س (مشمولة)</span>
                <span>ضريبة القيمة المضافة (15%)</span>
            </div>
        </div>
        
        <!-- Calculation subtotal box -->
        <div class="bg-surface-container-low p-4 rounded-xl space-y-2">
            <div class="flex justify-between text-sm flex-row-reverse">
                <span id="drawer-subtotal-amount">2,450 ر.س</span>
                <span>المجموع الفرعي</span>
            </div>
            <div class="flex justify-between text-title-lg font-bold text-primary border-t border-outline-variant pt-2 mt-2 flex-row-reverse">
                <span id="drawer-total-amount-large">2,450 ر.س</span>
                <span>الإجمالي الكلي</span>
            </div>
        </div>
    </div>
    
    <!-- Drawer Footer Actions -->
    <div class="p-6 border-t border-outline-variant bg-surface-container-low/50 flex gap-3">
        <button class="flex-1 bg-outline-variant text-on-surface py-3 rounded-lg flex items-center justify-center gap-2 font-bold hover:bg-outline transition-all focus:outline-none">
            <span class="material-symbols-outlined text-lg">print</span>
            <span>طباعة</span>
        </button>
        <button class="flex-1 bg-primary text-on-primary py-3 rounded-lg flex items-center justify-center gap-2 font-bold hover:bg-primary-container transition-all focus:outline-none">
            <span class="material-symbols-outlined text-lg">share</span>
            <span>مشاركة الفاتورة</span>
        </button>
    </div>
</div>
@endsection

@push('scripts')
    @vite('resources/js/billing.js')
@endpush
