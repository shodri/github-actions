@extends('layouts.app')

@section('styles')
<style>
.about-section .about-img-wrapper {
    position: absolute;
    left: 0;
    top: 50%;
    width: 46%;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
    .about-section .about-img-wrapper {
        position: relative;
        top: 0;
        -webkit-transform: translateY(0);
        -moz-transform: translateY(0);
        -ms-transform: translateY(0);
        -o-transform: translateY(0);
        transform: translateY(0);
        width: 100%;
        margin-bottom: 50px;
    }
}

@media (max-width: 767px) {
    .about-section .about-img-wrapper {
        position: relative;
        top: 0;
        -webkit-transform: translateY(0);
        -moz-transform: translateY(0);
        -ms-transform: translateY(0);
        -o-transform: translateY(0);
        transform: translateY(0);
        width: 100%;
        margin-bottom: 50px;
    }
}

.about-section .about-img-wrapper img {
    width: 100%;
}

.about-section .about-img-wrapper .about-experience {
    width: 300px;
    border-radius: 0px;
    background: #e4e4e4;
    border: 5px solid #e4e4e4;
    padding: 40px 20px;
    position: absolute;
    right: -40px;
    bottom: 20px;
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
    .about-section .about-img-wrapper .about-experience {
        right: 40px;
    }
}

@media (max-width: 767px) {
    .about-section .about-img-wrapper .about-experience {
        right: 40px;
    }
}

.about-section .about-img-wrapper .about-experience h3 {
    font-size: 26px;
    font-weight: 700;
    color: #000;
    margin-bottom: 15px;
}

.about-section .about-img-wrapper .about-experience p {
    color: #000;
}

.form-signin {
    max-width: 400px;
    padding: 1rem;
}

.form-signin .form-floating:focus-within {
    z-index: 2;
}

.form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
</style>
@endsection

@section('content')
<div class="container-fluid p-4">
    <div class="p-lg-1">
        <div class="about-section">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-img-wrapper">
                        <div class="about-img position-relative d-inline-block wow fadeInLeft" data-wow-delay=".3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                            <img src="/images/new.jpg" class="img-fluid">
                            <div class="about-experience">
                                <h3>Bienvenido al portal de emprendimientos inmobiliarios.</h3>
                                <p>Crear tu cuenta de usuario en <b>Onpropify</b> es gratuito.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-content">
                        <main class="form-signin w-100 m-auto">
                        @yield('auth_content')
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection