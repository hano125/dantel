<aside id="app-sidebar" class="fixed right-0 top-16 bottom-0 w-sidebar-width bg-surface-container-lowest border-l border-outline-variant z-40 hidden lg:flex flex-col justify-between overflow-y-auto transition-all duration-300">
    <nav class="flex flex-col py-6">
        <!-- Main Links Group -->
        <div class="px-6 mb-4 flex justify-between items-center group-collapsed-hidden">
            <p class="text-label-md font-label-md text-outline uppercase tracking-wider">الرئيسية</p>
        </div>

        <div class="space-y-1 px-3">
            <!-- لوحة التحكم -->
            <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-lg transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'sidebar-item-active text-primary font-bold bg-primary/5' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                <span class="material-symbols-outlined select-none" style="font-variation-settings: 'FILL' {{ request()->routeIs('dashboard') ? '1' : '0' }};">dashboard</span>
                <span class="sidebar-text text-body-md whitespace-nowrap">لوحة التحكم</span>
            </a>

            <!-- المواعيد -->
            <a href="{{ route('appointments') }}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-lg transition-colors duration-200 {{ request()->routeIs('appointments') ? 'sidebar-item-active text-primary font-bold bg-primary/5' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                <span class="material-symbols-outlined select-none" style="font-variation-settings: 'FILL' {{ request()->routeIs('appointments') ? '1' : '0' }};">calendar_month</span>
                <span class="sidebar-text text-body-md whitespace-nowrap">المواعيد</span>
            </a>

            <!-- المرضى -->
            <a href="{{ route('patients.show', 1) }}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-lg transition-colors duration-200 {{ request()->routeIs('patients.*') ? 'sidebar-item-active text-primary font-bold bg-primary/5' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                <span class="material-symbols-outlined select-none" style="font-variation-settings: 'FILL' {{ request()->routeIs('patients.*') ? '1' : '0' }};">person</span>
                <span class="sidebar-text text-body-md whitespace-nowrap">المرضى والملف الطبي</span>
            </a>

            <!-- الخطط العلاجية Collapsible Nested Menu -->
            <div class="relative">
                <button type="button" id="sidebar-treatment-trigger" class="w-full flex items-center justify-between gap-4 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-colors duration-200">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined select-none">dentistry</span>
                        <span class="sidebar-text text-body-md whitespace-nowrap">الخطط العلاجية</span>
                    </div>
                    <span id="treatment-arrow" class="sidebar-text material-symbols-outlined text-[16px] transition-transform duration-200">expand_more</span>
                </button>
                <div id="sidebar-treatment-submenu" class="hidden pr-10 pl-4 py-1 space-y-1">
                    <a href="#" class="block py-2 text-sm text-on-surface-variant hover:text-primary transition-colors">علاج تحفظي</a>
                    <a href="#" class="block py-2 text-sm text-on-surface-variant hover:text-primary transition-colors">علاج الجذور</a>
                    <a href="#" class="block py-2 text-sm text-on-surface-variant hover:text-primary transition-colors">الجراحة والزراعة</a>
                    <a href="#" class="block py-2 text-sm text-on-surface-variant hover:text-primary transition-colors">تقويم الأسنان</a>
                </div>
            </div>

            <!-- الفواتير -->
            <a href="{{ route('billing') }}" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-lg transition-colors duration-200 {{ request()->routeIs('billing') ? 'sidebar-item-active text-primary font-bold bg-primary/5' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                <span class="material-symbols-outlined select-none" style="font-variation-settings: 'FILL' {{ request()->routeIs('billing') ? '1' : '0' }};">payments</span>
                <span class="sidebar-text text-body-md whitespace-nowrap">الفواتير والمدفوعات</span>
            </a>
        </div>

        <div class="border-t border-outline-variant my-4 mx-4"></div>

        <!-- Management Group -->
        <div class="px-6 mb-4 group-collapsed-hidden">
            <p class="text-label-md font-label-md text-outline uppercase tracking-wider">الإدارة العامة</p>
        </div>

        <div class="space-y-1 px-3">
            <!-- المخزون -->
            <a href="#" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-colors duration-200">
                <span class="material-symbols-outlined select-none">inventory_2</span>
                <span class="sidebar-text text-body-md whitespace-nowrap">المخزون والطلبات</span>
            </a>

            <!-- التقارير -->
            <a href="#" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-colors duration-200">
                <span class="material-symbols-outlined select-none">analytics</span>
                <span class="sidebar-text text-body-md whitespace-nowrap">التقارير والإحصائيات</span>
            </a>
        </div>
    </nav>

    <!-- Sidebar Bottom Section -->
    <div class="p-4 border-t border-outline-variant">
        <a href="#" class="sidebar-item flex items-center gap-4 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low transition-colors duration-200">
            <span class="material-symbols-outlined select-none">settings</span>
            <span class="sidebar-text text-body-md whitespace-nowrap">الإعدادات</span>
        </a>
    </div>
</aside>
