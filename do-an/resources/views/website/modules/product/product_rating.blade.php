<div class="product__rating">
    <div class="product__rating-title">
        <p>Đánh giá & Nhận xét {{$productDetail->name}}
        </p>
        <span>{{$productDetail->review()->where('status','on')->count()}}</span>
    </div>
    <div class="product__rating-rating">
        <div class="product__rating-rating--average">
            <p>Đánh giá trung bình</p>
            <h6>{{round($productDetail->review()->where('status','on')->avg('votes'),2)}}/5</h6>
            <div class="rating">
                <div class="star">
                    {!! showStar($productDetail->review()->where('status','on')->avg('votes')) !!}
                </div>
                <div class="count">
                    <span>{{$productDetail->review()->whereNotNull('votes')->where('status','on')->count()}} đánh giá & {{$productDetail->review()->whereNotNull('content')->where('status','on')->count()}} nhận xét</span>
                </div>
            </div>
        </div>
        <div class="product__rating-rating--progress">
            @php
                $tong =$productDetail->review()->where('status','on')->count();
            @endphp
            @for ($i = 5; $i > 0; $i--)
            <div class="progress-item">
                <label for="">{{$i}}<img class="lozad" data-src="{{asset('website/img/star.svg')}}" alt=""></label>
                <div class="progress-bar">
                    <span style="--progress-width: {{$tong != 0 ? ($productDetail->review()->where('votes',$i)->where('status','on')->count() / $tong * 100) : 0}}%;" class="progress-value">
                    </span>
                </div>
                <span>{{$productDetail->review()->where('votes',$i)->where('status','on')->count()}}</span>
            </div>
            @endfor
            
        </div>
        <div class="product__rating-rating--btn">
            <p>Bạn đã dùng sản phẩm này ?</p>
            <a href="javascript:;">Gửi đánh giá của bạn</a>
        </div>
        <div class="form-review">
            <form action="{{route('storeReview')}}" method="POST" enctype="multipart/form-data"
                class="formAjaxReview">
                @csrf
                @method('POST')
                <div class="stars">
                    <span class=""><b>Vui lòng chọn đánh giá: </b></span>
                    {{-- @for ($count = 5; $count >= 1; $count--) --}}
                        <input type="radio" id="start1" name="votes" value="5">
                        <label for="star1" class="rate fa fa-star"></label>
                        <input type="radio" id="start2" name="votes" value="4">
                        <label for="start2" class="rate fa fa-star"></label>
                        <input type="radio" id="start3" name="votes" value="3">
                        <label for="start3" class="rate fa fa-star"></label>
                        <input type="radio" id="start4" name="votes" value="2">
                        <label for="start4" class="rate fa fa-star"></label>
                        <input type="radio" id="start5" name="votes" value="1">
                        <label for="start5" class="rate fa fa-star"></label>
                    {{-- @endfor --}}
                </div>
                <div class="preview row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="detail">Đánh giá:</label>
                            <textarea class="form-control" name="content" rows="5" id="detail"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Họ và tên:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <input type="hidden" name="uuid" value="{{$productDetail->slug}}">
                        <button type="submit" class="btn btn-danger">Gửi đánh giá</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="product__rating-comment">
        <div class="product__rating-comment--filter">
            <select name="" id="review_order">
                <option value="1">Mới nhất</option>
                <option value="2">Cũ nhất</option>
                {{--  <option value="">Hữu ích nhất</option>  --}}
            </select>
        </div>
        <div id="showreview" data-url="{{route('getReview')}}" data-id="{{$productDetail->product_id}}">
            @foreach ($review as $item)
            <div class="product__rating-comment--item">
                <div class="avatar">
                    <img class="lozad" data-src="{{$item->image ?? asset('website/img/user.svg')}}" alt="">
                </div>
                <div class="content">
                    <div class="name">
                        <span>{{$item->name}}</span>
                    </div>
                    <div class="rating">
                        <div class="star">
                            {!! showStar($item->votes) !!}
                        </div>
                        <div class="date">
                            <span>vào ngày {{date_format($item->created_at,'d/m/Y')}}</span>
                        </div>
                    </div>
                    <div class="comment">
                        <p>{{$item->content}}</p>
                    </div>
                    {{--  <div href="javascript:;" class="like">
                        <a class="like-btn liked" href="javascript:;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="15" height="15" x="0"
                                y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512"
                                xml:space="preserve" class="">
                                <g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M53.333,224C23.936,224,0,247.936,0,277.333V448c0,29.397,23.936,53.333,53.333,53.333h64    c12.011,0,23.061-4.053,32-10.795V224H53.333z"
                                                fill="#0d6ffa" data-original="#000000" class="" />
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M512,304c0-12.821-5.077-24.768-13.888-33.579c9.963-10.901,15.04-25.515,13.653-40.725    c-2.496-27.115-26.923-48.363-55.637-48.363H324.352c6.528-19.819,16.981-56.149,16.981-85.333c0-46.272-39.317-85.333-64-85.333    c-22.165,0-37.995,12.48-38.677,12.992c-2.517,2.027-3.989,5.099-3.989,8.341v72.341l-61.44,133.099l-2.56,1.301v228.651    C188.032,475.584,210.005,480,224,480h195.819c23.232,0,43.563-15.659,48.341-37.269c2.453-11.115,1.024-22.315-3.861-32.043    c15.765-7.936,26.368-24.171,26.368-42.688c0-7.552-1.728-14.784-5.013-21.333C501.419,338.731,512,322.496,512,304z"
                                                fill="#0d6ffa" data-original="#000000" class="" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span>Thích (6)</span>
                        </a>
                    </div>  --}}
                </div>
            </div>
            @endforeach
        </div>
        
        @if ($review->lastPage() > 1)
        <div class="product__rating-comment--pagination">
            <ul id="pagireview" >
                @php
                    $check='active';
                @endphp
                @for ($i = 1; $i <= $review->lastPage(); $i++)
                    <li class="{{$check}}" data-page="{{$i}}"><a href="javascript:;">{{$i}}</a></li>
                    @php
                        $check='';
                    @endphp
                @endfor
            </ul>
        </div>
        @endif
        
    </div>
</div>