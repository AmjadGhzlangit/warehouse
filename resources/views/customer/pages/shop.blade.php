@extends('customer.index')

@section('content')
    <div class="site-section">
        <div class="container">

            <!-- Filter Section -->
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Sort by</h3>
                    <form action="{{ route('view-products') }}" method="GET">
                        <div class="form-group">
                            <select class="form-control" name="sort_by">
                                <option value="relevance">Relevance</option>
                                <option value="name_asc">Name, A to Z</option>
                                <option value="name_desc">Name, Z to A</option>
                                <option value="price_asc">Price, low to high</option>
                                <option value="price_desc">Price, high to low</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Apply</button>
                    </form>
                </div>
            </div>


            <div class="row mt-4">
                @forelse($products as $product)
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        @if($product->sell_price < $product->price)
                            <span class="tag">Sale</span>
                        @endif
                        <a href="{{route('show-products',$product->id)}}">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->trading_name }}" width="200px">
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
                <div class="col-12 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
