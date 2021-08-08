@foreach ($showroom as $item)
    <li>
        <label for="{{$item->uuid}}">
            <input type="radio" id="{{$item->uuid}}" name="deliveryShowroom" value="{{$item->name . ', '.$item->address . ', '.$item->ward->name . ', '.$item->district->name . ', '.$item->province->name }}">
            {{$item->name . ', '.$item->address . ', '.$item->ward->name . ', '.$item->district->name . ', '.$item->province->name }}
        </label>
    </li>  
@endforeach