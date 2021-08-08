<div class="product-detail-popup">
    <div class="product-detail-popup__title">
        <p>{!! strip_tags($pageContent[13]['content']) !!}</p>
        <p class="close">{!! strip_tags($pageContent[14]['content']) !!}</p>
    </div>
    <div class="product-detail-popup__carousel">
        <div class="carousel-main">
            @if (count($TechnicalImage) != 0)
                @foreach ($TechnicalImage as $item)
                    <div class="carousel-cell">
                        <img class="lozad" data-src="{{$item->image}}" alt="{{$item->name}}">
                    </div>
                @endforeach
            @endif
        </div>
        <div class="carousel-nav">
            @if (count($TechnicalImage) != 0)
                @foreach ($TechnicalImage as $item)
                    <div class="carousel-cell">
                        <img class="lozad" data-src="{{$item->image}}" alt="{{$item->name}}">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
    @foreach ($AttributeParent as $item)
        <div class="product-detail-popup__info">
            <p>{{$item->name}}</p>
            <ul>
                @php
                    $AttributeChild = DB::table('attributes')
                    ->leftJoin('attributes_translations', 'attributes.id', '=', 'attributes_translations.attribute_id')
                    ->leftJoin('product_attributes', 'attributes.id', '=', 'product_attributes.attribute')
                    ->where('product_attributes.product_id', '=', $productID)
                    ->where('attributes.parent_id', '=', $item->id)
                    ->where('product_attributes.deleted_at', '=', null)
                    ->get();
                @endphp
                @foreach ($AttributeChild as $Att)
                    <li>{{$Att->name}}: <span>{{$Att->value}}</span></li>
                @endforeach
            </ul>
        </div> 
    @endforeach
</div>