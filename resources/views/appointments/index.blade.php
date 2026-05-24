@extends('layouts.app')

@section('title', 'Dentera | إدارة المواعيد وقائمة الانتظار')

@push('styles')
    @vite('resources/css/appointments.css')
@endpush

@section('content')

{{-- ── Page Header ── --}}
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 select-none">
    <div class="text-right">
        <h1 class="text-2xl font-bold text-on-surface tracking-tight">إدارة المواعيد</h1>
        <p class="text-sm text-on-surface-variant mt-1">جدولة الحالات وتحديث قائمة الانتظار الحية</p>
    </div>

    {{-- View Toggle --}}
    <div class="flex items-center gap-2 bg-surface-container border border-outline-variant p-1 rounded-xl">
        <button id="calendarToggle" class="view-toggle-btn text-on-surface-variant hover:bg-surface-container-lowest">
            <span class="material-symbols-outlined text-[18px]">calendar_view_day</span>
            <span>التقويم</span>
        </button>
        <button id="kanbanToggle" class="view-toggle-btn active">
            <span class="material-symbols-outlined text-[18px]">view_column</span>
            <span>كانبان</span>
        </button>
    </div>
</div>

{{-- ── Filters Bar ── --}}
<div class="filters-bar p-4 flex flex-wrap items-end gap-4 mb-7 select-none">
    <div class="flex flex-col gap-1.5 min-w-[190px] text-right">
        <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">الفرع</label>
        <div class="relative">
            <select class="form-input appearance-none pr-4 pl-9 py-2.5 text-[13px]">
                <option>جميع الفروع</option>
                <option>فرع الرياض - العليا</option>
                <option>فرع جدة - الروضة</option>
            </select>
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[18px]">expand_more</span>
        </div>
    </div>

    <div class="flex flex-col gap-1.5 min-w-[190px] text-right">
        <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">الطبيب</label>
        <div class="relative">
            <select class="form-input appearance-none pr-4 pl-9 py-2.5 text-[13px]">
                <option>جميع الأطباء</option>
                <option>د. أحمد سمير (تقويم)</option>
                <option>د. سارة خالد (جذور)</option>
                <option>د. خالد العمر (جراحة)</option>
            </select>
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[18px]">expand_more</span>
        </div>
    </div>

    <div class="flex flex-col gap-1.5 min-w-[150px] text-right">
        <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">التاريخ</label>
        <button class="form-input flex items-center justify-between gap-3 py-2.5 text-[13px] hover:border-primary transition-colors">
            <span>اليوم، {{ date('d F') }}</span>
            <span class="material-symbols-outlined text-on-surface-variant text-[18px]">calendar_today</span>
        </button>
    </div>

    <div class="flex-1"></div>

    <button class="btn-primary">
        <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">add</span>
        <span>حجز موعد</span>
    </button>
</div>

