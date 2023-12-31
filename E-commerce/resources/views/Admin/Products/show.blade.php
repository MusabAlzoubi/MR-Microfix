@extends('Admin.layouts.app')

@section('content')




<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>{{ $product->name }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Regular Price:</strong> ${{ $product->regular_price }}</p>
                    
                    @if($product->sale_price)
                        <p><strong>Sale Price:</strong> ${{ $product->sale_price }}</p>
                    @endif

                    <p><strong>Category:</strong> {{ optional($product->category)->name }}</p>

                    <!-- Display Images -->
                    @if($product->image)
                        <div class="mt-3">
                            <p><strong>Image:</strong></p>
                            <figure class="border-radius-10">
                                <img src="{{ asset('images/product/' . $product->image) }}" alt="product image">
                            </figure>
                        </div>
                    @endif

                    @if($product->images)
                        <div class="mt-3">
                            <p><strong>Images:</strong></p>
                            <div class="row">
                                @foreach (json_decode($product->images) as $imageName)
                                    <div class="col-md-4 mb-3">
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('images/product/' . $imageName) }}" alt="product image">
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>





@endsection