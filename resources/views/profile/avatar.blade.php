@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
	<div class="p-lg-4">
		
		<div class="row mb-3 mt-6">


			<div class="col-lg-12">
			
				<form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        			@csrf

					<h4 class="yank fw-normal mb-0"><i class="bi bi-person me-2"></i> {{__('Imágen de Perfil')}}</h4>
					<p class="mb-2">{{__('Cambiá tu imágen de perfil')}}</p>
				
                    <div class="card mb-4">
                        <div class="profile">
                            <div class="position-relative d-inline-block">
                                <img src="/images/usuarioBG.jpg" class="img-fluid">
                                <div class="about-experience" style="width:300px">
                                    <img class="rounded-circle " src="{{asset('/storage/images/'.(Auth::user()->picture ?? '_profile-no.jpg'))}}">
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="row">
						<div class="col-lg-4 col-sm-12 mb-3">
							<label for="picture" class="form-label">{{__('IMAGEN DE PERFIL')}}</label>
							<div class="input-group"> 
								<input type="file" id='picture' name='picture' class="form-control" placeholder="Cambiar" 
									   accept="jpg,jpeg,png,gif,bmp,svg">
							</div>
						</div>
					</div>

					<div class="d-flex justify-content-center justify-content-lg-start">
						<button type="submit" class="btn btn-md btn-primary mt-3 mb-5"><i class="bi bi-check-lg ms-1 me-2"></i> {{__('Enviar imágen')}} </button>
					</div>

				</form>
			</div>
		
		</div>
	</div>
</div>
@endsection