<div>
    <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{route('shop.cart')}}">
                                    <img alt="cart" src="{{ asset('user-interface/imgs/theme/icons/icon-cart.svg') }}">

                                        @if(Cart::count() > 0)
                                        <span class="pro-count blue">{{Cart::count()}}</span>
                                        @endif
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                        @foreach(Cart::content() as $item)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="">
                                                        <img alt="{{ $item->name }}" src="{{ asset('user-interface/imgs/shop/product-')}}{{$item->id}}-1.jpg" alt="{{ $item->name }}">
                                                    </a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="">{{ $item->name }}</a></h4>
                                                    <h4><span>{{ $item->qty }} × </span>${{ number_format($item->price, 2) }}</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#" wire:click.prevent="deleteItem('{{ $item->rowId }}')">
                                                        <i class="fi-rs-cross-small"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>{{Cart::total()}}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{route('shop.cart')}}" class="outline">View cart</a>
                                                <a href="checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
