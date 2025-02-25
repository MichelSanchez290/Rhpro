<div>
    <div class="flex items-center justify-between size-16 w-full bg-white border-b border-gray-300 shadow-md px-4">
    <!-- Botón para alternar el menú lateral -->
    <div id="sidebarMenu" class="flex items-center" style="margin-left: 260px;">
        <button id="sidebarToggle" wire:click="toggleSidebar" class="text-gray-800 focus:outline-none focus:text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>



    <!-- Otros elementos de la barra superior (opcional) -->
    <div class="flex items-center space-x-4">
        <!-- Icono de notificaciones -->
        <button class="text-gray-800 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </button>

        <!-- Avatar del usuario -->
        <div class="relative">
            <button class="focus:outline-none">
                <img src="https://via.placeholder.com/40" alt="Usuario" class="w-10 h-10 rounded-full">
            </button>
        </div>
    </div>
</div>
</div>