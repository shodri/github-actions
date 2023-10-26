<a class=" position-relative" role="button" data-bs-toggle="dropdown" aria-expanded="true">
    <i class="bi bi-bell me-lg-4" style="font-size: 1.5rem; color: #666666;"></i>
    <span class="position-absolute top-0 start-0 translate-middle p-1 bg-danger border border-light rounded-circle">
        <span class="visually-hidden">New alerts</span>
    </span>
</a>
<ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#"><small><b>NOVEDADES</b></small></a></li>
    <li><a class="dropdown-item" href="#"><small>1 Nueva Propuesta</small></a></li>
    <li><a class="dropdown-item" href="#"><small>2 Nuevas Cotizaciones</small></a></li>
</ul>

<a class="" data-bs-toggle="offcanvas" data-bs-target="#login-menu" aria-controls="login-menu"
    aria-label="Toggle navigation">
    <img class="rounded-circle " src="{{asset('/storage/images/'.(Auth::user()->picture ?? '_profile-no.jpg'))}}" style="width:35px;height:35px">
    <i class="bi bi-list me-md-4" style="font-size: 1.5rem; color: #212121;"></i>
</a>

<div class="offcanvas offcanvas-end" tabindex="-1" id="login-menu" aria-labelledby="offcanvasNavbarDarkLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <h5>{{Auth::user()->name}}</h5>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <a class="btn btn-sm btn-outline-secondary rounded-pill me-3" href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();">
                <b>{{__('SALIR')}} <i class="bi bi-door-closed-fill"></i></b>
            </a>
        </form>
    </div>
    <div class="offcanvas-body px-3">

        <ul class="list-unstyled ps-0">
            <li class="">
                <button class="nav-link fw-bold btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    Cuenta: Usuario
                </button>
                <div class="collapse" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li><a href="{{ route('profile.edit') }}" class="nav-link fw-bold"><i
                                    class="bi bi-person me-2"></i> {{__('Datos Personales')}}</a></li>
                        <li><a href="{{ route('password.edit') }}" class="nav-link fw-bold"><i class="bi bi-key me-2"></i> Cambiar
                                Clave</a></li>
                        <li><a href="usr-favoritos" class="nav-link fw-bold"><i class="bi bi-heart me-2"></i>
                                Favoritos</a></li>
                        <li><a href="usr-busquedas" class="nav-link fw-bold"><i class="bi bi-search me-2"></i> Búsquedas
                                Guardadas</a></li>
                        <li><a href="usr-cotizaciones" class="nav-link fw-bold"><i class="bi bi-card-text me-2"></i> Mis
                                Cotizaciones</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="">
                <button class="nav-link fw-bold btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Cuenta: Desarrollador
                </button>
                <div class="collapse" id="dashboard-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li><a href="{{ route('profile.developer') }}" class="nav-link fw-bold"><i class="bi bi-building me-2"></i> Datos
                                Desarrolladora</a></li>
                        <li><a href="list-staff" class="nav-link fw-bold"><i class="bi bi-people me-2"></i> Staff
                                Profesional</a></li>
                        <li><a href="list-desa-invit" class="nav-link fw-bold"><i class="bi bi-arrow-repeat me-2"></i>
                                Comunicaciones</a></li>
                        <li><a href="des-lista" class="nav-link fw-bold"><i class="bi bi-houses me-2"></i>
                                Desarrollos</a></li>
                        <li><a href="planes-desa" class="nav-link fw-bold"><i class="bi bi-megaphone me-2"></i>
                                Planes</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="">
                <button class="nav-link fw-bold btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#inmo-collapse" aria-expanded="false">
                    Cuenta: Inmobiliaria
                </button>
                <div class="collapse" id="inmo-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li><a href="usr-inmobiliaria" class="nav-link fw-bold"><i class="bi bi-building me-2"></i>
                                Datos Inmobiliaria</a></li>
                        <li><a href="list-agentes" class="nav-link fw-bold"><i class="bi bi-people me-2"></i>
                                Agentes</a></li>
                        <li><a href="#" class="nav-link fw-bold link-secondary"><i class="bi bi-houses me-2"></i>
                                Desarrollos</a></li>
                        <li><a href="list-inmo-invit" class="nav-link fw-bold"><i class="bi bi-arrow-repeat me-2"></i>
                                Propuestas</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="">
                <button class="nav-link fw-bold btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#agente-collapse" aria-expanded="false">
                    Cuenta: Agente
                </button>
                <div class="collapse" id="agente-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li><a href="usr-agente" class="nav-link fw-bold"><i class="bi bi-person me-2"></i> Datos
                                Personales</a></li>
                        <li><a href="list-agente-props" class="nav-link fw-bold"><i class="bi bi-houses me-2"></i> Mis
                                Asignaciones</a></li>
                        <li><a href="list-agente-invit" class="nav-link fw-bold"><i class="bi bi-arrow-repeat me-2"></i>
                                Propuestas</a></li>
                        <li><a href="#" class="nav-link fw-bold link-secondary"><i class="bi bi-award me-2"></i> Mi
                                Reputación</a></li>
                        <li><a href="#" class="nav-link fw-bold link-secondary"><i class="bi bi-card-text me-2"></i> Mis
                                Cotizaciones</a></li>
                    </ul>
                </div>
            </li>
            </li>
            <li class="border-top my-3"></li>
            <li class="">
                <button class="nav-link fw-bold btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#prove-collapse" aria-expanded="false">
                    Cuenta: Proveedor
                </button>
                <div class="collapse" id="prove-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li><a href="usr-proved" class="nav-link fw-bold"><i class="bi bi-person me-2"></i> Datos
                                Personales</a></li>
                        <li><a href="list-staff-prov" class="nav-link fw-bold"><i class="bi bi-people me-2"></i> Staff
                                Profesional</a></li>
                        <li><a href="list-prov-invit" class="nav-link fw-bold"><i class="bi bi-arrow-repeat me-2"></i>
                                Propuestas</a></li>
                        <li><a href="#" class="nav-link fw-bold link-secondary"><i class="bi bi-award me-2"></i> Mi
                                Reputación</a></li>
                    </ul>
                </div>
            </li>


            <li class="border-top my-3"></li>

        </ul>
    </div>
</div>