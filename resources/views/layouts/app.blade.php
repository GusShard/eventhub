<a class="navbar-brand" href="{{ route('events.index') }}">
    EventHub
</a>

<ul class="navbar-nav me-auto">
    @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('events.index') }}">Eventos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('subscriptions.index') }}">Minhas inscrições</a>
        </li>

        @if(auth()->user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Administração</a>
            </li>
        @endif
    @endauth
</ul>

<ul class="navbar-nav ms-auto">
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Entrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Criar conta</a>
        </li>
    @else
        <li class="nav-item">
            <span class="nav-link">{{ auth()->user()->name }}</span>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link nav-link">Sair</button>
            </form>
        </li>
    @endguest
</ul>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <p>Verifique os dados informados:</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@yield('content')