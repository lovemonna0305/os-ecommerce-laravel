@php
    if (auth()->user() != null) {
        $user_id = Auth::user()->id;
        $cart = \App\Models\Cart::where('user_id', $user_id)->get();
    } else {
        $temp_user_id = Session()->get('temp_user_id');
        if ($temp_user_id) {
            $cart = \App\Models\Cart::where('temp_user_id', $temp_user_id)->get();
        }
    }

    $cart_added = array();
    if(isset($cart) && count($cart) > 0){
        $cart_added = $cart->pluck('product_id')->toArray();
    }

    $product_url = route('product', $product->slug);
    if($product->auction_product == 1) {
        $product_url = route('auction-product', $product->slug);
    }
@endphp

    <div class="product_img" style="height:400px;">
        <a href="{{ $product_url }}">
            <img class="lazyload" src="{{ static_asset('assets/img/placeholder.jpg') }}"
                data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                alt="{{  $product->getTranslation('name')  }}" title="{{  $product->getTranslation('name')  }}"
                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
        </a>
        <div class="product_action_box">
            <ul class="list_none pr_action_btn">
                <li class="add-to-cart"><a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                <li><a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                <li><a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})"><i class="icon-heart"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="product_info">
        <h6 class="product_title"><a href="{{ $product_url }}" title="{{  $product->getTranslation('name')  }}">{{  $product->getTranslation('name')  }}</a></h6>
        <div class="product_price">

            @if($product->auction_product == 0)
                <span class="price">{{ home_discounted_base_price($product) }}</span>
                <!-- Previous price -->
                @if(home_base_price($product) != home_discounted_base_price($product))
                    <del>{{ home_base_price($product) }}</del>
                @endif
            @endif
            <div class="on_sale">
                @if(discount_in_percentage($product) > 0)
                    <span>-{{discount_in_percentage($product)}}%</span>
                @endif
            </div>
        </div>
        <div class="rating_wrap">
                @php
                    $total = 0;
                    $total += $product->reviews->count();
                @endphp
                <div class="rating">
                    <div class="product_rate" style="width:{{ ($product->rating/5)*100 }}%"></div>
                </div>
            <span class="rating_num">({{ $total }})</span>
        </div>
        <div class="pr_desc">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
        </div>
        <!-- <div class="pr_switch_wrap">
            <div class="product_color_switch">
                <span class="active" data-color="#87554B"></span>
                <span data-color="#333333"></span>
                <span data-color="#DA323F"></span>
            </div>
        </div> -->
    </div>


    <div class="fs-14 d-flex justify-content-center mt-3">
        @if($product->auction_product == 1)
            <!-- Bid Amount -->
            <div class="">
                <span class="fw-700 text-primary">{{ single_price($product->starting_bid) }}</span>
            </div>
        @endif
    </div>