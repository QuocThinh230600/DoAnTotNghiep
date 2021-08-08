<div class="row mb-2 row-upload-multi" data-id="{{ $id }}" id="row-upload-multi-bonusproduct-{{ $id }}">
    <div class="col-md-11 my-auto">
        <input type="text" class="form-control" placeholder="{{ placeholder('product.bonus') }}" name="multi_bonusproduct[{{ $id }}][value]">
    </div>
    <div class="col-md-1 my-auto text-right p-0">
        <button type="button" class="btn btn-danger d-inline delete-row-upload" data-id="row-upload-multi-bonusproduct-{{ $id }}"><i class="icon-trash"></i></button>
    </div>
</div>