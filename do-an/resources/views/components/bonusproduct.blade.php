<div class="container module-upload-multi-bonusproduct">
    @if (!empty($databonus))
        @foreach($databonus as $item)
            <div class="row mb-2 row-upload-multi" data-id="{{ $loop->iteration }}" id="row-upload-multi-bonusproduct-{{ $loop->iteration }}">
                <div class="col-md-10 my-auto">
                    <input type="text" class="form-control" placeholder="{{ placeholder('product.bonus') }}" name="multi_bonusproduct[{{ $loop->iteration }}][value]" value="{{ $item->value }}">
                </div>
                <div class="col-md-2 my-auto text-right p-0">
                    {{-- <button type="button" class="btn btn-success d-inline mr-2 upload-multi-attribute" data-id="attribute-upload-{{ $loop->iteration }}"><i class="icon-upload"></i></button> --}}
                    <button type="button" class="btn btn-danger d-inline delete-row-upload" data-id="row-upload-multi-bonusproduct-{{ $loop->iteration }}"><i class="icon-trash"></i></button>
                </div>
            </div>
        @endforeach
    @endif
    <div id="load-row-upload-bonusproduct"></div>

    <div class="row mb-2">
        <div class="ml-auto my-auto">
            <button type="button" id="add-row-upload-bonusproduct" class="btn btn-primary" data-url="{{ route('admin.ajax.addRowUploadBonusProduct') }}"><i class="icon-plus-circle2"></i></button>
        </div>
    </div>
</div>
