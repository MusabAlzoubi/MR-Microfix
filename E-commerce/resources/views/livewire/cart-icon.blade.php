<div>
    <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{route('shop.cart')}}">
                                    <img alt="cart" src="{{ asset('user-interface/imgs/theme/icons/icon-cart.svg') }}">

                                        @if(Cart::instance('cart')->count() > 0)
                                        <span class="pro-count blue">{{Cart::count()}}</span>
                                        @endif
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                        @foreach(Cart::instance('cart')->content() as $item)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="">
                                                        <img  src="{{ asset('images/product/' . $item->model->image) }}" alt="{{ $item->name }}">
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
                                                <h4>Total <span>{{Cart::instance('cart')->total()}}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{route('shop.cart')}}" class="outline">View cart</a>
                                                @if(Auth::check())
                                                <a href="{{ route('shop.chekout') }}" class="outline">
                                                    <i class="fi-rs-box-alt mr-10"></i> Proceed To Checkout
                                                </a>
                                            @else
                                                <div class="alert alert-warning" role="alert">
                                                    <button disabled class="outline btn-disabled">
                                                        <i class="fi-rs-box-alt mr-10"></i> Proceed To Checkout
                                                    </button>
                                                    <p>We require you to be logged in first.</p>
                                                </div>
                                            @endif                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
