<div>
    <style>

.wishlisted{
    background-color: orange !important;
    border: solid transparent !important ;

}
.wishlisted i{
    color: white !important;
}
    </style>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home.index') }}" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{$products->total()}}</strong> items for you!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$selectedOption}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a href="#" wire:click.prevent="UpdatedPageSize(10)" class="@if($selectedOption == 10) active @endif">10</a></li>
                                        <li><a href="#" wire:click.prevent="UpdatedPageSize(20)" class="@if($selectedOption == 20) active @endif">20</a></li>
                                        <li><a href="#" wire:click.prevent="UpdatedPageSize(30)" class="@if($selectedOption == 30) active @endif">30</a></li>
                                        <li><a href="#" wire:click.prevent="UpdatedPageSize(50)" class="@if($selectedOption == 50) active @endif">50</a></li>
                                    </ul>

                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{ $sortname }} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a wire:click="sortBy('created_at')" class="{{ $sortField === 'created_at' ? 'active' : '' }}">Defult</a></li>
                                            <li><a wire:click="sortBy('regular_price')" class="{{ $sortField === 'regular_price' ? 'active' : '' }}">Price: Low to High</a></li>
                                            <li><a wire:click="sortBy('regular_price')" class="{{ $sortField === 'regular_price' ? 'active' : '' }}">Price: High to Low</a></li>
                                            <li><a wire:click="sortBy('created_at')" class="{{ $sortField === 'release_date' ? 'active' : '' }}">Featured</a></li>
                                            <li><a wire:click="sortBy('avg_rating')" class="{{ $sortField === 'avg_rating' ? 'active' : '' }}">Avg Rating</a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row product-grid-3">

                           @php


                                $witems=Cart::instance('wishlist')->content()->pluck('id');
                           

                           @endphp

                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                
                                                <img class="default-img" src="{{ asset('images/product/' . $product->image) }}" alt="">
                                                <img class="hover-img" src="{{ asset('images/product/' . $product->image) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">{{$product->category_id}}</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop.html">{{$product->category_id}}</a>
                                        </div>
                                        <h2><a href="product-details.html">{{$product->name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>${{$product->regular_price}} </span>
                                            <span class="old-price">{{$product->regular_price}}</span>
                                        </div>
                                        <div class="product-action-1 show">

                                            @if($witems->contains($product->id))

                                            <a aria-label="Remove From Wishlist" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="deleteFromWisshList({{$product->id}})"><i class="fi-rs-heart"></i></a>

                                                
                                            @else
                                                  <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWisshList({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fi-rs-heart"></i></a>
          
                                            @endif

                                            

                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       

                            @endforeach
                
                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <!-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav> -->

                            {{$products->links()}}
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach($category as $category)
                                     <li><a href="{{route('product.category',['slug'=>$category->slug])}}">{{$category->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Fill by price</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" wire:ignore></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Range: <span class="text_info">{{ $min_value }}</span> - <span class="text_info">{{ $max_value }}</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group">
                               
                            </div>
                            <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
                        </div>
                        <!-- Product sidebar Widget -->
                   
                    </div>
                </div>
            </div>
        </section>
    </main></div>

    @push('Scripts')
    <script>
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');

        $(function() {
            sliderrange.slider({
                range: true,
                min: 0,
                max: 1000,
                values: [0, 1000],
                slide: function(event, ui) {
                    amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
                    @this.set('min_value', ui.values[0]);
                    @this.set('max_value', ui.values[1]);
                }
            });
        });
    </script>
@endpush


