@extends('layouts.app')

@section('title', 'Dentera | إدارة المواعيد وقائمة الانتظار')

@push('styles')
    @vite('resources/css/appointments.css')
@endpush

@section('content')
<!-- Header & View Switcher -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 select-none">
    <div class="text-right">
        <h2 class="font-headline-md text-headline-md text-on-surface">إدارة المواعيد وقائمة الانتظار</h2>
        <p class="text-body-md text-on-surface-variant">جدولة الحالات، وتحديث قائمة الانتظار الحية للأطباء</p>
    </div>
    
    <!-- Kanban / Calendar Toggles -->
    <div class="flex items-center gap-2 bg-surface-container p-1 rounded-lg border border-outline-variant">
        <button id="calendarToggle" class="px-4 py-2 rounded-md font-title-md text-title-md transition-all flex items-center gap-2 text-on-surface-variant hover:bg-surface-container-lowest focus:outline-none">
            <span class="material-symbols-outlined text-[18px]">calendar_view_day</span>
            <span>عرض التقويم</span>
        </button>
        <button id="kanbanToggle" class="px-4 py-2 rounded-md font-title-md text-title-md transition-all flex items-center gap-2 bg-primary text-on-primary shadow-sm focus:outline-none">
            <span class="material-symbols-outlined text-[18px]">view_column</span>
            <span>لوحة كانبان</span>
        </button>
    </div>
</div>

<!-- Filters Bar -->
<div class="bg-surface-container-lowest p-4 rounded-xl border border-outline-variant flex flex-wrap items-end gap-4 shadow-sm mb-8 select-none">
    <div class="flex flex-col gap-1 min-w-[200px] text-right">
        <label class="text-label-md text-on-surface-variant mr-1">الفرع الحالي</label>
        <div class="relative">
            <select class="w-full bg-background border border-outline-variant rounded-lg py-2.5 pr-4 pl-10 appearance-none text-body-md focus:ring-primary focus:border-primary outline-none">
                <option>جميع الفروع والمراكز</option>
                <option>فرع الرياض - العليا</option>
                <option>فرع جدة - الروضة</option>
            </select>
            <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant pointer-events-none">expand_more</span>
        </div>
    </div>
    
    <div class="flex flex-col gap-1 min-w-[200px] text-right">
        <label class="text-label-md text-on-surface-variant mr-1">الطبيب المعالج</label>
        <div class="relative">
            <select class="w-full bg-background border border-outline-variant rounded-lg py-2.5 pr-4 pl-10 appearance-none text-body-md focus:ring-primary focus:border-primary outline-none">
                <option>جميع الأطباء والأخصائيين</option>
                <option>د. أحمد سمير (أخصائي تقويم)</option>
                <option>د. سارة خالد (علاج جذور)</option>
                <option>د. خالد العمر (جراحة وزراعة)</option>
            </select>
            <span class="material-symbols-outlined absolute left-3 top-3 text-on-surface-variant pointer-events-none">expand_more</span>
        </div>
    </div>
    
    <div class="flex flex-col gap-1 min-w-[150px] text-right">
        <label class="text-label-md text-on-surface-variant mr-1">تاريخ المواعيد</label>
        <button class="flex items-center justify-between gap-4 bg-background border border-outline-variant rounded-lg py-2.5 px-4 text-body-md hover:bg-surface-container transition-colors focus:outline-none">
            <span>اليوم، {{ date('d F') }}</span>
            <span class="material-symbols-outlined text-on-surface-variant">calendar_today</span>
        </button>
    </div>
    
    <div class="flex-1"></div>
    
    <button class="bg-primary text-on-primary px-6 py-3 rounded-lg font-title-md text-title-md flex items-center gap-2 shadow-md hover:bg-primary-container transition-all active:scale-95">
        <span class="material-symbols-outlined">add</span>
        <span>حجز موعد جديد</span>
    </button>
</div>