{{-- ── Kanban Board ── --}}
<div id="kanbanBoard" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 items-start select-none">

    {{-- Column: Waiting --}}
    <div class="kanban-col-drop flex flex-col gap-3 p-4" id="col-waiting">
        <div class="flex items-center justify-between px-1 mb-1">
            <div class="flex items-center gap-2">
                <div class="kanban-status-dot bg-amber-400"></div>
                <h3 class="text-[14px] font-bold text-on-surface">في الانتظار</h3>
                <span class="col-badge text-[11px] font-bold bg-amber-100 text-amber-700 px-2.5 py-0.5 rounded-full">2</span>
            </div>
            <button class="header-icon-btn text-on-surface-variant">
                <span class="material-symbols-outlined text-[18px]">more_horiz</span>
            </button>
        </div>

        <div class="kanban-col-cards flex flex-col gap-3 min-h-[320px]">
            <div id="card-otaibi" draggable="true" class="kanban-card p-4 text-right">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[11px] font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full border border-amber-200">في الانتظار</span>
                    <span class="text-[12px] text-on-surface-variant">10:30 ص</span>
                </div>
                <h4 class="text-[14px] font-bold text-on-surface mb-1">محمد العتيبي</h4>
                <p class="text-[12px] text-primary font-semibold mb-3">تنظيف أسنان وتلميع</p>
                <div class="flex justify-between items-center border-t border-outline-variant pt-3">
                    <div class="w-7 h-7 rounded-lg bg-primary text-[10px] text-on-primary flex items-center justify-center font-bold">MA</div>
                    <div class="flex items-center gap-1.5 text-[11px] text-on-surface-variant">
                        <span>د. سارة خالد</span>
                        <span class="material-symbols-outlined text-[14px]">person_outline</span>
                    </div>
                </div>
                <span class="inline-block mt-2 text-[10px] font-bold bg-surface-container text-on-surface-variant px-2 py-0.5 rounded">مريض جديد</span>
            </div>

            <div id="card-abdullah" draggable="true" class="kanban-card p-4 text-right">
                <div class="flex justify-between items-center mb-3">
                    <span class="badge badge-error text-[10px]">حالة طارئة</span>
                    <span class="text-[12px] text-on-surface-variant">11:15 ص</span>
                </div>
                <h4 class="text-[14px] font-bold text-on-surface mb-1">ليلى عبدالله</h4>
                <p class="text-[12px] text-primary font-semibold mb-3">كشف دوري</p>
                <div class="flex justify-between items-center border-t border-outline-variant pt-3">
                    <div></div>
                    <div class="flex items-center gap-1.5 text-[11px] text-on-surface-variant">
                        <span>د. أحمد سمير</span>
                        <span class="material-symbols-outlined text-[14px]">person_outline</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Column: In Progress --}}
    <div class="kanban-col-drop flex flex-col gap-3 p-4" id="col-progress">
        <div class="flex items-center justify-between px-1 mb-1">
            <div class="flex items-center gap-2">
                <div class="kanban-status-dot bg-primary animate-pulse-ring"></div>
                <h3 class="text-[14px] font-bold text-on-surface">قيد العلاج</h3>
                <span class="col-badge text-[11px] font-bold bg-primary/10 text-primary px-2.5 py-0.5 rounded-full">1</span>
            </div>
            <button class="header-icon-btn text-on-surface-variant">
                <span class="material-symbols-outlined text-[18px]">more_horiz</span>
            </button>
        </div>

        <div class="kanban-col-cards flex flex-col gap-3 min-h-[320px]">
            <div id="card-nasser" draggable="true" class="kanban-card kanban-card-active p-4 relative overflow-hidden text-right">
                <div class="absolute top-0 right-0 left-0 h-1.5 bg-gradient-to-r from-primary to-primary-light"></div>
                <div class="flex justify-between items-center mb-3 mt-1">
                    <div class="flex items-center gap-1.5 text-primary">
                        <span class="material-symbols-outlined text-[14px] animate-pulse" style="font-variation-settings: 'FILL' 1;">timer</span>
                        <span class="text-[13px] font-bold">15:00</span>
                    </div>
                    <span class="text-[11px] font-bold text-primary bg-primary/8 px-2.5 py-1 rounded-full border border-primary/15">جاري العلاج</span>
                </div>
                <h4 class="text-[14px] font-bold text-on-surface mb-1">فهد ناصر السديري</h4>
                <p class="text-[12px] text-primary font-semibold mb-3">تقويم أسنان</p>
                <div class="flex items-center gap-1.5 text-[11px] text-on-surface-variant justify-end mb-4">
                    <span>د. أحمد سمير</span>
                    <span class="material-symbols-outlined text-[14px]">person_outline</span>
                </div>
                <div class="flex gap-2">
                    <button class="flex-1 py-2 bg-surface-container text-on-surface-variant text-[12px] font-semibold rounded-lg hover:bg-surface-container-high transition-colors">تفاصيل</button>
                    <button class="flex-1 py-2 bg-primary text-on-primary text-[12px] font-semibold rounded-lg hover:bg-primary-container transition-colors">إنهاء الجلسة</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Column: Completed --}}
    <div class="kanban-col-drop flex flex-col gap-3 p-4" id="col-completed">
        <div class="flex items-center justify-between px-1 mb-1">
            <div class="flex items-center gap-2">
                <div class="kanban-status-dot bg-secondary"></div>
                <h3 class="text-[14px] font-bold text-on-surface">مكتمل</h3>
                <span class="col-badge text-[11px] font-bold bg-secondary/10 text-secondary px-2.5 py-0.5 rounded-full">1</span>
            </div>
            <button class="header-icon-btn text-on-surface-variant">
                <span class="material-symbols-outlined text-[18px]">more_horiz</span>
            </button>
        </div>

        <div class="kanban-col-cards flex flex-col gap-3 min-h-[320px]">
            <div id="card-shehri" class="kanban-card p-4 opacity-75 text-right">
                <div class="flex justify-between items-center mb-3">
                    <span class="material-symbols-outlined text-secondary text-[20px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    <span class="text-[12px] text-on-surface-variant">09:45 ص</span>
                </div>
                <h4 class="text-[14px] font-semibold text-on-surface mb-1">نورة الشهري</h4>
                <p class="text-[12px] text-on-surface-variant font-semibold mb-2">حشوة تجميلية</p>
                <p class="text-[11px] text-on-surface-variant">انتهى العلاج في 09:45 ص</p>
            </div>
        </div>
    </div>

    {{-- Column: Cancelled --}}
    <div class="kanban-col-drop flex flex-col gap-3 p-4" id="col-cancelled">
        <div class="flex items-center justify-between px-1 mb-1">
            <div class="flex items-center gap-2">
                <div class="kanban-status-dot bg-error"></div>
                <h3 class="text-[14px] font-bold text-on-surface">ملغي</h3>
                <span class="col-badge text-[11px] font-bold bg-error-container text-error px-2.5 py-0.5 rounded-full">1</span>
            </div>
            <button class="header-icon-btn text-on-surface-variant">
                <span class="material-symbols-outlined text-[18px]">more_horiz</span>
            </button>
        </div>

        <div class="kanban-col-cards flex flex-col gap-3 min-h-[320px]">
            <div id="card-qahtani" class="kanban-card p-4 opacity-70 border-dashed text-right">
                <div class="flex justify-between items-center mb-3">
                    <span class="material-symbols-outlined text-error text-[20px]">cancel</span>
                    <span class="text-[12px] text-on-surface-variant">ملغي</span>
                </div>
                <h4 class="text-[14px] font-semibold text-on-surface mb-1">ياسر القحطاني</h4>
                <p class="text-[12px] text-error font-semibold mb-2">زراعة أسنان (جلسة 1)</p>
                <p class="text-[11px] text-on-surface-variant italic">ألغي بطلب هاتفي من المريض</p>
            </div>
        </div>
    </div>
