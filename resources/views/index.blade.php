@extends('layouts.app')

@section('styles')
@parent
<style>
.banner {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 250px;
    overflow: hidden;
    background-image: url('../images/h-house.jpg');
    background-repeat: no-repeat;
    background-position: center;
}
</style>
@endsection

@section('content')
<div class="container-fluid hero-header-container px-lg-7 px-xxl-3" style="background-image:url(../images/bghome.jpg);">
    <div class="container pt-7 pb-7">
        <div class="banner-text light">
            <h1 class="yank display-6 fw-normal  mb-1">Tu próxima Propiedad está aquí.</h1>
            <h5 class="fs-lg-2 fs-xxl-4 light">Buscá en un mismo lugar todos los nuevos desarrollos y propiedades a
                estrenar.</h5>

            <ul class="nav nav-underline" id="developClassTabs" role="tablist">
                @foreach($dclasses as $dclass)
                <li class="nav-item" role="presentation">
                    <a class="nav-link @if ($loop->first) active @endif" id="devClass{{ $dclass->id }}-tab"
                        data-developClassId="{{ $dclass->id }}" data-bs-toggle="tab">
                        {{ Str::upper(__($dclass->name)) }}
                    </a>
                </li>
                @endforeach
            </ul>

            <div class="tab-content mt-1">
                <div class="row g-0">

                    <div class="col-12 col-md-3">
                        <div class="form-floating mb-3">
                            <select class="form-select form-control-lg" id="developType" aria-label="{{__('Tipo')}}">
                            </select>
                            <label for="developType">{{__('Seleccionar')}}</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <div class="form-floating mb-3">
                                <input class="form-control"
                                        id="location"
                                        name="location"
                                        type="text" 
                                        placeholder="{{__('Ubicación')}}">
                                <label for="location">{{__('Ubicación')}}</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-1">
                            <a class="btn btn-sm btn-primary" style="padding:17px; width:100%;" href="lista">
                                <b>{{__('BUSCAR')}}</b>
                            </a>
                        </div>

                </div>
            </div>



        </div>







    </div>

</div>


