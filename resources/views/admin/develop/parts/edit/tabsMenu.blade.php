<div class="d-flex flex-row mb-3">
    <div class="p-2">
        <ul class="nav nav-underline flex-column flex-sm-row" id="myTab" role="tablist">
        <li class="nav-item"  role="presentation"><a class="nav-link active" id="car-tab" data-bs-toggle="tab" href="#tab-car" role="tab" aria-controls="tab-car" aria-selected="true"> CARACTERÍSTICAS</a></li>
        <li class="nav-item text-white light" role="presentation"><a class="nav-link" id="mul-tab" data-bs-toggle="tab" href="#tab-mul" role="tab" aria-controls="tab-mul" aria-selected="false" tabindex="-1"> MULTIMEDIA</a></li>
        @if(!empty($develop->availableAmenities()))
        <li class="nav-item text-white light" role="presentation"><a class="nav-link" id="ame-tab" data-bs-toggle="tab" href="#tab-ame" role="tab" aria-controls="tab-ame" aria-selected="false" tabindex="-1"> AMENITIES</a></li>
        @endif
        <li class="nav-item text-white light" role="presentation"><a class="nav-link" id="eta-tab" data-bs-toggle="tab" href="#tab-eta" role="tab" aria-controls="tab-eta" aria-selected="false" tabindex="-1"> ETAPAS</a></li>
        <li class="nav-item text-white light" role="presentation"><a class="nav-link" id="uni-tab" data-bs-toggle="tab" href="#tab-uni" role="tab" aria-controls="tab-uni" aria-selected="false" tabindex="-1"> PROPIEDADES</a></li>
        <li class="nav-item text-white light" role="presentation"><a class="nav-link" id="inm-tab" data-bs-toggle="tab" href="#tab-inm" role="tab" aria-controls="tab-inm" aria-selected="false" tabindex="-1"> INMOBILIARIAS</a></li>
        <li class="nav-item text-white light" role="presentation"><a class="nav-link" id="pro-tab" data-bs-toggle="tab" href="#tab-pro" role="tab" aria-controls="tab-pro" aria-selected="false" tabindex="-1"> PROVEEDORES</a></li>
        </ul>
    </div>
</div>
