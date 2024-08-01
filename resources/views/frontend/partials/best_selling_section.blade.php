@php
    $best_selling_products = Cache::remember('best_selling_products', 86400, function () {
        return filter_products(\App\Models\Product::where('published', 1)->orderBy('num_of_sale', 'desc'))->limit(20)->get();
    });   
@endphp

@if (get_setting('best_selling') == 1 && count($best_selling_products) > 0)

    @foreach ($best_selling_products as $key => $product)
        <div class="col-lg-3 col-md-4 col-6">
            <div class="product">
                @include('frontend.partials.product_box_1',['product' => $product])
            </div>
        </div>
    @endforeach
 
@endif
