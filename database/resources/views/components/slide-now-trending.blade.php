<div class="block-now-trending">
    <h1 class="block-now-trending__title">Now Trending</h1>
    <div class="block-now-trending__slide">
        @foreach($products as $product)
            @if($product['isTrending'])
                <div class="block-now-trending__slide__item">
                    <a href="{{ route('mypage.product-detail.show',$product['id']) }}">
                        <img src="/storage/files/{{ $product['photos'][0] }}" class="img img-fluid" alt="#">
                    </a>
                </div>
            @endif
        @endforeach
    </div>
</div>
