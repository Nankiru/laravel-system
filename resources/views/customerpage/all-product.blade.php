@extends('layouts/component')
@section('title','Product Details')
@section('contents')
<section class="trending-product section py-5" style="margin-top: 12px;">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h2>Products Brand {{ $category }}</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form.</p>
                </div>
            </div>
        </div>

        @if ($products->count() > 0)
            <!-- Product Grid -->
            <div class="row g-3">
                @foreach ($products as $product)
                    @php
                        $total = $product->price - $product->discount_price;
                    @endphp
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                        <div class="card">
                            <div class="image-container">
                                <div class="first">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-primary">🔥Hot</span>
                                        <span class="wishlist1">
                                            <i class="lni lni-heart"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="image-container d-flex justify-content-center align-items-center"
                                    style="height: 200px; background-color: #f8f9fa; padding: 10px;">
                                    <a href="{{ url('/product-detail', $product->id) }}">
                                        <img src="{{ asset('uploads/products/galaries/' . $product->image) }}"
                                            class="img-fluid rounded-top thumbnail-image"
                                            alt="{{ $product->name }}"
                                            style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                    </a>
                                </div>
                            </div>

                            <div class="product-detail-container p-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="dress-name">{{ $product->name }}</h5>
                                    <div class="d-flex flex-column mb-2">
                                        <span class="new-price">${{ number_format($product->price, 0) }}</span>
                                        <small class="fs-7 text-decoration-line-through text-muted">
                                            ${{ number_format($product->discount_price, 0) }}
                                        </small>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-1">
                                    <p class="mb-0">New Stock</p>
                                    <p class="text-primary fw-semibold mb-0">${{ $total }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pt-1">
                                    <div>
                                        <i class="fa fa-star-o rating-star"></i>
                                        <span class="rating-number">{{ $product->category }}</span>
                                    </div>
                                    <form action="{{ url('add_to_cart', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- No Products Found -->
            <div class="text-center py-5">
                <h2>404 - No Products Found</h2>
                <p>Sorry, we couldn't find any products for category "{{ $category }}".</p>
                <a href="{{ url('/index') }}" class="btn btn-primary mt-3">Return to Home</a>
            </div>
        @endif
    </div>
</section>

@endsection