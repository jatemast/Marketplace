<!--- Sidebar Container --->
<div id="sidebar-container" class="fixed inset-0 pointer-events-none z-[9999]">
    <div id="sidebar-overlay" class="absolute inset-0 hidden transition-opacity duration-300 ease-in-out pointer-events-auto bg-gray-800/50"></div>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 w-16 h-screen transition-all duration-300 ease-in-out transform pointer-events-auto sm:translate-x-0"
        aria-label="Sidebar">
        <div class="flex flex-col h-full px-3 py-4 text-gray-800 shadow-lg bg-amber-400">
            <div class="flex items-center mb-6 ml-1">
                <div class="flex flex-col items-center mt-20">
                    <!-- Logo Section -->







            <ul id="sidebar-menu" class="flex-grow space-y-4 font-medium">
                <li>
                    <a href="{{ url('/dashboard') }}"
                        class="flex items-center p-2 transition-all duration-200 rounded-lg hover:bg-amber-300 group hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="ml-3 transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('productos.create') }}"
                        class="flex items-center p-2 transition-all duration-200 rounded-lg hover:bg-amber-300 group hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span class="ml-3 transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100">Add Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('historial.compras') }}"
                        class="flex items-center p-2 transition-all duration-200 rounded-lg hover:bg-amber-300 group hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span class="ml-3 transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100">Purchase History</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('productos.index') }}"
                        class="flex items-center p-2 transition-all duration-200 rounded-lg hover:bg-amber-300 group hover:scale-105">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z"/>
                          </svg>
                        <span class="ml-3 transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100">Productos</span>
                    </a>
                </li>
                <li>
                    <a href="{{  route('user-management.index') }}"
                        class="flex items-center p-2 transition-all duration-200 rounded-lg hover:bg-amber-300 group hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="ml-3 transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100">User Management</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>
<!--- Toggle Button --->
<div class="fixed z-[10000] top-4 left-4">
    <button id="toggle-sidebar" class="flex items-center justify-center w-10 h-10 p-2 transition-colors duration-200 rounded-full shadow-lg bg-amber-500 hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-400">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</div>

<style>
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-5px); }
        100% { transform: translateY(0px); }
    }

    .float-animation {
        animation: float 3s ease-in-out infinite;
    }
</style>

<script>
    const sidebar = document.getElementById('default-sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const toggleButton = document.getElementById('toggle-sidebar');
    const menuItems = document.querySelectorAll('#sidebar-menu span');
    const sidebarLogo = document.getElementById('sidebar-logo');

    function toggleSidebar() {
        sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-16');
        sidebarOverlay.classList.toggle('hidden');

        if (sidebar.classList.contains('w-64')) {
            menuItems.forEach(item => {
                item.classList.remove('opacity-0');
                item.classList.add('opacity-100');
            });
            sidebarLogo.classList.remove('w-[50px]', 'h-[50px]');
            sidebarLogo.classList.add('w-[70px]', 'h-[70px]', 'float-animation');
        } else {
            menuItems.forEach(item => {
                item.classList.add('opacity-0');
                item.classList.remove('opacity-100');
            });
            sidebarLogo.classList.remove('w-[70px]', 'h-[70px]', 'float-animation');
            sidebarLogo.classList.add('w-[50px]', 'h-[50px]');
        }
    }

    toggleButton.addEventListener('click', toggleSidebar);
    sidebarOverlay.addEventListener('click', toggleSidebar);

    // Close sidebar on mobile when clicking a menu item
    menuItems.forEach(item => {
        item.closest('a').addEventListener('click', () => {
            if (window.innerWidth < 640 && sidebar.classList.contains('w-64')) {
                toggleSidebar();
            }
        });
    });

    // Adjust sidebar on window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 640) {
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-16');
            sidebarOverlay.classList.add('hidden');
            menuItems.forEach(item => {
                item.classList.add('opacity-0');
                item.classList.remove('opacity-100');
            });
            sidebarLogo.classList.remove('w-[70px]', 'h-[70px]', 'float-animation');
            sidebarLogo.classList.add('w-[50px]', 'h-[50px]');
        }
    });
</script>
