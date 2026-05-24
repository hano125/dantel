<aside id="app-sidebar" class="fixed right-0 top-16 bottom-0 z-40 hidden lg:flex flex-col justify-between overflow-y-auto hide-scrollbar">
    <nav class="flex flex-col pt-5 pb-4">

        <!-- Section: Main -->
        <div class="px-5 mb-3 group-collapsed-hidden">
            <p class="sidebar-section-label">الرئيسية</p>
        </div>

        <div class="space-y-0.5 px-2">
            <!-- لوحة التحكم -->
            <a href="{{ route('dashboard') }}"
               class="sidebar-item flex items-center gap-3.5 px-4 py-3 {{ request()->routeIs('dashboard') ? 'sidebar-item-active' : 'text-on-surface-variant' }}">
                <span class="material-symbols-outlined text-[22px] select-none flex-shrink-0" style="font-variation-settings: 'FILL' {{ request()->routeIs('dashboard') ? '1' : '0' }};">dashboard</span>
                <span class="sidebar-text font-medium whitespace-nowrap">لوحة التحكم</span>
            </a>

            <!-- المواعيد -->
            <a href="{{ route('appointments') }}"
               class="sidebar-item flex items-center gap-3.5 px-4 py-3 {{ request()->routeIs('appointments') ? 'sidebar-item-active' : 'text-on-surface-variant' }}">
                <span class="material-symbols-outlined text-[22px] select-none flex-shrink-0" style="font-variation-settings: 'FILL' {{ request()->routeIs('appointments') ? '1' : '0' }};">calendar_month</span>
                <span class="sidebar-text font-medium whitespace-nowrap">المواعيد</span>
                <span class="sidebar-text mr-auto text-[10px] font-bold bg-primary/10 text-primary px-2 py-0.5 rounded-full">24</span>
            </a>

            <!-- المرضى -->
            <a href="{{ route('patients.show', 1) }}"
               class="sidebar-item flex items-center gap-3.5 px-4 py-3 {{ request()->routeIs('patients.*') ? 'sidebar-item-active' : 'text-on-surface-variant' }}">
                <span class="material-symbols-outlined text-[22px] select-none flex-shrink-0" style="font-variation-settings: 'FILL' {{ request()->routeIs('patients.*') ? '1' : '0' }};">person</span>
                <span class="sidebar-text font-medium whitespace-nowrap">المرضى والملفات الطبية</span>
            </a>

            <!-- الخطط العلاجية -->
            <div class="relative">
                <button type="button" id="sidebar-treatment-trigger"
                        class="sidebar-item w-full flex items-center gap-3.5 px-4 py-3 text-on-surface-variant">
                    <span class="material-symbols-outlined text-[22px] select-none flex-shrink-0">dentistry</span>
                    <span class="sidebar-text font-medium whitespace-nowrap flex-1 text-right">الخطط العلاجية</span>
                    <span id="treatment-arrow" class="sidebar-text material-symbols-outlined text-[18px] text-on-surface-variant transition-transform duration-200">expand_more</span>
                </button>
                <div id="sidebar-treatment-submenu" class="hidden py-1 space-y-0.5">
                    <a href="#" class="flex items-center gap-2.5 py-2.5 px-4 text-[13px] text-on-surface-variant hover:text-primary transition-colors rounded-lg mx-2 hover:bg-primary/5">
                        <span class="material-symbols-outlined text-[15px]">healing</span>
                        <span>علاج تحفظي</span>
                    </a>
                    <a href="#" class="flex items-center gap-2.5 py-2.5 px-4 text-[13px] text-on-surface-variant hover:text-primary transition-colors rounded-lg mx-2 hover:bg-primary/5">
                        <span class="material-symbols-outlined text-[15px]">medications</span>
                        <span>علاج الجذور</span>
                    </a>
                    <a href="#" class="flex items-center gap-2.5 py-2.5 px-4 text-[13px] text-on-surface-variant hover:text-primary transition-colors rounded-lg mx-2 hover:bg-primary/5">
                        <span class="material-symbols-outlined text-[15px]">surgical</span>
                        <span>الجراحة والزراعة</span>
                    </a>
                    <a href="#" class="flex items-center gap-2.5 py-2.5 px-4 text-[13px] text-on-surface-variant hover:text-primary transition-colors rounded-lg mx-2 hover:bg-primary/5">
                        <span class="material-symbols-outlined text-[15px]">straighten</span>
                        <span>تقويم الأسنان</span>
                    </a>
                </div>
            </div>

            <!-- الفواتير -->
            <a href="{{ route('billing') }}"
               class="sidebar-item flex items-center gap-3.5 px-4 py-3 {{ request()->routeIs('billing') ? 'sidebar-item-active' : 'text-on-surface-variant' }}">
                <span class="material-symbols-outlined text-[22px] select-none flex-shrink-0" style="font-variation-settings: 'FILL' {{ request()->routeIs('billing') ? '1' : '0' }};">payments</span>
                <span class="sidebar-text font-medium whitespace-nowrap">الفواتير والمالية</span>
            </a>
        </div>

        <!-- Divider -->
        <div class="sidebar-divider my-4"></div>

        <!-- Section: Management -->
        <div class="px-5 mb-3 group-collapsed-hidden">
            <p class="sidebar-section-label">الإدارة العامة</p>
        </div>

        <div class="space-y-0.5 px-2">
            <a href="#" class="sidebar-item flex items-center gap-3.5 px-4 py-3 text-on-surface-variant">
                <span class="material-symbols-outlined text-[22px] select-none flex-shrink-0">inventory_2</span>
                <span class="sidebar-text font-medium whitespace-nowrap">المخزون والطلبات</span>
            </a>
            <a href="#" class="sidebar-item flex items-center gap-3.5 px-4 py-3 text-on-surface-variant">
                <span class="material-symbols-outlined text-[22px] select-none flex-shrink-0">analytics</span>
                <span class="sidebar-text font-medium whitespace-nowrap">التقارير والإحصائيات</span>
            </a>
            <a href="#" class="sidebar-item flex items-center gap-3.5 px-4 py-3 text-on-surface-variant">
                <span class="material-symbols-outlined text-[22px] select-none flex-shrink-0">group</span>
                <span class="sidebar-text font-medium whitespace-nowrap">إدارة الفريق الطبي</span>
            </a>
        </div>
    </nav>

    <!-- Sidebar Bottom -->
    <div class="p-3 border-t border-outline-variant bg-surface-container-low/40">
        <!-- Clinic Info Card -->
        <div class="group-collapsed-hidden mb-3 p-3 bg-primary/5 border border-primary/10 rounded-xl text-right">
            <p class="text-[11px] font-bold text-primary">فرع الرياض - العليا</p>
            <p class="text-[10px] text-on-surface-variant mt-0.5">5 أطباء نشطون الآن</p>
        </div>
        <a href="#" class="sidebar-item flex items-center gap-3.5 px-4 py-2.5 text-on-surface-variant">
            <span class="material-symbols-outlined text-[22px] select-none flex-shrink-0">settings</span>
            <span class="sidebar-text font-medium whitespace-nowrap">الإعدادات العامة</span>
        </a>
        <a href="#" class="sidebar-item flex items-center gap-3.5 px-4 py-2.5 text-on-surface-variant">
            <span class="material-symbols-outlined text-[22px] select-none flex-shrink-0">help</span>
            <span class="sidebar-text font-medium whitespace-nowrap">المساعدة والدعم</span>
        </a>
    </div>
</aside>
