<div class="category__product-filter">
    {{-- <p>Chọn mức giá</p> --}}
    {{-- <div class="filter-left">
        <div class="filter-left__item">
            <a href="javascript:(0)">
                
            </a>
        </div>
        <div class="filter-left__item">
            <a href="javascript:(0)">Từ 3 - 6 triệu</a>
        </div>
        <div class="filter-left__item">
            <a href="javascript:(0)">Từ 9 - 12 triệu</a>
        </div>
        <div class="filter-left__item">
            <a href="javascript:(0)">Từ 12 - 15 triệu</a>
        </div>
    </div> --}}
    <div class="filter-right">
        <div class="filter-right__item">
            <select name="attribute_sort" id="pricePro" data-url="{{route('ajax-filter')}}" data-idCat="{{isset($catId)? $catId :''}}"  data-idProducer="{{isset($idProducer)? $idProducer : ''}}" >
                <option value="">Giá tiền</option>
                <option value="0,1000000">Dưới 1 triệu</option>
                <option value="1000000,3000000">Từ 1 - 3 triệu</option>
                <option value="3000000,6000000"> Từ 3 - 6 triệu</option>
                <option value="6000000,100000000"> Trên 6 triệu</option>
            </select>
        </div>
        @foreach ($attribute as $attr)
            <div class="filter-right__item">
                <select class="attribute_sort" name="attribute_sort" id="" data-attr="{{$attr['attr']->id}}">
                    <option value="">{{$attr['attr']->name}}</option>
                    @foreach ($attr['value'] as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
        @endforeach
        
        <div class="filter-sort">
            <select name="attribute_sort" id="sort_filter" data-url={{ route('ajax-filter') }} >
                <option value="">Sắp xếp theo</option>
                <option value="1">Giá tăng</option>
                <option value="2">Giá giảm</option>
                <option value="3">Mới nhất</option>
            </select>
        </div>
    </div>
