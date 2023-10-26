
<!-- IN TAB 3 -->
<div class="tab-pane fade" id="tab-ame" role="tabpanel" aria-labelledby="ame-tab">

	@if(!empty($develop->availableAmenities()))
	<h4 class="yank display-10  fw-normal mb-2">{{__('Amenities')}}</h4>
	<div class="row">
		@foreach ($develop->availableAmenities() as $amenitie) 
		<div class="col-lg-3 col-sm-12 mb-3">
			<div class="form-check form-check-inline">
				<input type="checkbox" id="amenities{{$amenitie->id}}" name="amenities[]" value="{{$amenitie->id}}"
					   class="form-check-input form-radio" {{ $develop->amenities && in_array($service->id, old('amenities', $develop->amenities)) ? "checked" : "" }}>
				<label class="form-check-label" for="amenities{{$amenitie->id}}">{{$amenitie->name}}</label>
			</div>
		</div>			
		@endforeach
	</div>
	@endif
</div>
<!-- OUT TAB 3 -->
