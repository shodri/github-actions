@extends('layouts.app')

@section('content')
<div class="container-fluid p-4" style="background-image: url(../images/bg2-add.jpg);  height: 600px;  background-position: left; background-repeat: no-repeat;">
<div class="p-lg-5">

<h1 class="yank display-5 text-center">Crear un <span class="fw-bold">Perfil</span> en Onpropify</h1>
<h4 class="mb-4 text-center">En Onpropify congregamos a todos los actores<br>del rubro inmobiliario </h4>

<p class="mb-4 text-center">Si sos parte de la <b>cadena de valor</b> de éste rubro, seleccioná a continuación <b>tu perfil</b>.</p>

				

<div class="row mb-3 mt-lg-5">
              <div class="col-lg-6  mt-lg-5 d-flex justify-content-center">
			  
			  <div class="form-floating mb-2">
                  <a class="btn btn-sm btn-outline-secondary" href="{{ route('developers.create') }}">Alta Desarrollador</a>
			  </div>
				
				
              </div>
			  
              <div class="col-sm-12 col-lg-6">
				
				<style>
				.subcontent{
				display:none;
				}
				</style>
				
				<div id="div0" class="subcontent" style="display: block;">
					<h3><b>Bienvenido</b></h3>
					<p>Si sos parte de la <b>cadena de valor</b> de éste rubro, seleccioná a continuación <b>tu perfil</b>.
					<p>Onpropify es una plataforma que concentra todos los desarrollos inmobiliarios Residenciales, Comerciales, Industriales en etapa de Pre Venta, En construcción y Terminados listos para mudarse.
					<p></p>
				</div>
				
				<div id="div1" class="subcontent">
					<h3><b>Desarrollador</b></h3>
					<p>Los <b>desarrolladores</b> podrán mostrar sus proyectos con la información más detallada y actualizada logrando una comunicación directa con todos los sectores y administrando su proyecto con todo el equipo.
					<p><a class="btn btn-md btn-primary mt-2" href="usr-empresa">Crear Perfil <i style="float:right;" class="bi bi-chevron-right ms-1"></i></a></p>
				</div>
				
				<div id="div2" class="subcontent">
					<h3><b>Inmobiliaria</b></h3>
					<p>Las <b>inmobiliarias</b> podrán sumarse a esos proyectos logrando un seguimiento en vivo de los contactos generados, reservas, ventas, material de marketing, contratos y documentos del proyecto y podrá ver actualizaciones de información al instante por parte del desarrollador.
					<p><a class="btn btn-md btn-primary mt-2" href="usr-inmobiliaria">Crear Perfil <i style="float:right;" class="bi bi-chevron-right ms-1"></i></a></p>
				</div>
				<div id="div3" class="subcontent">
					<h3><b>Agente</b></h3>
					<p>Los <b>agentes</b> podrán ser parte del staff de venta de un proyecto o podrán registrarse para buscar las mejores opciones para sus clientes, guardar búsquedas, generar búsquedas automáticas, comercializar proyectos en otros países y recibir comisión.
					<p><a class="btn btn-md btn-primary mt-2" href="usr-agente">Crear Perfil <i style="float:right;" class="bi bi-chevron-right ms-1"></i></a></p>
				</div>
				<div id="div4" class="subcontent">
					<h3><b>Profesional</b></h3>
					<p>Los <b>profesionales</b> como Arquitectos, Paisajistas, diseñadores de interiores, escribanos, Abogados, empresas de mudanza, empresa de muebles, constructores y más podrán sumarse a los proyectos que participan para ser visualizados y generar visitas a su perfil donde podrán exponer información, trabajos realizados, trabajos en curos, información de contacto y más.
					<p><a class="btn btn-md btn-primary mt-2" href="usr-proved">Crear Perfil <i style="float:right;" class="bi bi-chevron-right ms-1"></i></a></p>
				</div>
				<div id="div5" class="subcontent">
					<h3><b>Proveedor</b></h3> 
					<p>Los <b>roveedores</b> de productos como Pisos, Griferías, Iluminación, Sanitarios o servicios como Bancos Hipotecarios, Electrodomésticos, Internet, Seguridad y más podrán mostrar con que producto participan en cada proyecto y los compradores o inversores tendrán la más detallada información pudiendo ir a la descripción del producto, el perfil de la empresa, la seriedad y prestigio de la misma y mas
					<p><a class="btn btn-md btn-primary mt-2" href="usr-proved">Crear Perfil <i style="float:right;" class="bi bi-chevron-right ms-1"></i></a></p>
				</div>
				
				
              </div>

            </div>
			


			
			
			
</div>
  </div>

@endsection