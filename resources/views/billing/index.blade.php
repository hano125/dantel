@extends('layouts.app')

@section('title', 'إدارة الفواتير والمالية | Dentera')

@push('styles')
    @vite('resources/css/billing.css')
@endpush

@section('content')

{{-- ── Page Header ── --}}
<div class="flex flex-col md:flex-row md:items-center justify-between gap-5 mb-8 select-none text-right">
    <div>
        <h1 class="text-2xl font-bold text-on-surface tracking-tight mb-1">إدارة الفواتير والمالية</h1>
        <p class="text-sm text-on-surface-variant">تتبع الإيرادات والمطالبات والمبالغ غير المحصلة</p>
    </div>
    <button class="btn-primary shrink-0">
        <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">add</span>
        <span>إنشاء فاتورة جديدة</span>
    </button>
</div>

{{-- ── Stat Cards ── --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8 select-none stagger-children">

    <div class="billing-stat-card p-6 text-right">
        <div class="flex justify-between items-start mb-4">
            <div class="icon-badge icon-badge-primary">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
            </div>
            <span class="badge badge-success text-[10px]">+12.5%</span>
        </div>
        <p class="text-[12px] text-on-surface-variant font-bold mb-1">إجمالي الفواتير الصادرة</p>
        <h3 class="text-2xl font-bold text-on-surface tracking-tight">45,280</h3>
        <p class="text-[11px] text-on-surface-variant mt-1">ريال سعودي</p>
    </div>

    <div class="billing-stat-card p-6 text-right">
        <div class="flex justify-between items-start mb-4">
            <div class="icon-badge icon-badge-error">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">pending_actions</span>
            </div>
            <span class="badge badge-error text-[10px]">-2.1%</span>
        </div>
        <p class="text-[12px] text-on-surface-variant font-bold mb-1">المبالغ المستحقة</p>
        <h3 class="text-2xl font-bold text-on-surface tracking-tight">8,420</h3>
        <p class="text-[11px] text-on-surface-variant mt-1">ريال سعودي</p>
    </div>

    <div class="billing-stat-card p-6 text-right">
        <div class="flex justify-between items-start mb-4">
            <div class="icon-badge icon-badge-secondary">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">fact_check</span>
            </div>
            <span class="badge badge-success text-[10px]">+5.4%</span>
        </div>
        <p class="text-[12px] text-on-surface-variant font-bold mb-1">الفواتير المحصلة</p>
        <h3 class="text-2xl font-bold text-on-surface tracking-tight">36,860</h3>
        <p class="text-[11px] text-on-surface-variant mt-1">ريال سعودي</p>
    </div>

    <div class="billing-stat-card p-6 text-right">
        <div class="flex justify-between items-start mb-4">
            <div class="icon-badge icon-badge-tertiary">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">description</span>
            </div>
        </div>
        <p class="text-[12px] text-on-surface-variant font-bold mb-1">متوسط قيمة الفاتورة</p>
        <h3 class="text-2xl font-bold text-on-surface tracking-tight">1,200</h3>
        <p class="text-[11px] text-on-surface-variant mt-1">ريال سعودي</p>
    </div>
</div>

{{-- ── Invoices Table ── --}}
<div class="premium-card overflow-hidden">
    <div class="p-5 border-b border-outline-variant flex justify-between items-center select-none">
        <div class="flex gap-2">
            <button class="btn-secondary py-2 px-3">
                <span class="material-symbols-outlined text-[18px]">filter_list</span>
                <span class="text-[13px]">تصفية</span>
            </button>
            <button class="btn-secondary py-2 px-3">
                <span class="material-symbols-outlined text-[18px]">download</span>
                <span class="text-[13px]">تصدير</span>
            </button>
        </div>
        <h2 class="text-[15px] font-bold text-on-surface">الفواتير الأخيرة الصادرة</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="data-table">
            <thead>
                <tr>
                    <th>رقم الفاتورة</th>
                    <th>اسم المريض</th>
                    <th>تاريخ الإصدار</th>
                    <th>المبلغ</th>
                    <th>الحالة</th>
                    <th class="text-left">إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $invoices = [
                        ['num' => '#INV-2024-001', 'patient' => 'أحمد محمد علي', 'initials' => 'أم', 'date' => '14 أكتوبر 2023', 'amount' => '2,450 ر.س', 'status' => 'مدفوع', 'type' => 'success'],
                        ['num' => '#INV-2024-002', 'patient' => 'سارة ناصر السالم', 'initials' => 'سن', 'date' => '12 أكتوبر 2023', 'amount' => '1,800 ر.س', 'status' => 'قيد الانتظار', 'type' => 'pending'],
                        ['num' => '#INV-2024-003', 'patient' => 'خالد خلف الرشيد', 'initials' => 'خخ', 'date' => '08 أكتوبر 2023', 'amount' => '4,200 ر.س', 'status' => 'متأخر', 'type' => 'error'],
                        ['num' => '#INV-2024-004', 'patient' => 'منى فهد الدوسري', 'initials' => 'مف', 'date' => '05 أكتوبر 2023', 'amount' => '850 ر.س', 'status' => 'مدفوع', 'type' => 'success'],
                    ];
                @endphp
                @foreach($invoices as $inv)
                <tr class="invoice-row border-b border-outline-variant last:border-0"
                    onclick="togglePreview('{{ $inv['num'] }}', '{{ $inv['patient'] }}', '{{ $inv['date'] }}', '{{ $inv['amount'] }}', '{{ $inv['status'] }}')"
                >
                    <td class="font-bold text-primary">{{ $inv['num'] }}</td>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-primary/8 flex items-center justify-center text-primary font-bold text-[12px] flex-shrink-0">{{ $inv['initials'] }}</div>
                            <span class="font-semibold text-[14px]">{{ $inv['patient'] }}</span>
                        </div>
                    </td>
                    <td class="text-on-surface-variant text-[13px]">{{ $inv['date'] }}</td>
                    <td class="font-bold text-[14px]">{{ $inv['amount'] }}</td>
                    <td>
                        <span class="badge badge-{{ $inv['type'] }}">{{ $inv['status'] }}</span>
                    </td>
                    <td class="text-left">
                        <button class="header-icon-btn text-on-surface-variant hover:text-primary">
                            <span class="material-symbols-outlined text-[18px]">more_vert</span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="p-4 border-t border-outline-variant flex items-center justify-between select-none">
        <span class="text-[12px] text-on-surface-variant">عرض 4 من أصل 28 فاتورة</span>
        <div class="flex gap-1.5">
            <button class="px-3 py-1.5 border border-outline-variant rounded-lg text-[12px] hover:bg-surface-container transition-colors">السابق</button>
            <button class="px-3 py-1.5 bg-primary text-on-primary rounded-lg text-[12px] shadow-md shadow-primary/20">1</button>
            <button class="px-3 py-1.5 border border-outline-variant rounded-lg text-[12px] hover:bg-surface-container transition-colors">2</button>
            <button class="px-3 py-1.5 border border-outline-variant rounded-lg text-[12px] hover:bg-surface-container transition-colors">التالي</button>
        </div>
    </div>
</div>

{{-- ── Overlay Backdrop ── --}}
<div id="invoice-overlay"></div>

{{-- ── Invoice Preview Drawer ── --}}
<div id="invoicePreview">
    {{-- Drawer Header --}}
    <div class="invoice-drawer-header">
        <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white/15 hover:bg-white/25 transition-colors focus:outline-none" onclick="togglePreview()">
            <span class="material-symbols-outlined text-white text-[20px]">close</span>
        </button>
        <div class="text-right">
            <h3 class="text-[16px] font-bold text-white">تفاصيل الفاتورة</h3>
            <p class="text-primary-fixed-dim text-[12px]">معاينة قبل الطباعة</p>
        </div>
    </div>

    {{-- Drawer Body --}}
    <div class="flex-1 overflow-y-auto p-7 text-right">
        {{-- Branding --}}
        <div class="flex justify-between items-start mb-7 flex-row-reverse">
            <div class="flex items-center gap-2.5">
                <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">dentistry</span>
                </div>
                <div>
                    <p class="font-bold text-[16px] text-primary">دينتيرا</p>
                    <p class="text-[11px] text-on-surface-variant">Dentera Dental ERP</p>
                </div>
            </div>
            <div class="text-left text-[11px] text-on-surface-variant leading-relaxed">
                <p class="font-semibold text-on-surface">عيادة الرياض - العليا</p>
                <p>طريق الملك عبدالله</p>
                <p>finance@dentera.com</p>
                <p>+966 11 000 0000</p>
            </div>
        </div>

        {{-- Invoice Meta --}}
        <div class="mb-7 pb-6 border-b border-dashed border-outline-variant space-y-2.5">
            <div class="flex justify-between flex-row-reverse">
                <span class="text-[12px] text-on-surface-variant">رقم الفاتورة</span>
                <span class="font-bold text-primary" id="drawer-inv-num">#INV-2024-001</span>
            </div>
            <div class="flex justify-between flex-row-reverse">
                <span class="text-[12px] text-on-surface-variant">تاريخ الإصدار</span>
                <span class="text-[13px] font-semibold" id="drawer-inv-date">14/10/2023</span>
            </div>
            <div class="flex justify-between flex-row-reverse">
                <span class="text-[12px] text-on-surface-variant">حالة الفاتورة</span>
                <span class="font-bold text-secondary" id="drawer-inv-status">تم السداد</span>
            </div>
        </div>

        {{-- Patient --}}
        <div class="mb-7">
            <p class="text-[10px] font-bold text-outline uppercase tracking-widest mb-2">بيانات المريض</p>
            <p class="font-bold text-[15px] text-on-surface" id="drawer-patient-name">أحمد محمد علي</p>
            <p class="text-[12px] text-on-surface-variant mt-0.5">رقم الملف: P-88231</p>
        </div>

        {{-- Services --}}
        <div class="mb-7">
            <p class="text-[10px] font-bold text-outline uppercase tracking-widest mb-3">الخدمات المقدمة</p>
            <div class="space-y-2.5">
                <div class="flex justify-between text-[13px] flex-row-reverse border-b border-outline-variant pb-2.5">
                    <span class="font-bold" id="drawer-total-amount">2,450 ر.س</span>
                    <span>تاج زيركون مخصص + كشف دوري</span>
                </div>
                <div class="flex justify-between text-[12px] text-on-surface-variant flex-row-reverse">
                    <span>مشمولة (0.00)</span>
                    <span>ضريبة القيمة المضافة (15%)</span>
                </div>
            </div>
        </div>

        {{-- Totals --}}
        <div class="bg-surface-container-low p-5 rounded-2xl space-y-2.5">
            <div class="flex justify-between text-[13px] flex-row-reverse">
                <span id="drawer-subtotal-amount">2,450 ر.س</span>
                <span class="text-on-surface-variant">المجموع الفرعي</span>
            </div>
            <div class="invoice-divider"></div>
            <div class="flex justify-between font-bold text-[17px] text-primary flex-row-reverse">
                <span id="drawer-total-amount-large">2,450 ر.س</span>
                <span>الإجمالي الكلي</span>
            </div>
        </div>
    </div>

    {{-- Drawer Footer --}}
    <div class="p-5 border-t border-outline-variant flex gap-3 bg-surface-container-low/40">
        <button class="flex-1 btn-secondary justify-center py-3">
            <span class="material-symbols-outlined text-[18px]">print</span>
            <span>طباعة</span>
        </button>
        <button class="flex-1 btn-primary justify-center py-3">
            <span class="material-symbols-outlined text-[18px]">share</span>
            <span>مشاركة</span>
        </button>
    </div>
</div>

@endsection

@push('scripts')
    @vite('resources/js/billing.js')
@endpush
