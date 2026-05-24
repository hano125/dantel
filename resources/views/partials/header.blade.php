<header class="fixed top-0 left-0 right-0 h-16 bg-surface border-b border-outline-variant flex justify-between items-center px-gutter w-full backdrop-blur-md bg-opacity-95 z-50">
    <!-- Right side: Branding & Mobile Menu Toggle -->
    <div class="flex items-center gap-4">
        <!-- Sidebar Toggle for Mobile/Desktop Collapse -->
        <button id="sidebar-toggle-btn" class="p-2 hover:bg-surface-container rounded-full transition-all focus:outline-none select-none">
            <span class="material-symbols-outlined text-on-surface-variant text-[24px]">menu</span>
        </button>
        
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary text-3xl font-bold" style="font-variation-settings: 'FILL' 1;">dentistry</span>
            <span class="font-headline-md text-headline-md font-bold text-primary">دينتيرا <span class="text-xs bg-primary-fixed text-primary px-2 py-0.5 rounded-full select-none">Dental ERP</span></span>
        </div>
    </div>

    <!-- Center side: Search Input -->
    <div class="flex-1 max-w-xl px-8 hidden md:block">
        <div class="relative group">
            <span class="material-symbols-outlined absolute right-3 top-2.5 text-on-surface-variant pointer-events-none select-none">search</span>
            <input type="text" class="w-full bg-surface-container-low border border-outline-variant rounded-full py-2 pr-10 pl-4 focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-body-md" placeholder="البحث عن مرضى، مواعيد، أو ملفات طبية..."/>
        </div>
    </div>

    <!-- Left side: Icons, Switches & Doctor Profile -->
    <div class="flex items-center gap-4">
        <!-- Clinic Switcher -->
        <div class="relative hidden sm:block">
            <button id="clinic-switcher-btn" class="flex items-center gap-2 px-3 py-1.5 bg-surface-container-low border border-outline-variant rounded-lg text-body-md hover:bg-surface-container transition-all">
                <span class="material-symbols-outlined text-[18px]">domain</span>
                <span>فرع الرياض - العليا</span>
                <span class="material-symbols-outlined text-[16px]">expand_more</span>
            </button>
            <div id="clinic-switcher-dropdown" class="hidden absolute left-0 mt-2 w-56 bg-surface-container-lowest border border-outline-variant rounded-xl shadow-xl py-2 z-50">
                <button class="w-full text-right px-4 py-2 hover:bg-surface-container text-body-md text-primary font-bold">فرع الرياض - العليا</button>
                <button class="w-full text-right px-4 py-2 hover:bg-surface-container text-body-md">فرع جدة - الروضة</button>
                <button class="w-full text-right px-4 py-2 hover:bg-surface-container text-body-md">العيادة المركزية</button>
            </div>
        </div>

        <!-- Dark Mode Toggle -->
        <button id="dark-mode-toggle" class="p-2 hover:bg-surface-container rounded-full transition-colors select-none">
            <span class="material-symbols-outlined text-on-surface-variant" id="dark-mode-icon">light_mode</span>
        </button>

        <!-- Notifications Indicator -->
        <div class="relative">
            <button id="notifications-btn" class="p-2 hover:bg-surface-container rounded-full transition-colors relative select-none">
                <span class="material-symbols-outlined text-on-surface-variant">notifications</span>
                <span class="absolute top-2 left-2 w-2.5 h-2.5 bg-error rounded-full border border-surface"></span>
            </button>
            <div id="notifications-dropdown" class="hidden absolute left-0 mt-2 w-80 bg-surface-container-lowest border border-outline-variant rounded-xl shadow-xl py-4 z-50">
                <div class="px-4 pb-2 border-b border-outline-variant flex justify-between items-center">
                    <span class="font-bold text-title-md">الإشعارات الحالية</span>
                    <button class="text-xs text-primary hover:underline">تحديد كمقروء</button>
                </div>
                <div class="max-h-64 overflow-y-auto">
                    <a href="#" class="block px-4 py-3 hover:bg-surface-container border-b border-outline-variant">
                        <p class="text-xs text-on-surface-variant mb-1">موعد متأخر</p>
                        <p class="text-sm font-bold">المريض ياسر حسين متأخر عن موعده 15 دقيقة</p>
                    </a>
                    <a href="#" class="block px-4 py-3 hover:bg-surface-container border-b border-outline-variant">
                        <p class="text-xs text-on-surface-variant mb-1">المخزون</p>
                        <p class="text-sm">تنبيه: كمية مخدر موضعي قاربت على النفاد (متبقي 5)</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Language Switcher -->
        <div class="relative">
            <button id="lang-switcher-btn" class="p-2 hover:bg-surface-container rounded-full transition-colors flex items-center justify-center select-none">
                <span class="material-symbols-outlined text-on-surface-variant text-[20px]">language</span>
                <span class="text-xs font-bold mr-1">AR</span>
            </button>
            <div id="lang-switcher-dropdown" class="hidden absolute left-0 mt-2 w-32 bg-surface-container-lowest border border-outline-variant rounded-xl shadow-xl py-1 z-50">
                <button class="w-full text-center px-4 py-2 hover:bg-surface-container text-body-md text-primary font-bold">العربية (AR)</button>
                <button class="w-full text-center px-4 py-2 hover:bg-surface-container text-body-md">English (EN)</button>
            </div>
        </div>

        <div class="h-8 w-px bg-outline-variant mx-2"></div>

        <!-- Doctor Profile Dropdown -->
        <div class="relative">
            <button id="profile-dropdown-btn" class="flex items-center gap-3 hover:bg-surface-container p-1 rounded-lg transition-all">
                <div class="text-left hidden lg:block text-xs">
                    <p class="font-bold text-on-surface">د. أحمد سمير</p>
                    <p class="text-on-surface-variant text-[10px]">أخصائي تقويم أسنان</p>
                </div>
                <img class="w-9 h-9 rounded-full border border-outline-variant object-cover" alt="Dr. Ahmed Samir" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVk-DarJYIDgMt5--5WMXXXHMfKGSCHaoiynWIb_nvGJAnOMn-5YI9FN3FSbyJrtn38MZ5g_lJA4_GtIXgn_VULMrGK-72ya1iFZwxVawtgZoRe2I6ISK3u1uwUNe1KA8PzNpFsY4ugJYBI_MixgoAHUDEPgc5jEZTfQeRjEXhgxPfbO3siKDQQALPVZvbs1DcjQD3iLepIl4dHS05O-jgalmFQ8nA9Rml3gevFtBuJvToEKV2NVMQdL72m6sd4GzU4EWpkbmQPmQ"/>
            </button>
            
            <div id="profile-dropdown" class="hidden absolute left-0 mt-2 w-48 bg-surface-container-lowest border border-outline-variant rounded-xl shadow-xl py-2 z-50">
                <div class="px-4 py-2 border-b border-outline-variant mb-2">
                    <p class="font-bold text-sm">د. أحمد سمير</p>
                    <p class="text-xs text-on-surface-variant">ahmad@dentera.com</p>
                </div>
                <a href="#" class="block px-4 py-2 hover:bg-surface-container text-body-md">الملف الشخصي</a>
                <a href="#" class="block px-4 py-2 hover:bg-surface-container text-body-md">الإعدادات الطبية</a>
                <div class="border-t border-outline-variant my-1"></div>
                <form action="{{ route('login') }}" method="GET" class="w-full">
                    <button type="submit" class="w-full text-right px-4 py-2 hover:bg-error-container/20 text-error text-body-md font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">logout</span>
                        <span>تسجيل الخروج</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
