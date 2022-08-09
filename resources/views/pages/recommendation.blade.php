@extends('layouts.app')

@section('recommendation')
    Swa Mobile Rekomendasi Produk
@endsection

@section('content')
<div class="page-content page-home">
    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-6" data-aos="fade-up">
                    <h5>Rekomendasi Produk Kamu</h5>
                </div>
                <div class="col-6" data-aos="fade-up">
                
                
                </div> 
            </div>
            <div class="row">
                
                @foreach ($recommendation as $key => $value)
                    @php
                        $product = getProduct($key);
                    @endphp
                    <div
                    class="col-6 col-md-4 col-lg-3"
                    data-aos="fade-up"
                    data-aos-delay="50"
                    >
                        <a href="{{ route('detail-product',$product->slug) }}" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div
                                class="products-image"
                                style="
                                    @if($product->galleries->count() > 0 )
                                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                                    @else
                                        background-color: #eee;
                                    @endif
                                "
                                >
                                </div>
                            </div>
                            <div class="products-text">
                                {{  $product->name }}
                            </div>
                        
                            <div class="owner">
                                By. {{ $product->user->store_name }}
                            </div>
                        
                            <div class="products-price">
                                Rp.{{ $product->price }}
                            </div>
                            <div class="products-price">
                                {{ $product->day }} Hari
                            </div>
                        </a>
                    </div>
                @endforeach
                
            </div>
            
        </div>
    </section>
</div>
@endsection

