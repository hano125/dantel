<header id="app-header" class="fixed top-0 left-0 right-0 h-16 flex justify-between items-center px-6 w-full z-50">
    <!-- Right side: Branding & Mobile Menu Toggle -->
    <div class="flex items-center gap-3">
        <!-- Sidebar Toggle -->
        <button id="sidebar-toggle-btn" class="header-icon-btn text-on-surface-variant focus:outline-none" aria-label="فتح/إغلاق الشريط الجانبي">
            <span class="material-symbols-outlined text-[22px]">menu</span>
        </button>

        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 group">
            <div class="w-9 h-9 bg-gradient-to-br from-primary to-primary-light rounded-xl flex items-center justify-center shadow-md shadow-primary/30 header-brand-icon group-hover:shadow-primary/50 transition-shadow">
                <span class="material-symbols-outlined text-white text-[20px]" style="font-variation-settings: 'FILL' 1;">dentistry</span>
            </div>
            <div class="flex flex-col leading-tight">
                <span class="font-bold text-primary text-[15px] tracking-tight">دينتيرا</span>
                <span class="text-[10px] text-on-surface-variant font-medium">Dental ERP</span>
            </div>
        </a>
    </div>

    <!-- Center: Search Input -->
    <div class="flex-1 max-w-lg px-6 hidden md:block">
        <div class="header-search relative flex items-center">
            <span class="material-symbols-outlined absolute right-4 text-on-surface-variant text-[20px] pointer-events-none select-none">search</span>
            <input
                type="text"
                id="global-search"
                class="w-full bg-transparent py-2.5 pr-11 pl-4 outline-none text-[14px] text-on-surface placeholder:text-on-surface-variant"
                placeholder="البحث عن مرضى، مواعيد..."
            />
            <span class="absolute left-4 text-[11px] text-outline bg-surface-container px-2 py-0.5 rounded-md font-mono select-none">⌘K</span>
        </div>
    </div>

    <!-- Left side: Actions & Profile -->
    <div class="flex items-center gap-1.5">

        <!-- Clinic Switcher -->
        <div class="relative hidden sm:block">
            <button id="clinic-switcher-btn" class="clinic-chip flex items-center gap-2 focus:outline-none">
                <span class="material-symbols-outlined text-[16px] text-primary">domain</span>
                <span class="text-[13px] font-semibold">الرياض - العليا</span>
                <span class="material-symbols-outlined text-[14px] text-on-surface-variant transition-transform duration-200" id="clinic-arrow">expand_more</span>
            </button>
            <div id="clinic-switcher-dropdown" class="hidden header-dropdown absolute left-0 mt-2 w-52 py-1.5 z-50">
                <div class="px-4 py-2 border-b border-outline-variant mb-1">
                    <p class="text-[11px] font-bold text-outline uppercase tracking-wider">اختيار الفرع</p>
                </div>
                <button class="header-dropdown-item w-full text-primary font-bold flex items-center gap-2">
                    <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    <span>الرياض - العليا</span>
                </button>
                <button class="header-dropdown-item w-full flex items-center gap-2 text-on-surface">
                    <span class="material-symbols-outlined text-[16px] opacity-0">check_circle</span>
                    <span>جدة - الروضة</span>
                </button>
                <button class="header-dropdown-item w-full flex items-center gap-2 text-on-surface">
                    <span class="material-symbols-outlined text-[16px] opacity-0">check_circle</span>
                    <span>العيادة المركزية</span>
                </button>
            </div>
        </div>

        <!-- Divider -->
        <div class="h-6 w-px bg-outline-variant mx-1.5 hidden sm:block"></div>

        <!-- Dark Mode Toggle -->
        <button id="dark-mode-toggle" class="header-icon-btn focus:outline-none" aria-label="تبديل الوضع الداكن">
            <span class="material-symbols-outlined text-on-surface-variant text-[20px]" id="dark-mode-icon">light_mode</span>
        </button>

        <!-- Notifications -->
        <div class="relative">
            <button id="notifications-btn" class="header-icon-btn relative focus:outline-none" aria-label="الإشعارات">
                <span class="material-symbols-outlined text-on-surface-variant text-[20px]">notifications</span>
                <span class="notif-dot"></span>
            </button>
            <div id="notifications-dropdown" class="hidden header-dropdown absolute left-0 mt-2 w-80 py-0 z-50">
                <div class="px-5 py-3 border-b border-outline-variant flex justify-between items-center bg-surface-container-low/50">
                    <button class="text-[12px] text-primary hover:underline font-semibold">تحديد الكل كمقروء</button>
                    <span class="font-bold text-[14px]">الإشعارات</span>
                </div>
                <div class="max-h-72 overflow-y-auto">
                    <a href="#" class="block px-5 py-3.5 hover:bg-surface-container-low border-b border-outline-variant transition-colors">
                        <div class="flex items-start gap-3 flex-row-reverse">
                            <div class="w-9 h-9 rounded-full bg-error/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="material-symbols-outlined text-error text-[18px]">schedule</span>
                            </div>
                            <div class="text-right flex-1">
                                <p class="text-[11px] font-bold text-error mb-0.5">موعد متأخر</p>
                                <p class="text-[13px] font-semibold text-on-surface">ياسر حسين متأخر 15 دقيقة</p>
                                <p class="text-[11px] text-on-surface-variant mt-1">منذ 5 دقائق</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block px-5 py-3.5 hover:bg-surface-container-low transition-colors">
                        <div class="flex items-start gap-3 flex-row-reverse">
                            <div class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="material-symbols-outlined text-primary text-[18px]">inventory_2</span>
                            </div>
                            <div class="text-right flex-1">
                                <p class="text-[11px] font-bold text-primary mb-0.5">تنبيه المخزون</p>
                                <p class="text-[13px] font-semibold text-on-surface">مخدر موضعي قارب على النفاد (5 متبقي)</p>
                                <p class="text-[11px] text-on-surface-variant mt-1">منذ ساعة</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="p-3 border-t border-outline-variant">
                    <button class="w-full text-center text-[13px] text-primary font-semibold hover:underline py-1">عرض كل الإشعارات</button>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="h-6 w-px bg-outline-variant mx-1.5"></div>

        <!-- Doctor Profile Dropdown -->
        <div class="relative">
            <button id="profile-dropdown-btn" class="flex items-center gap-2.5 hover:bg-surface-container rounded-xl p-1.5 transition-all focus:outline-none">
                <div class="text-right hidden lg:block">
                    <p class="text-[13px] font-bold text-on-surface leading-tight">د. أحمد سمير</p>
                    <p class="text-[10px] text-on-surface-variant">أخصائي تقويم</p>
                </div>
                <img
                    class="w-9 h-9 rounded-xl object-cover avatar-ring"
                    alt="Dr. Ahmed Samir"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVk-DarJYIDgMt5--5WMXXXHMfKGSCHaoiynWIb_nvGJAnOMn-5YI9FN3FSbyJrtn38MZ5g_lJA4_GtIXgn_VULMrGK-72ya1iFZwxVawtgZoRe2I6ISK3u1uwUNe1KA8PzNpFsY4ugJYBI_MixgoAHUDEPgc5jEZTfQeRjEXhgxPfbO3siKDQQALPVZvbs1DcjQD3iLepIl4dHS05O-jgalmFQ8nA9Rml3gevFtBuJvToEKV2NVMQdL72m6sd4GzU4EWpkbmQPmQ"
                />
                <span class="material-symbols-outlined text-[16px] text-on-surface-variant hidden lg:block">expand_more</span>
            </button>

            <div id="profile-dropdown" class="hidden header-dropdown absolute left-0 mt-2 w-52 py-1.5 z-50">
                <div class="px-4 py-3 border-b border-outline-variant mb-1 text-right">
                    <p class="font-bold text-[13px] text-on-surface">د. أحمد سمير</p>
                    <p class="text-[11px] text-on-surface-variant mt-0.5">ahmad@dentera.com</p>
                </div>
                <a href="#" class="header-dropdown-item flex items-center gap-2 text-on-surface">
                    <span class="material-symbols-outlined text-[17px] text-on-surface-variant">person</span>
                    <span>الملف الشخصي</span>
                </a>
                <a href="#" class="header-dropdown-item flex items-center gap-2 text-on-surface">
                    <span class="material-symbols-outlined text-[17px] text-on-surface-variant">medical_services</span>
                    <span>الإعدادات الطبية</span>
                </a>
                <div class="border-t border-outline-variant my-1"></div>
                <form action="{{ route('login') }}" method="GET">
                    <button type="submit" class="header-dropdown-item w-full flex items-center gap-2 text-error font-bold hover:bg-error-container/20">
                        <span class="material-symbols-outlined text-[17px]">logout</span>
                        <span>تسجيل الخروج</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
