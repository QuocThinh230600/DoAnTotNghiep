<div class="showroom">
    <div class="showroom__tab">
        <div class="showroom__tab-item showroom-tab-active" data-showroom="1">
            <H6>{!! strip_tags($content[0]['content']) !!} <img class="lozad" data-src="{{$content[0]['image']}}" alt=""></H6>
        </div>
        <div class="showroom__tab-item" data-showroom="2">
            <H6>{!! strip_tags($content[1]['content']) !!} <img class="lozad" data-src="{{$content[1]['image']}}" alt=""></H6>
        </div>
    </div>
    <div class="showroom__list showroom-active" id="showroomList1">
        @foreach($city as $item)
            <div class="showroom__list-item">
                <div class="name">
                    <p>{{$item->name}}</p>
                </div>
                <div class="address">
                    <p>{{$item->address}}</p>
                </div>
                <div class="hotline">
                    <p>Hotline: <b>{{$item->phone}}</b></p>
                </div>
                <div class="img">
                    <img class="lozad" data-src="{{$item->image}}" alt="">
                </div>
                <div class="btn">
                    <a class="map-btn showmap" data-map='{{$item->script}}' href="javascript:;"">Bản đồ</a>
                    <a href="{{$item->description}}" target="_blank">Xem chi tiết</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="showroom__list" id="showroomList2">
        @foreach ($province as $proVi)
            <div class="showroom__list-item">
                <div class="name">
                    <p>{{$proVi->name}}</p>
                </div>
                <div class="address">
                    <p>{{$proVi->address}}</p>
                </div>
                <div class="hotline">
                    <p>Hotline: <b>{{$proVi->phone}}</b></p>
                </div>
                <div class="img">
                    <img class="lozad" data-src="{{$proVi->image}}" alt="">
                </div>
                <div class="btn">
                    <a class="map-btn showmap" data-map='{{$proVi->script}}' href="javascript:;">Bản đồ</a>
                    <a href="{{$proVi->description}}" target="_blank">Xem chi tiết</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="map-popup" id="showmap">
    <iframe id="" src="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>