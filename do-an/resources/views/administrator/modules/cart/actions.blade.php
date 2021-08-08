<div class="list-icons">
    <div class="dropdown">
        <a href="#" class="list-icons-item" data-toggle="dropdown">
            <i class="icon-menu9"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('admin.cart.show', ['cart' => $uuid])  }}" class="dropdown-item text-info"><i class="icon-eye"></i> {{ behavior('action.detail') }}</a>
            @can('cart_edit')
                @if($status==1)
                    <a href="{{ route('admin.changestatusorder', ['uuid' => $uuid,'status' => 2]) }}" class="dropdown-item text-success"><i class="icon-checkmark3"></i> {{ behavior('action.success') }}</a>
                    <a href="{{ route('admin.changestatusorder', ['uuid' => $uuid,'status' => 5]) }}" class="dropdown-item text-danger"><i class="icon-trash"></i> {{ behavior('action.cancel') }}</a>
                @elseif($status==2)
                    <a href="{{ route('admin.changestatusorder', ['uuid' => $uuid,'status' => 3]) }}" class="dropdown-item text-dark"><i class="icon-truck"></i> {{ behavior('action.delevery') }}</a>
                    <a href="{{ route('admin.changestatusorder', ['uuid' => $uuid,'status' => 5]) }}" class="dropdown-item text-danger"><i class="icon-trash"></i> {{ behavior('action.cancel') }}</a>
                @elseif($status==3)
                    <a href="{{ route('admin.changestatusorder', ['uuid' => $uuid,'status' => 4]) }}" class="dropdown-item text-primary"><i class="icon-task"></i> {{ behavior('action.success_delevery') }}</a>
                    <a href="{{ route('admin.changestatusorder', ['uuid' => $uuid,'status' => 5]) }}" class="dropdown-item text-danger"><i class="icon-trash"></i> {{ behavior('action.cancel') }}</a>
                @endif      
            @endcan

            {{--  @can('cart_destroy')
                <a href="{{ route('admin.cart.destroy', ['cart' => $uuid]) }}" class="dropdown-item accept_delete text-danger"><i class="icon-trash"></i> {{ behavior('action.delete') }}</a>
            @endcan  --}}

            {{--  @if (config('app.multi_language'))
                @can('category_create')
                    @php
                        $translate = $cart->translateRemaining($uuid)
                    @endphp

                    @if ($translate["full"])
                        <a class="dropdown-item"><i class="icon-earth"></i>{{ behavior('action.language') }} {!! $translate['language'] !!}</a>
                    @else
                        <a href="{{ route('admin.cart.language', ['cart' => $uuid]) }}" class="dropdown-item"><i class="icon-earth"></i>{{ behavior('action.language') }} {!! $translate['language'] !!}</a>
                    @endif
                @endcan
            @endif  --}}

        </div>
    </div>
</div>
