<nav class="flex text-label-md text-on-surface-variant gap-1.5 items-center mb-6 overflow-x-auto whitespace-nowrap select-none">
    <a href="{{ route('dashboard') }}" class="hover:text-primary transition-colors flex items-center gap-1">
        <span class="material-symbols-outlined text-[16px] {{ request()->routeIs('dashboard') ? 'text-primary' : '' }}">home</span>
        <span>الرئيسية</span>
    </a>
    
    @if(!request()->routeIs('dashboard'))
        <span class="material-symbols-outlined text-[14px] text-outline">chevron_left</span>
        @if(request()->routeIs('appointments'))
            <span class="text-on-surface font-bold">إدارة المواعيد وقائمة الانتظار</span>
        @elseif(request()->routeIs('patients.*'))
            <span class="hover:text-primary transition-colors cursor-pointer">المرضى</span>
            <span class="material-symbols-outlined text-[14px] text-outline">chevron_left</span>
            <span class="text-on-surface font-bold">الملف الطبي للمريض (#DT-8921)</span>
        @elseif(request()->routeIs('billing'))
            <span class="text-on-surface font-bold">إدارة الفواتير والمالية</span>
        @endif
    @endif
</nav>
