@extends('customer.index')

@section('lading_content')
    <div class="site-blocks-cover" style="background-image: url('{{ asset('customer/images/hero_1.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                    <div class="site-block-cover-content text-center">
                        <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
                        <h1>Welcome To Pharma</h1>
                        <p>
                            <a href="{{route('view-products')}}" class="btn btn-primary px-5 py-3">Shop Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row align-items-stretch section-overlap">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-primary h-100">
                <a href="#" class="h-100">
                    <h5>Free <br> Shipping</h5>
                    <p>
                        Amet sit amet dolor
                        <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                    </p>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap h-100">
                <a href="#" class="h-100">
                    <h5>Season <br> Sale 50% Off</h5>
                    <p>
                        Amet sit amet dolor
                        <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                    </p>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-warning h-100">
                <a href="#" class="h-100">
                    <h5>Buy <br> A Gift Card</h5>
                    <p>
                        Amet sit amet dolor
                        <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                    </p>
                </a>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Popular Products</h2>
                </div>
            </div>
            <div class="row">
                @forelse($products as $product)
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        @if($product->sell_price < $product->price)
                            <span class="tag">Sale</span>
                        @endif
                            <a href="{{route('show-products',$product->id)}}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->trading_name }}" width="200px">
                        </a>
                        <h3 class="text-dark">
                            <a href="{{route('show-products',$product->id)}}">{{ $product->trading_name }}</a>
                        </h3>
                        <p class="price">
                            @if($product->sell_price < $product->price)
                                <del>${{ number_format($product->price, 2) }}</del> &mdash;
                            @endif
                            ${{ number_format($product->sell_price, 2) }}
                        </p>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No products found.</p>
                    </div>
                @endforelse
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="{{ route('view-products') }}" class="btn btn-primary px-4 py-3">View All Products</a>
                </div>
            </div>
        </div>
    </div>

@endsection
