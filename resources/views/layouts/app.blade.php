<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestor ADSO')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { max-width: 1100px; margin: 24px auto; padding: 0 16px; font-family: system-ui, sans-serif; }
        nav { display: flex; gap: 12px; align-items: center; flex-wrap: wrap; margin-bottom: 18px; }
        nav form { display: inline; }
        .flash { background: #e6ffed; padding: 10px; border-radius: 8px; margin: 10px 0; }
        .danger { background: #ffecec; padding: 10px; border-radius: 8px; margin: 10px 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 7px; text-align: left; }
    </style>
</head>
<body>
    <nav>
        @auth
            <a href="{{ route('aprendices.index') }}">Aprendices</a>
            <span>Hola, {{ auth()->user()->name }}</span>

            @if (Route::has('profile.edit'))
                <a href="{{ route('profile.edit') }}">Perfil</a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Salir</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}">Iniciar sesión</a>
            <a href="{{ route('register') }}">Registrarse</a>
        @endguest
    </nav>

    @if (session('ok'))
        <div class="flash">{{ session('ok') }}</div>
    @endif

    @if (session('error'))
        <div class="danger">{{ session('error') }}</div>
    @endif

    @isset($header)
        <header>{{ $header }}</header>
    @endisset

    <main>
        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset
    </main>
</body>
</html>
