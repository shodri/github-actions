	<!-- IN TAB 2 -->
	<div class="tab-pane fade" id="tab-mul" role="tabpanel" aria-labelledby="mul-tab">
		<h4 class="yank display-10  fw-normal mb-2">{{__('Multimedia')}}</h4>
		
		<h6 class="yank display-10  fw-bold mb-2">{{__('Fotos principales')}}</h6>

		<div class="row">
			<?php $documents = $develop->documentsWhere(['type'=>'image','subtype'=>'frontPage','status'=>'enabled'])->get() ?>
			@for ($i=0; $i < 6; $i++)
				<div class="col-lg-2 col-sm-6 mb-3">
					<label for="frontPage{{$i}}" class="form-label">{{__('PORTADA')}} {{ $i+1 }}</label>
					<label class="cabinet" id="frontPage{{$i}}">
						<figure>
							<img src="{{isset($documents[$i]) ? Storage::url($documents[$i]->path) : '/images/detalle-add.jpg'}}" class="img-responsive img-thumbnail img-fluid picture-image" style="width:195px;height:156px" />
							<figcaption>
								<div class="d-flex justify-content-between">
									<i class="bi bi-camera"></i>
									<a class="pictureDelete" style="display: {{isset($documents[$i]) ? 'block' : 'none'}}"><i class="bi bi-trash"></i></a>
								</div>
							</figcaption>
						</figure> 
						<input type="file" class="item-img file center-block pictureFile" accept="image/*"/>
						<input type="hidden" class="picture" name="document[image_frontPage_{{isset($documents[$i]) ? "upd_{$documents[$i]->id}" : "add_{$i}"}}]" />
						<input type="hidden" class="pictureOriginal" value="{{isset($documents[$i]) ? Storage::url($documents[$i]->path) : ''}}"/>
					</label> 
				</div>
			@endfor		
		</div>					

		<div class="row">
			<?php $documents = $develop->documentsWhere(['type'=>'image','subtype'=>'gallery','status'=>'enabled'])->get() ?>
			@for ($i=0; $i < 6; $i++)
				<div class="col-lg-2 col-sm-6 mb-3">
					<label for="gallery{{$i}}" class="form-label">{{__('GALERIA')}} {{ $i+1 }}</label>
					<label class="cabinet" id="gallery{{$i}}">
						<figure>
							<img src="{{isset($documents[$i]) ? Storage::url($documents[$i]->path) : '/images/detalle-add.jpg'}}" class="img-responsive img-thumbnail img-fluid picture-image" style="width:195px;height:156px" />
							<figcaption>
								<div class="d-flex justify-content-between">
									<i class="bi bi-camera"></i>
									<a class="pictureDelete" style="display: {{isset($documents[$i]) ? 'block' : 'none'}}"><i class="bi bi-trash"></i></a>
								</div>
							</figcaption>
						</figure> 
						<input type="file" class="item-img file center-block pictureFile" accept="image/*"/>
						<input type="hidden" class="picture" name="document[image_gallery_{{isset($documents[$i]) ? "upd_{$documents[$i]->id}" : "add_{$i}"}}]" />
						<input type="hidden" class="pictureOriginal" value="{{isset($documents[$i]) ? Storage::url($documents[$i]->path) : ''}}"/>
					</label> 
				</div>
			@endfor		
		</div>					

		<hr>
		
		<h6 class="yank display-10  fw-bold mb-2">{{__('Videos')}}</h6>
		<div class="row">
			<?php $documents = $develop->documentsWhere(['type'=>'video','status'=>'enabled'])->get() ?>
			@for ($i=0; $i < 3; $i++)
			<div class="col-lg-4 col-sm-12 mb-3">
				<label for="video{{$i}}" class="form-label">{{__('LINK VIDEO')}} {{$i+1}}</label>
					<input type="text" id="video{{$i}}" name="video[{{$i}}]" 
						class="form-control form-control-sm @error('details') is_invalid @enderror" 
						value="{{ old('video[$i]', (isset($documents[$i]) ? $documents[$i]->path : '')) }}"
						aria-describedby="video{{$i}}Describe">
					<div id="video{{$i}}Describe" class="form-text">* {{__('Que aparecerá en la publicación')}}</div>
			</div>
			@endfor		
		</div>					
		<hr>
		
		<h6 class="yank display-10  fw-bold mb-2">{{__('Planos')}}</h6>
		<div class="row">
			<?php $documents = $develop->documentsWhere(['type'=>'plane','status'=>'enabled'])->get() ?>
			@for ($i=0; $i < 12; $i++)
				<div class="col-lg-2 col-sm-6 mb-3">
					<label for="plane{{$i}}" class="form-label">{{__('PLANO')}} {{ $i+1 }}</label>
					<label class="cabinet" id="plane{{$i}}">
						<figure>
							<img src="{{isset($documents[$i]) ? Storage::url($documents[$i]->path) : '/images/detalle-add.jpg'}}" class="img-responsive img-thumbnail img-fluid picture-image" style="width:195px;height:156px" />
							<figcaption>
								<div class="d-flex justify-content-between">
									<i class="bi bi-camera"></i>
									<a class="pictureDelete" style="display: {{isset($documents[$i]) ? 'block' : 'none'}}"><i class="bi bi-trash"></i></a>
								</div>
							</figcaption>
						</figure> 
						<input type="file" class="item-img file center-block pictureFile" accept="image/*"/>
						<input type="hidden" class="picture" name="document[plane_plane_{{isset($documents[$i]) ? "upd_{$documents[$i]->id}" : "add_{$i}"}}]" />
						<input type="hidden" class="pictureOriginal" value="{{isset($documents[$i]) ? Storage::url($documents[$i]->path) : ''}}"/>
					</label> 
				</div>
			@endfor		
		</div>					
</div>
<!-- OUT TAB 2 -->
