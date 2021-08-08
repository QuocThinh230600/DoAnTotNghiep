<div class="category__product-related">
    <ul>
        @foreach ($childcategorys as $childcategory)
            <li>
                <a href="{{route('category',$childcategory->slug)}}" style="text-transform: uppercase">{{$childcategory->name}}</a>
            </li>
        @endforeach
    </ul>
</div>