</div>

{{-- ── Calendar View (Hidden) ── --}}
<div id="calendarView" class="hidden premium-card p-6 min-h-[600px] flex flex-col select-none">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <button class="header-icon-btn text-on-surface-variant">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
            <h3 class="text-lg font-bold text-on-surface">مايو 2026</h3>
            <button class="header-icon-btn text-on-surface-variant">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
        </div>
        <div class="flex gap-2">
            @foreach(['يوم','أسبوع','شهر'] as $view)
            <button class="px-4 py-1.5 {{ $view === 'أسبوع' ? 'bg-primary text-on-primary shadow-md shadow-primary/20' : 'border border-outline-variant text-on-surface-variant hover:bg-surface-container' }} rounded-lg text-[12px] font-semibold transition-all">{{ $view }}</button>
            @endforeach
        </div>
    </div>

    <div class="grid grid-cols-7 border-t border-r border-outline-variant flex-grow rounded-xl overflow-hidden">
        @foreach(['الأحد','الاثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت'] as $day)
        <div class="p-3 text-center text-[12px] font-bold text-on-surface-variant border-b border-l border-outline-variant bg-surface-container-low">{{ $day }}</div>
        @endforeach

        @for($i = 1; $i <= 31; $i++)
        <div class="p-2 min-h-[110px] border-b border-l border-outline-variant hover:bg-primary/3 transition-colors relative text-right {{ $i === 24 ? 'cal-today' : '' }}">
            <span class="text-[12px] font-bold inline-flex items-center justify-center {{ $i === 24 ? 'w-6 h-6 bg-primary text-on-primary rounded-full' : 'text-on-surface-variant' }}">{{ $i }}</span>
            @if($i === 24)
            <div class="mt-1.5 space-y-1">
                <div class="bg-primary/10 text-primary p-1.5 rounded-md text-[10px] font-bold truncate border border-primary/15">10:30 - محمد العتيبي</div>
                <div class="bg-secondary/10 text-secondary p-1.5 rounded-md text-[10px] font-bold truncate border border-secondary/15">11:15 - ليلى عبدالله</div>
            </div>
            @endif
        </div>
        @endfor
    </div>
</div>

@endsection

@push('scripts')
    @vite('resources/js/appointments.js')
    @vite('resources/js/queue.js')
@endpush
