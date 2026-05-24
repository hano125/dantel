<nav class="flex text-[12px] text-on-surface-variant gap-1.5 items-center mb-6 overflow-x-auto whitespace-nowrap select-none">
    <a href="{{ route('dashboard') }}" class="hover:text-primary transition-colors flex items-center gap-1 font-medium">
        <span class="material-symbols-outlined text-[15px]">home</span>
        <span>الرئيسية</span>
    </a>

    @if(!request()->routeIs('dashboard'))
        <span class="material-symbols-outlined text-[13px] text-outline">chevron_left</span>
        @if(request()->routeIs('appointments'))
            <span class="font-semibold text-on-surface">المواعيد</span>
        @elseif(request()->routeIs('patients.*'))
            <a href="#" class="hover:text-primary transition-colors">المرضى</a>
            <span class="material-symbols-outlined text-[13px] text-outline">chevron_left</span>
            <span class="font-semibold text-on-surface">الملف الطبي (#DT-8921)</span>
        @elseif(request()->routeIs('billing'))
            <span class="font-semibold text-on-surface">الفواتير والمالية</span>
        @endif
    @endif
</nav>
