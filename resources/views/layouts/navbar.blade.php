<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap">
    <link rel="stylesheet" type="text/css" href="..\css\navbar.css">
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('css')
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img width="200px"
                src="https://licorhouse.com/cdn/shop/files/3_Logo_Front_a14bbf09-db24-4dfe-afb7-7be242fe57d4_180x.jpg?v=1613573449"
                alt="Logo de la empresa">
        </div>
        <ul class="nav-list">

            <li class="nav-item"><a href="/principal">Inicio</a></li>
            @if (Auth::user()->rol === 'cliente')
                <li class="nav-item"><a href="{{ route('productos.index') }}">Productos</a></li>
                <li class="nav-item"><a href="{{ route('notaventa.index') }}">Compras</a></li>
            @endif
            @if (Auth::user()->rol === 'admin')
                <li class="nav-item"><a href="/dash">Dashboard</a></li>
            @endif
            @auth
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
        </ul>
    </nav>
    <div class="contenedor">
        @yield('content') <!-- Esta es la sección que se reemplazará en otras vistas -->
    </div>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2023 Licor House</p>
            <ul class="social-links">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
    </footer>

</body>

</html>
