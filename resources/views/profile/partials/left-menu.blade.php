<h5>{{ __('Profile') }}</h5>

<ul class="nav flex-column">
    <li class="nav-item">
        <a href="{{ route('profile.edit') }}">Editar mis datos personales</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('password.edit') }}">Cambio de clave</a>
    </li>
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Cerrar mi sesion') }}
            </a>
        </form>        
    </li>
</ul>
