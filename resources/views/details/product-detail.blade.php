@extends('layouts/component')
@section('title', 'Product '.$product_detail->name)
@section('contents')

    {{-- Style Transition and duration --}}

    <style>
        #mainImage {
            max-width: 100%;
            max-height: 100vh;
            margin: auto;
            padding: 15px;
            transition: opacity 0.4s ease-in-out;
        }
    </style>


    <!-- content product detail -->
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center align-items-center"
                        style="height: 500px; overflow: hidden;">
                        <a data-fslightbox="mygalley" class="rounded-4" data-type="image"
                            href="{{ asset('uploads/products/galaries/' . $product_detail->image) }}">
                            <img id="mainImage" style="max-width: 100%; max-height: 100vh; margin: auto;padding:15px"
                                class="rounded-4 fit"
                                src="{{ asset('uploads/products/galaries/' . $product_detail->image) }}" />
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a href="#" class=" border item-thumb rounded-2"
                            style="width: 60px; height: 60px; display: inline-block; overflow: hidden;"
                            data-img-src="{{ asset('uploads/products/mainimages/' . $product_detail->img1) }}">
                            <img width="60" height="60" class="item-thumb"
                                src="{{ asset('uploads/products/mainimages/' . $product_detail->img1) }}" />
                        </a>
                        <a href="#" class=" border item-thumb mx-1 rounded-2"
                            style="width: 60px; height: 60px; display: inline-block; overflow: hidden;"
                            data-img-src="{{ asset('uploads/products/mainimages/' . $product_detail->img2) }}">
                            <img width="60" height="60" class="rounded-2"
                                src="{{ asset('uploads/products/mainimages/' . $product_detail->img2) }}" />
                        </a>
                        <a href="#" class=" border item-thumb mx-1 rounded-2"
                            style="width: 60px; height: 60px; display: inline-block; overflow: hidden;"
                            data-img-src="{{ asset('uploads/products/mainimages/' . $product_detail->img3) }}">
                            <img width="60" height="60" class="rounded-2"
                                src="{{ asset('uploads/products/mainimages/' . $product_detail->img3) }}" />
                        </a>
                        <a href="#" class=" border item-thumb mx-1 rounded-2"
                            style="width: 60px; height: 60px; display: inline-block; overflow: hidden;"
                            data-img-src="{{ asset('uploads/products/galaries/' . $product_detail->image) }}">
                            <img width="60" height="60" class="rounded-2"
                                src="{{ asset('uploads/products/galaries/' . $product_detail->image) }}" />
                        </a>
                    </div>
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{$product_detail->name}}
                            <span>
                                {{$product_detail->tags}}
                            </span>
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">4.5</span>
                            </div>
                            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                            <span class="text-success ms-2">In stock</span>
                        </div>

                        <div class="mb-3">
                            <span class="h5 text-primary">${{$product_detail->price}}</span>
                            <span class="text-muted ">/ <span
                                    class="text-decoration-line-through">${{$product_detail->discount_price}}</span> </span>
                        </div>
                        @php
                            $total_price = $product_detail->price - $product_detail->discount_price;
                        @endphp
                        <div class="row mt-3">

                            <dt class="col-3 text-black" style="color: black">Brand</dt>
                            <dd class="col-9">{{ $product_detail->brand }}</dd>

                            <dt class="col-3 text-black" style="color: black">Ram</dt>
                            <dd class="col-9">{{ $product_detail->ram }}</dd>

                            <dt class="col-3 text-black" style="color: black">Storage</dt>
                            <dd class="col-9">{{ $product_detail->storage }}</dd>

                            <dt class="col-3 text-black " style="color: black;white-space: nowrap; vertical-align: center;">
                                OS</dt>
                            <dd class="col-9">Window 11</dd>

                            <dt class="col-3 text-black" style="color: black"
                                style="white-space: nowrap; vertical-align: center;">CPU Model</dt>
                            <dd class="col-9">Core i7</dd>

                            <dt class="col-3 text-black" style="color: black">Screen Size</dt>
                            <dd class="col-9">17 inches</dd>

                            <dt class="col-3 text-black" style="color: black">Total Price</dt>
                            <dd class="col-9">${{ number_format($total_price, 2) }}</dd>
                        </div>
                        <p>
                            {{$product_detail->description}}
                        </p>

                        <hr />

                        <div class="row mb-4">
                            <div class="col-md-4 col-6">
                                <label class="mb-2">Size</label>
                                <select class="form-select border border-secondary" style="height: 35px;">
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-6 mb-3">
                                <label class="mb-2 d-block">Quantity</label>
                                <div class="input-group mb-3" style="width: 170px;">
                                    <button class="btn btn-white border border-secondary px-3" type="button">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="text" class="form-control text-center border border-secondary"
                                        placeholder="14" />
                                    <button class="btn btn-white border border-secondary px-3" type="button">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                        {{-- <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart --}}
                            <form action="{{ url('add_to_cart', $product_detail->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary shadow-0">Add to Cart</button>
                            </form>
                        {{-- </a> --}}
                        <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i
                                class="me-1 fa fa-heart fa-lg"></i> Save </a>
                                </div>
                    </div>
                </main>
            </div>
        </div>
    </section>


    <!-- Similar Items -->
    <section class="bg-light border-top py-4">
        <div class="container">
            <h5 class="mb-4">Similar Items</h5>
            <div class="row g-3">
                @foreach ($similar_items as $item)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="card h-100 text-center border-0 shadow-sm">
                            <div class="image-wrapper" style="overflow: hidden;">
                                <a href="{{ url('/product-detail', $item->id) }}">
                                    <img src="{{ asset('uploads/products/galaries/' . $item->image) }}" alt="{{ $item->name }}"
                                        class="card-img-top img-fluid hover-scale"
                                        style="height: 180px; object-fit: contain; background-color: #f8f9fa; padding: 10px;" />
                                </a>
                            </div>
                            <div class="card-body p-2">
                                <a href="{{ url('/product-detail', $item->id) }}" class="text-dark d-block fw-semibold mb-1">
                                    {{ \Illuminate\Support\Str::limit($item->name, 35) }}
                                </a>
                                <div class="text-primary fw-bold">${{ number_format($item->price, 2) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .hover-scale {
            transition: transform 0.4s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>




    <style>
        .icon-hover:hover {
            border-color: #3b71ca !important;
            background-color: white !important;
            color: #3b71ca !important;
        }

        .icon-hover:hover i {
            color: #3b71ca !important;
        }
    </style>


    {{--
    <script>
        document.querySelectorAll('.item-thumb').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                const mainImage = document.getElementById('mainImage');
                const newSrc = this.getAttribute('data-img-src');
                mainImage.src = newSrc;
            });
        });
    </script> --}}


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.item-thumb');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function (e) {
                    e.preventDefault();

                    const newSrc = this.getAttribute('data-img-src');

                    // Fade out
                    mainImage.style.opacity = 0;

                    setTimeout(() => {
                        // Change image source
                        mainImage.src = newSrc;

                        // Fade in
                        mainImage.style.opacity = 1;
                    }, 400); // Match this to the CSS transition duration
                });
            });
        });
    </script>






@endsection