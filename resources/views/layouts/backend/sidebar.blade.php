<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.php" class="sidebar-logo">
            <img src="{{ url('/') }}/assets/images/HeadLogoEagleMediaInformatika.png" alt="site logo" class="light-logo">
            <img src="{{ url('/') }}/assets/images/logo-light.png" alt="site logo" class="dark-logo">
            <img src="{{ url('/') }}/assets/images/logo-icon.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            {{-- <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="index.php"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> AI</a>
                    </li>
                    <li>
                        <a href="index-2.php"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> CRM</a>
                    </li>
                    <li>
                        <a href="index-3.php"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> eCommerce</a>
                    </li>
                    <li>
                        <a href="index-4.php"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Cryptocurrency</a>
                    </li>
                    <li>
                        <a href="index-5.php"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Investment</a>
                    </li>
                </ul>
            </li> --}}
            <li>
                <a href="{{ route('home') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Cooperations</li>
            <li>
                <a href="#">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Cooperation</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Transactions</li>
            <li>
                <a href="#">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Transaction</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">User Managements</li>
            <li>
                <a href="{{ route('users') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
            </li>
            <li class="{{ request()->is('permissions*' ? 'active-page' : null) }}">
                <a href="{{ route('permissions') }}" class="{{ request()->is('permissions*' ? 'active-page' : null) }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Permissions</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Roles</span>
                </a>
            </li>
            {{-- <li class="sidebar-menu-group-title">Application</li>
            <li>
                <a href="email.php">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>Email</span>
                </a>
            </li>
            <li>
                <a href="chat-message.php">
                    <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
                    <span>Chat</span>
                </a>
            </li>
            <li>
                <a href="calendar-main.php">
                    <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                    <span>Calendar</span>
                </a>
            </li>
            <li>
                <a href="kanban.php">
                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                    <span>Kanban</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                    <span>Invoice</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="invoice-list.php"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> List</a>
                    </li>
                    <li>
                        <a href="invoice-preview.php"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Preview</a>
                    </li>
                    <li>
                        <a href="invoice-add.php"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add new</a>
                    </li>
                    <li>
                        <a href="invoice-edit.php"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Edit</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-robot-2-line"></i>
                    <span>Ai Application</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="text-generator.php"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Text Generator</a>
                    </li>
                    <li>
                        <a href="code-generator.php"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Code Generator</a>
                    </li>
                    <li>
                        <a href="image-generator.php"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Image Generator</a>
                    </li>
                    <li>
                        <a href="voice-generator.php"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i> Voice Generator</a>
                    </li>
                    <li>
                        <a href="video-generator.php"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Video Generator</a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</aside>