<!-- 1. Kanban Board view -->
<div id="kanbanBoard" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter items-start select-none">
    <!-- Column: Waiting (في الانتظار) -->
    <div class="kanban-col-drop flex flex-col gap-4 bg-surface-container-low p-4 rounded-xl border border-outline-variant" id="col-waiting">
        <div class="flex items-center justify-between px-2">
            <div class="flex items-center gap-2">
                <div class="w-2 h-6 bg-tertiary rounded-full"></div>
                <h3 class="font-title-lg text-title-lg">في الانتظار</h3>
                <span class="col-badge bg-surface-container-lowest text-on-surface-variant text-label-md px-2 py-0.5 rounded-full font-bold">2</span>
            </div>
            <button class="material-symbols-outlined text-on-surface-variant hover:text-primary">more_horiz</button>
        </div>
        
        <div class="kanban-col-cards flex flex-col gap-3 min-h-[300px]">
            <!-- Card 1 -->
            <div id="card-otaibi" draggable="true" class="kanban-card bg-surface-container-lowest border border-outline-variant p-4 rounded-xl hover:border-primary shadow-sm text-right">
                <div class="flex justify-between items-start mb-3">
                    <span class="text-label-md font-bold text-primary">تنظيف أسنان وتلميع</span>
                    <span class="text-label-md text-on-surface-variant">10:30 ص</span>
                </div>
                <h4 class="font-title-md text-title-md mb-1 font-bold">محمد العتيبي</h4>
                <div class="flex items-center gap-2 text-label-md text-on-surface-variant justify-end">
                    <span>د. سارة خالد</span>
                    <span class="material-symbols-outlined text-sm">person_outline</span>
                </div>
                <div class="mt-4 pt-3 border-t border-outline-variant flex justify-between items-center">
                    <span class="bg-surface-container-high text-on-surface-variant text-[10px] px-2 py-0.5 rounded font-bold">مريض جديد</span>
                    <div class="w-6 h-6 rounded-full bg-primary text-[10px] text-on-primary flex items-center justify-center font-bold">MA</div>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div id="card-abdullah" draggable="true" class="kanban-card bg-surface-container-lowest border border-outline-variant p-4 rounded-xl hover:border-primary shadow-sm text-right">
                <div class="flex justify-between items-start mb-3">
                    <span class="text-label-md font-bold text-primary">كشف دوري</span>
                    <span class="text-label-md text-on-surface-variant">11:15 ص</span>
                </div>
                <h4 class="font-title-md text-title-md mb-1 font-bold">ليلى عبدالله</h4>
                <div class="flex items-center gap-2 text-label-md text-on-surface-variant justify-end">
                    <span>د. أحمد سمير</span>
                    <span class="material-symbols-outlined text-sm">person_outline</span>
                </div>
                <div class="mt-4 pt-3 border-t border-outline-variant flex justify-between items-center">
                    <span class="bg-error-container text-error text-[10px] px-2 py-0.5 rounded font-bold">حالة طارئة</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Column: In Progress (قيد العلاج) -->
    <div class="kanban-col-drop flex flex-col gap-4 bg-surface-container-low p-4 rounded-xl border border-outline-variant" id="col-progress">
        <div class="flex items-center justify-between px-2">
            <div class="flex items-center gap-2">
                <div class="w-2 h-6 bg-primary rounded-full"></div>
                <h3 class="font-title-lg text-title-lg">قيد العلاج</h3>
                <span class="col-badge bg-primary-fixed text-primary text-label-md px-2 py-0.5 rounded-full font-bold">1</span>
            </div>
            <button class="material-symbols-outlined text-on-surface-variant">more_horiz</button>
        </div>
        
        <div class="kanban-col-cards flex flex-col gap-3 min-h-[300px]">
            <!-- Active treatment card -->
            <div id="card-nasser" draggable="true" class="kanban-card bg-surface-container-lowest border-2 border-primary p-4 rounded-xl shadow-md relative overflow-hidden text-right">
                <div class="absolute top-0 right-0 left-0 h-1 bg-primary animate-pulse"></div>
                <div class="flex justify-between items-start mb-3">
                    <span class="text-label-md font-bold text-primary">تقويم أسنان</span>
                    <div class="flex items-center gap-1 text-primary animate-pulse">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">timer</span>
                        <span class="text-label-md font-bold">15:00</span>
                    </div>
                </div>
                <h4 class="font-title-md text-title-md mb-1 font-bold">فهد ناصر السديري</h4>
                <div class="flex items-center gap-2 text-label-md text-on-surface-variant justify-end">
                    <span>د. أحمد سمير</span>
                    <span class="material-symbols-outlined text-sm">person_outline</span>
                </div>
                <div class="mt-4 flex gap-2">
                    <button class="flex-1 bg-surface-container text-on-surface text-label-md py-1.5 rounded hover:bg-surface-container-high transition-colors font-bold">تفاصيل</button>
                    <button class="flex-1 bg-primary text-on-primary text-label-md py-1.5 rounded hover:bg-primary-container transition-colors font-bold">إنهاء الجلسة</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Column: Completed (مكتمل) -->
    <div class="kanban-col-drop flex flex-col gap-4 bg-surface-container-low p-4 rounded-xl border border-outline-variant" id="col-completed">
        <div class="flex items-center justify-between px-2">
            <div class="flex items-center gap-2">
                <div class="w-2 h-6 bg-secondary rounded-full"></div>
                <h3 class="font-title-lg text-title-lg">مكتمل</h3>
                <span class="col-badge bg-secondary-container text-on-secondary-container text-label-md px-2 py-0.5 rounded-full font-bold">1</span>
            </div>
            <button class="material-symbols-outlined text-on-surface-variant">more_horiz</button>
        </div>
        
        <div class="kanban-col-cards flex flex-col gap-3 min-h-[300px]">
            <div id="card-shehri" class="bg-surface-container-lowest border border-outline-variant p-4 rounded-xl opacity-75 grayscale-[0.3] text-right">
                <div class="flex justify-between items-start mb-3">
                    <span class="text-label-md font-bold text-on-surface-variant">حشوة تجميلية</span>
                    <span class="material-symbols-outlined text-secondary text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                </div>
                <h4 class="font-title-md text-title-md mb-1 font-bold">نورة الشهري</h4>
                <p class="text-label-md text-on-surface-variant">انتهى العلاج في 09:45 ص</p>
            </div>
        </div>
    </div>

    <!-- Column: Cancelled (ملغي) -->
    <div class="kanban-col-drop flex flex-col gap-4 bg-surface-container-low p-4 rounded-xl border border-outline-variant" id="col-cancelled">
        <div class="flex items-center justify-between px-2">
            <div class="flex items-center gap-2">
                <div class="w-2 h-6 bg-error rounded-full"></div>
                <h3 class="font-title-lg text-title-lg">ملغي</h3>
                <span class="col-badge bg-error-container text-on-error-container text-label-md px-2 py-0.5 rounded-full font-bold">1</span>
            </div>
            <button class="material-symbols-outlined text-on-surface-variant">more_horiz</button>
        </div>
        
        <div class="kanban-col-cards flex flex-col gap-3 min-h-[300px]">
            <div id="card-qahtani" class="bg-surface-container-lowest border border-outline-variant p-4 rounded-xl opacity-75 border-dashed text-right">
                <div class="flex justify-between items-start mb-3">
                    <span class="text-label-md font-bold text-error">زراعة أسنان (جلسة 1)</span>
                    <span class="material-symbols-outlined text-error text-sm">cancel</span>
                </div>
                <h4 class="font-title-md text-title-md mb-1 font-bold">ياسر القحطاني</h4>
                <p class="text-label-md text-on-surface-variant italic">ألغي بطلب هاتفي من المريض</p>
            </div>
        </div>
    </div>
