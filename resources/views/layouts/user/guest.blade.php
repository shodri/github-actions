<a class="" role="button" data-bs-toggle="dropdown" aria-expanded="true"> 
	<i class="bi bi-globe2 me-lg-4" style="font-size: 1.5rem; color: #666666;"></i>
</a>
<ul class="dropdown-menu">
	@foreach($languages as $language)
	<li>
		<a class="dropdown-item  @if(app()->getLocale() == $language->id) active @endif"
			href="{{ url('/language/'.$language->id) }}">{{ $language->native_name }}</a>
	</li>
	@endforeach
</ul>

<a class="" role="button" data-bs-toggle="dropdown" aria-expanded="true">
	<i class="bi bi-person-circle me-lg-4" style="font-size: 1.5rem; color: #212121;"></i>
</a>
<ul class="dropdown-menu">
	<li><a class="dropdown-item" href="{{ route('login') }}">{{__('Ingresar')}}</a></li>
	<li><a class="dropdown-item" href="{{ route('register') }}">{{__('Registrarse')}}</a></li>
</ul>