<div class="container-fluid p-4">
    <div class="p-lg-5">


        <div class="row">
            <div class="col-9">
                <h2 class="yank display-8 fw-normal mb-0">Desarrollos <b>destacados</b></h2>
                <h5 class="mb-4 d-none d-sm-block">Conocé los desarrollos que marcan tendencia.</h5>
            </div>
            <div class="col-3 d-flex justify-content-end  align-items-center">

                <a class="btn btn-md btn-outline-secondary redondo me-2" data-bs-target="#carouselprops"
                    data-bs-slide="next">
                    <div style="margin-bottom:-2px;"><i class="bi bi-chevron-left" style="font-size:20px;"></i></div>
                </a>
                <a class="btn btn-md btn-outline-secondary redondo" data-bs-target="#carouselprops"
                    data-bs-slide="prev">
                    <div style="margin-bottom:-1px;"><i class="bi bi-chevron-right" style="font-size:20px;"></i></div>
                </a>

            </div>
        </div>

        <div id="carouselprops" class="carousel slide mt-3" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="cards-wrapper">

                        <div class="card">
                            <div class="stack-parent mb-3">
                                <a href="detalle">
                                    <img class="stack-img" src="../images/detalle.jpg">
                                    <div class="stack-txt">
                                        <div class="item-date white"> Terminado</div>
                                    </div>
                                    <div class="stack-wish">
                                        <a class="btn btn-md btn-outline-primary redondo" style="font-size:1.4rem"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Favoritos">
                                            <div style="margin-bottom:-4px;"><i class="bi bi-heart-fill"
                                                    style="font-size:18px; color:#ffffff;"></i></div>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <div class="px-2">
                                <h5 class="yank mb-0">Torres Plaza Centro</h5>
                                <p class="descript mb-1"><i class="bi bi-geo-alt"></i> Niceto Vega 3230 | Palermo |
                                    Buenos Aires</p>
                                <div class="d-flex justify-content-between mb-0">
                                    <div>
                                        <span class="descript mb-0">88 Propiedades | Desde 124 m² </span>
                                        <h3 class="mb-0"><span class="fs-6">U$S</span> <b>89.000</b></h3>
                                        <p class="mt-0"><b>Entrega: Inmediata</b></p>
                                    </div>
                                    <img src="../images/logo-des.png" height="80">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="stack-parent mb-3">
                                <a href="detalle">
                                    <img class="stack-img" src="../images/detalleb.jpg">
                                    <div class="stack-txt">
                                        <div class="item-date white"> Terminado</div>
                                    </div>
                                    <div class="stack-wish">
                                        <a class="btn btn-md btn-outline-primary redondo" style="font-size:1.4rem"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Favoritos">
                                            <div style="margin-bottom:-4px;"><i class="bi bi-heart-fill"
                                                    style="font-size:18px; color:#ffffff;"></i></div>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <div class="px-2">
                                <h5 class="yank mb-0">Torres Plaza Centro</h5>
                                <p class="descript mb-1"><i class="bi bi-geo-alt"></i> Niceto Vega 3230 | Palermo |
                                    Buenos Aires</p>
                                <div class="d-flex justify-content-between mb-0">
                                    <div>
                                        <span class="descript mb-0">88 Propiedades | Desde 124 m² </span>
                                        <h3 class="mb-0"><span class="fs-6">U$S</span> <b>89.000</b></h3>
                                        <p class="mt-0"><b>Entrega: Inmediata</b></p>
                                    </div>
                                    <img src="../images/logo-des.png" height="80">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="stack-parent mb-3">
                                <a href="detalle">
                                    <img class="stack-img" src="../images/detallec.jpg">
                                    <div class="stack-txt">
                                        <div class="item-date white"> Terminado</div>
                                    </div>
                                    <div class="stack-wish">
                                        <a class="btn btn-md btn-outline-primary redondo" style="font-size:1.4rem"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Favoritos">
                                            <div style="margin-bottom:-4px;"><i class="bi bi-heart-fill"
                                                    style="font-size:18px; color:#ffffff;"></i></div>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <div class="px-2">
                                <h5 class="yank mb-0">Torres Plaza Centro</h5>
                                <p class="descript mb-1"><i class="bi bi-geo-alt"></i> Niceto Vega 3230 | Palermo |
                                    Buenos Aires</p>
                                <div class="d-flex justify-content-between mb-0">
                                    <div>
                                        <span class="descript mb-0">88 Propiedades | Desde 124 m² </span>
                                        <h3 class="mb-0"><span class="fs-6">U$S</span> <b>89.000</b></h3>
                                        <p class="mt-0"><b>Entrega: Inmediata</b></p>
                                    </div>
                                    <img src="../images/logo-des.png" height="80">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="cards-wrapper">

                        <div class="card">
                            <div class="stack-parent mb-3">
                                <a href="detalle">
                                    <img class="stack-img" src="../images/detalle.jpg">
                                    <div class="stack-txt">
                                        <div class="item-date white"> Terminado</div>
                                    </div>
                                    <div class="stack-wish">
                                        <a class="btn btn-md btn-outline-primary redondo" style="font-size:1.4rem"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Favoritos">
                                            <div style="margin-bottom:-4px;"><i class="bi bi-heart-fill"
                                                    style="font-size:18px; color:#ffffff;"></i></div>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <div class="px-2">
                                <h5 class="yank mb-0">Torres Plaza Centro</h5>
                                <p class="descript mb-1"><i class="bi bi-geo-alt"></i> Niceto Vega 3230 | Palermo |
                                    Buenos Aires</p>
                                <div class="d-flex justify-content-between mb-0">
                                    <div>
                                        <span class="descript mb-0">88 Propiedades | Desde 124 m² </span>
                                        <h3 class="mb-0"><span class="fs-6">U$S</span> <b>89.000</b></h3>
                                        <p class="mt-0"><b>Entrega: Inmediata</b></p>
                                    </div>
                                    <img src="../images/logo-des.png" height="80">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="stack-parent mb-3">
                                <a href="detalle">
                                    <img class="stack-img" src="../images/detalleb.jpg">
                                    <div class="stack-txt">
                                        <div class="item-date white"> Terminado</div>
                                    </div>
                                    <div class="stack-wish">
                                        <a class="btn btn-md btn-outline-primary redondo" style="font-size:1.4rem"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Favoritos">
                                            <div style="margin-bottom:-4px;"><i class="bi bi-heart-fill"
                                                    style="font-size:18px; color:#ffffff;"></i></div>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <div class="px-2">
                                <h5 class="yank mb-0">Torres Plaza Centro</h5>
                                <p class="descript mb-1"><i class="bi bi-geo-alt"></i> Niceto Vega 3230 | Palermo |
                                    Buenos Aires</p>
                                <div class="d-flex justify-content-between mb-0">
                                    <div>
                                        <span class="descript mb-0">88 Propiedades | Desde 124 m² </span>
                                        <h3 class="mb-0"><span class="fs-6">U$S</span> <b>89.000</b></h3>
                                        <p class="mt-0"><b>Entrega: Inmediata</b></p>
                                    </div>
                                    <img src="../images/logo-des.png" height="80">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="stack-parent mb-3">
                                <a href="detalle">
                                    <img class="stack-img" src="../images/detallec.jpg">
                                    <div class="stack-txt">
                                        <div class="item-date white"> Terminado</div>
                                    </div>
                                    <div class="stack-wish">
                                        <a class="btn btn-md btn-outline-primary redondo" style="font-size:1.4rem"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Favoritos">
                                            <div style="margin-bottom:-4px;"><i class="bi bi-heart-fill"
                                                    style="font-size:18px; color:#ffffff;"></i></div>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <div class="px-2">
                                <h5 class="yank mb-0">Torres Plaza Centro</h5>
                                <p class="descript mb-1"><i class="bi bi-geo-alt"></i> Niceto Vega 3230 | Palermo |
                                    Buenos Aires</p>
                                <div class="d-flex justify-content-between mb-0">
                                    <div>
                                        <span class="descript mb-0">88 Propiedades | Desde 124 m² </span>
                                        <h3 class="mb-0"><span class="fs-6">U$S</span> <b>89.000</b></h3>
                                        <p class="mt-0"><b>Entrega: Inmediata</b></p>
                                    </div>
                                    <img src="../images/logo-des.png" height="80">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row mt-5 mb-3">
            <div class="col-lg-6 text-center text-lg-start pe-xxl-3">
                <h1 class="yank display-5 fw-normal text-body-emphasis lh-1 mb-2">Bienvenido!</h1>
                <p class="mb-3"><b>Onpropify</b> es una plataforma global donde todos los usuarios se benefician!.
                    <br>Un espacio único donde podrán exponer, comercializar y comprar desarrollos inmobiliarios en sus
                    etapas de Pre Venta, En construcción y Terminados listos para mudarse.
                    <br><br>En <b>Onpropify</b> podrás encontrar y analizar los nuevos desarrollos inmobiliarios
                    Residenciales, Comerciales e Industriales en el mundo. Creamos una comunidad con todos los jugadores
                    que lo integran; Desarrolladores, Inmobiliarias, Agentes, Compradores, Profesionales y Proveedores.
                </p>
                <a class="btn btn-md btn-primary mt-2" href="quienes">Más información <i style="float:right;"
                        class="bi bi-chevron-right ms-1"></i></a>
            </div>



            <div class="col-sm-12 col-lg-2 text-center">
                <div class="row">
                    <div class="col-6 col-lg-12 mt-4 text-center">
                        <img src="../images/user.png" width="70" alt=""><br>
                        <a class="btn btn-sm btn-outline-secondary rounded-pill" style="width:85%;"
                            href="c-inversor"><b>Comprador</b></a>
                    </div>
                    <div class="col-6 col-lg-12 mt-4 text-center">
                        <img src="../images/user.png" width="70" alt=""><br>
                        <a class="btn btn-sm btn-outline-secondary rounded-pill" style="width:85%;"
                            href="c-desarrollador"><b>Desarrollador</b></a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-2 text-center">
                <div class="row">
                    <div class="col-6 col-lg-12 mt-4 text-center">
                        <img src="../images/user.png" width="70" alt=""><br>
                        <a class="btn btn-sm btn-outline-secondary rounded-pill" style="width:85%;"
                            href="c-inmobiliaria"><b>Inmobiliaria</b></a>
                    </div>
                    <div class="col-6 col-lg-12 mt-4 text-center">
                        <img src="../images/user.png" width="70" alt=""><br>
                        <a class="btn btn-sm btn-outline-secondary rounded-pill" style="width:85%;"
                            href="c-agente"><b>Agente</b></a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-2 text-center">
                <div class="row">
                    <div class="col-6 col-lg-12 mt-4 text-center">
                        <img src="../images/user.png" width="70" alt=""><br>
                        <a class="btn btn-sm btn-outline-secondary rounded-pill" style="width:85%;"
                            href="c-profesional"><b>Profesional</b></a>
                    </div>
                    <div class="col-6 col-lg-12 mt-4 text-center">
                        <img src="../images/user.png" width="70" alt=""><br>
                        <a class="btn btn-sm btn-outline-secondary rounded-pill" style="width:85%;"
                            href="c-profesional"><b>Proveedor</b></a>
                    </div>
                </div>
            </div>

        </div>




        <div class="row">



            <div class="col-12 col-sm-6 col-md-12 mt-5 mb-5">
                <div class="banner mb-3">
                    <div class="stack-txt p-3">
                        <p class="mb-0">Invertí estando información.</p>
                        <h3 class="mb-3">En <b>Onpropify</b> tenés todas las<br>herramientas de análisis.</h3>
                        <a class="btn btn-sm btn-primary mb-2" href="contenido">Conocelas <i style="float:right;"
                                class="bi bi-arrow-right mx-2"></i></a>
                    </div>
                </div>
            </div>






            <h1 class="yank display-5 fw-normal text-body-emphasis lh-1 mb-1">Tipos de emprendimientos</h1>
            <h5 class="fs-lg-2 fs-xxl-4 light">Buscá desarrollos por su categoría.</h5>

            <div class="row">
                <div class="col">
                    <ul class="list-unstyled">
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <img class="stack-img" src="../images/casa.jpg" width="150">
                                <div class="col-lg-8">
                                    <h6 class="mb-0"><b>Residencial<br>Edificios</b></h6>
                                    <small class="text-body-secondary">Entrega Inmediata</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <img class="stack-img" src="../images/casa.jpg" width="150">
                                <div class="col-lg-8">
                                    <h6 class="mb-0"><b>Residencial<br>Country Clubs</b></h6>
                                    <small class="text-body-secondary">Entrega Inmediata</small>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col">
                    <ul class="list-unstyled">
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <img class="stack-img" src="../images/casa.jpg" width="150">
                                <div class="col-lg-8">
                                    <h6 class="mb-0"><b>Comercial<br>Locales</b></h6>
                                    <small class="text-body-secondary">Entrega Inmediata</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <img class="stack-img" src="../images/casa.jpg" width="150">
                                <div class="col-lg-8">
                                    <h6 class="mb-0"><b>Comerciales<br>Oficinas</b></h6>
                                    <small class="text-body-secondary">Entrega Inmediata</small>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col">
                    <ul class="list-unstyled">
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <img class="stack-img" src="../images/casa.jpg" width="150">
                                <div class="col-lg-8">
                                    <h6 class="mb-0"><b>Residencial<br>Edificios</b></h6>
                                    <small class="text-body-secondary">Entrega Inmediata</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <img class="stack-img" src="../images/casa.jpg" width="150">
                                <div class="col-lg-8">
                                    <h6 class="mb-0"><b>Residencial<br>Country Clubs</b></h6>
                                    <small class="text-body-secondary">Entrega Inmediata</small>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h3 class="display-10 fw-bold text-body-emphasis lh-1 mb-3">Publica tu desarrollo con nosotros</h3>
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Convertite en miembro hoy!</h1>
                    <p class="lead">Tené acceso a la información de desarrolladores, brokers y agentes con quienes
                        pensás administrar tus inversiones. Informate de sus actividades, desempeños y opiniones de
                        clientes y usuarios. </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a class="btn btn-lg btn-primary rounded-pill banner-button" href="contenido">Contactanos</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="../images/dash.jpg" class="img-fluid" alt="dash" loading="lazy">
                </div>
            </div>
        </div>

    </div>
</div>

<!-- LOGIN MODAL -->
<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hola!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Registrate para guradar tus favoritos
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function() {
    $('#developClassTabs a.nav-link').on('click', function(e) {
        e.preventDefault();
        var class_id = $(this).attr('data-developClassId');
        $.ajax({
            method: "GET",
            url: "{{url('/dtype/json')}}/" + class_id,
            dataType: 'json',
            success: function(response) {
                $('select#developType').empty();
                $('select#developType').append(
                    '<option value="">{{__('Tipo de Desarrollo')}}</option>');
                $.each(response, function(index, data) {
                    $('select#developType').append('<option value="' + data['id'] +
                        '">' + data['name'] + '</option>');
                });
            }
        });
    });
    $('#developClassTabs a.nav-link.active').trigger('click');
})
</script>
@endsection