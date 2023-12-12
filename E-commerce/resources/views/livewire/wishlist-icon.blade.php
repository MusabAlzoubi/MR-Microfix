<div class="header-action-2">
   

    <div>
        <div class="header-action-icon-2">
                                        <a href="{{route('product.wishlist')}}">
                                            <img class="svgInject" alt="wishlist" src="{{asset('user-interface/imgs/theme/icons/icon-heart.svg')}}">
                                            @if (Cart::instance('wishlist')->count() > 0)
                                            <span class="pro-count blue">{{Cart::instance('wishlist')->count()}}</span>
                                        @endif   
                                        </a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul>
                                            @foreach(Cart::instance('wishlist')->content() as $item)
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="">
                                                            <img alt="{{ $item->name }}" src="{{ asset('user-interface/imgs/shop/product-')}}{{$item->id}}-1.jpg" alt="{{ $item->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="">{{ $item->name }}</a></h4>
                                                        <h4>${{ number_format($item->price, 2) }}</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                            <a aria-label="Remove From Wishlist" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="deleteFromWisshList({{$item->id}})"><i class="fi-rs-cross-small"></i></a>

                                                            
                                                        </a>
                                                    </div>
                                                </li>
                                            @endforeach
                                            </ul>
                                         
                                        </div>
                                    </div>
                                </div>
    