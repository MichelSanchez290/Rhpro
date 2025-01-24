<div class="layout-container">
    <style>
        /* Reset */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }

        /* Barra superior */
        .top-bar {
            background-color: #0078D7;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .top-bar span {
            font-size: 16px;
        }

        /* Barra lateral */
        .side-bar {
            background-color: #1C3D5A; /* Azul marino */
            color: white;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 50px; /* Desplazamiento bajo la barra superior */
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .side-bar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .side-bar li {
            position: relative;
        }

        .side-bar li a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .side-bar li a:hover {
            background-color: #123048; /* Azul marino más oscuro */
        }

        .side-bar .dropdown-content {
            display: none;
            background-color: #123048; /* Azul marino más oscuro */
            padding-left: 20px;
        }

        .side-bar .dropdown-content li {
            padding: 10px 0;
        }

        .side-bar .dropdown.active .dropdown-content {
            display: block;
        }

        /* Ícono de flecha */
        .side-bar .dropdown-toggle i {
            margin-left: auto;
            transition: transform 0.3s ease;
            color: white; /* Flechas en blanco */
        }

        .side-bar .dropdown.active .dropdown-toggle i {
            transform: rotate(180deg);
        }

        /* Contenido principal */
        .content {
            margin-left: 250px; /* Espacio igual al ancho de la barra lateral */
            margin-top: 50px; /* Espacio bajo la barra superior */
            padding: 20px;
            flex: 1; /* Se expande automáticamente para ocupar el espacio restante */
            overflow-x: auto;
        }
    </style>

    <!-- Barra superior -->
    <div class="top-bar">
        <span>Usuario</span>
    </div>

    <!-- Barra lateral -->
    <div class="side-bar">
        <ul>
            <li class="dropdown">
                <a class="dropdown-toggle">
                    Empresas
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-content">
                    <li>
                        <x-nav-link class="fas fa-building" href="{{ route('mostrarempresas') }}" :active="request()->routeIs('mostrarempresas')">
                            {{ __('Mostrar Empresa') }}
                        </x-nav-link>
                    </li>
                    <li><a href="#">Opción 2</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle">
                    Sucursales
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-content">
                    <li>
                        <x-nav-link class="fas fa-building" href="{{ route('mostrarsucursal') }}" :active="request()->routeIs('mostrarsucursal')">
                            {{ __('Mostrar Sucursales') }}
                        </x-nav-link>
                    </li>

                    <li><a href="#">Opción 2</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle">
                    Registros Patronales
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-content">
                    <li><a href="#">Opción 1</a></li>
                    <li><a href="#">Opción 2</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle">
                    Documentación
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-content">
                    <li><a href="#">Opción 1</a></li>
                    <li><a href="#">Opción 2</a></li>
                </ul>
            </li>
        </ul>
    </div>

    

    <!-- JavaScript -->
    <script>
        const dropdowns = document.querySelectorAll('.dropdown');

        dropdowns.forEach(dropdown => {
            dropdown.querySelector('.dropdown-toggle').addEventListener('click', () => {
                dropdown.classList.toggle('active');
            });
        });
    </script>

    <!-- Agregar Font Awesome para los íconos -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</div>