</div>

<!-- 2. Empty State/Calendar view (Hidden by default) -->
<div id="calendarView" class="hidden bg-surface-container-lowest border border-outline-variant rounded-xl p-gutter min-h-[500px] flex flex-col shadow-sm select-none">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <button class="p-2 hover:bg-surface-container rounded-full focus:outline-none"><span class="material-symbols-outlined">chevron_right</span></button>
            <h3 class="font-headline-md text-headline-md font-bold">مايو 2026</h3>
            <button class="p-2 hover:bg-surface-container rounded-full focus:outline-none"><span class="material-symbols-outlined">chevron_left</span></button>
        </div>
        
        <div class="flex gap-2">
            <button class="px-4 py-1.5 border border-outline-variant rounded-lg text-label-md hover:bg-surface-container transition-colors">يوم</button>
            <button class="px-4 py-1.5 bg-primary text-on-primary rounded-lg text-label-md shadow">أسبوع</button>
            <button class="px-4 py-1.5 border border-outline-variant rounded-lg text-label-md hover:bg-surface-container transition-colors">شهر</button>
        </div>
    </div>

    <div class="grid grid-cols-7 border-t border-r border-outline-variant flex-grow">
        <!-- Calendar Grid Header -->
        <div class="p-4 text-center border-b border-l border-outline-variant font-bold text-on-surface-variant bg-surface-container-low">الأحد</div>
        <div class="p-4 text-center border-b border-l border-outline-variant font-bold text-on-surface-variant bg-surface-container-low">الاثنين</div>
        <div class="p-4 text-center border-b border-l border-outline-variant font-bold text-on-surface-variant bg-surface-container-low">الثلاثاء</div>
        <div class="p-4 text-center border-b border-l border-outline-variant font-bold text-on-surface-variant bg-surface-container-low">الأربعاء</div>
        <div class="p-4 text-center border-b border-l border-outline-variant font-bold text-on-surface-variant bg-surface-container-low">الخميس</div>
        <div class="p-4 text-center border-b border-l border-outline-variant font-bold text-on-surface-variant bg-surface-container-low">الجمعة</div>
        <div class="p-4 text-center border-b border-l border-outline-variant font-bold text-on-surface-variant bg-surface-container-low">السبت</div>
        
        <!-- Render 31 Calendar Grid Items -->
        @for($i = 1; $i <= 31; $i++)
            <div class="p-2 min-h-[120px] border-b border-l border-outline-variant hover:bg-surface-container-low/20 transition-colors relative group text-right">
                <span class="text-label-md font-bold {{ $i === 24 ? 'bg-primary text-on-primary w-6 h-6 flex items-center justify-center rounded-full' : 'text-on-surface-variant' }}">{{ $i }}</span>
                @if($i === 24)
                    <div class="mt-2 space-y-1.5">
                        <div class="bg-primary-container text-on-primary-container p-1.5 rounded text-[10px] font-bold truncate">10:30 - محمد العتيبي</div>
                        <div class="bg-secondary-container text-on-secondary-container p-1.5 rounded text-[10px] font-bold truncate">11:15 - ليلى عبدالله</div>
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
