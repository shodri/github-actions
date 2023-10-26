<div class="tab-pane fade" id="tab-eta" role="tabpanel" aria-labelledby="eta-tab">
	<div class="d-flex justify-content-between">
		<div>
			<h4 class="yank display-10  fw-normal mb-2">{{__('Etapas')}}</h4>
			<p class="mb-4">{{__('Definí las Etapas dentro delas cuales se agruparán las Propiedades')}}</p>
		</div>
		<div>
			<a class="btn btn-md btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#etapaModal">
				<i class="bi bi-plus-lg ms-1 me-2"></i> <span class="d-none d-sm-inline-flex ms-2">{{__('Nueva Etapa')}}</span> 
			</a>
		</div>
	</div>
		
	<div class="row">
		<div class="col-lg-12 col-sm-12 mb-3">
			<div class="table-responsive">
				<table class="table align-middle table-sm table-borderless table-hover">
					<thead>
						<tr>
							<th>Nombre de la etapa</th>
							<th>Fase</th>
							<th>F.Inicio Obra</th>
							<th>F.Entrega</th>
							<th>Uns.Tots.</th>
							<th>Uns.Vends.</th>
							<th>Uns.En vta.</th>
						</tr>
						<tr>
							<th><input class="form-control form-control-sm" id="floatingInput" placeholder=""></th>
							<th><input class="form-control form-control-sm" id="floatingInput" placeholder=""></th>
							<th><input class="form-control form-control-sm" id="floatingInput" placeholder=""></th>
							<th><input class="form-control form-control-sm" id="floatingInput" placeholder=""></th>
							<th><input class="form-control form-control-sm" id="floatingInput" placeholder=""></th>
							<th><input class="form-control form-control-sm" id="floatingInput" placeholder=""></th>
							<th><input class="form-control form-control-sm" id="floatingInput" placeholder=""></th>
							<th><a class="btn btn-sm  btn-outline-secondary  rounded-pill mt-1 py-1 px-4" href="#"><i class="bi bi-search fs-10"></i></a></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($develop->stages as $stage)
							<tr>
								<td>{{$stage->name}}</td>
								<td><span class="badge badge-id badge-{{$stage->phase->color}}"> {{$stage->phase->short_name}} <i class="bi bi-{{$stage->phase->icon}}"></i></span></td>
								<td><i class="bi bi-clock me-2"></i> {{$stage->start_date}}</td>
								<td><i class="bi bi-clock me-2"></i> {{$stage->finish_date}}</td>
								<td class="text-center">{{$stage->units->count()}}</td>
								<td class="text-center">60</td>
								<td class="text-center">0</td>
								<td><a class="btn btn-sm  btn-outline-secondary py-0 px-4" dropdown-toggle dropdown-caret-none transition-none d-flex btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><i class="bi bi-three-dots"></i></a>
									<div class="dropdown-menu">
									<a class="dropdown-item dm-small text-primary" href="#" data-bs-toggle="modal" data-bs-target="#etapaModal"><i class="bi bi-pencil-square me-1"></i> Editar</a>
									<a class="dropdown-item dm-small text-info" href="../_front/detalle" target="_blank"><i class="bi bi-eye me-1"></i> Ver publicacion</a>
									</div>
								</td>
							</tr>
						@endforeach
						<tr>
							<td>Torre 2</td>
							<td><span class="badge badge-id badge-info"> Pre-const. <i class="bi bi-gear"></i></span></td>
							<td><i class="bi bi-clock-fill text-success me-2"></i> 01/01/22</td>
							<td><i class="bi bi-clock-fill text-danger me-2"></i> 31/12/22</td>
							<td class="text-center">60</td>
							<td class="text-center">60</td>
							<td class="text-center">0</td>
							<td><a class="btn btn-sm  btn-outline-secondary py-0 px-4" dropdown-toggle dropdown-caret-none transition-none d-flex btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><i class="bi bi-three-dots"></i></a>
								<div class="dropdown-menu">
								<a class="dropdown-item dm-small text-primary" href="#" data-bs-toggle="modal" data-bs-target="#etapaModal"><i class="bi bi-pencil-square me-1"></i> Editar</a>
								<a class="dropdown-item dm-small text-info" href="../_front/detalle" target="_blank"><i class="bi bi-eye me-1"></i> Ver publicacion</a>
								</div>
							</td>
						</tr>
						<tr>
							<td>Barrio Parque</td>
							<td><span class="badge badge-id badge-success"> terminada <i class="bi bi-check"></i></span></td>
							<td><i class="bi bi-clock-fill text-success me-2"></i> 01/01/22</td>
							<td><i class="bi bi-clock-fill text-success me-2"></i> 31/12/22</td>
							<td class="text-center">30</td>
							<td class="text-center">25</td>
							<td class="text-center">5</td>
							<td><a class="btn btn-sm  btn-outline-secondary py-0 px-4" dropdown-toggle dropdown-caret-none transition-none d-flex btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><i class="bi bi-three-dots"></i></a>
								<div class="dropdown-menu">
								<a class="dropdown-item dm-small text-primary" href="#" data-bs-toggle="modal" data-bs-target="#etapaModal"><i class="bi bi-pencil-square me-1"></i> Editar</a>
								<a class="dropdown-item dm-small text-info" href="../_front/detalle" target="_blank"><i class="bi bi-eye me-1"></i> Ver publicacion</a>
								</div>
							</td>
						</tr>
						<tr>
							<td>Shopping Comercial</td>
							<td><span class="badge badge-id badge-secondary"> En Const. <i class="bi bi-gear"></i></span></td>
							<td><i class="bi bi-clock-fill text-warning me-2"></i> 01/01/24</td>
							<td><i class="bi bi-clock-fill text-danger me-2"></i>  31/12/24</td>
							<td class="text-center">12</td>
							<td class="text-center">0</td>
							<td class="text-center">12</td>
							<td><a class="btn btn-sm  btn-outline-secondary py-0 px-4" dropdown-toggle dropdown-caret-none transition-none d-flex btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><i class="bi bi-three-dots"></i></a>
								<div class="dropdown-menu">
								<a class="dropdown-item dm-small text-primary" href="#" data-bs-toggle="modal" data-bs-target="#etapaModal"><i class="bi bi-pencil-square me-1"></i> Editar</a>
								<a class="dropdown-item dm-small text-info" href="../_front/detalle" target="_blank"><i class="bi bi-eye me-1"></i> Ver publicacion</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
