@extends('frontend.layouts.app')

@section('content')

<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active background_bg" data-img-src="{{ static_asset('assets1/images/banner1.png') }}" style="background-image: url({{ static_asset('assets1/images/banner1.png') }});">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                	<h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">Get up to 50% off Today Only!</h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Woman's Fashion</h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{ route('search') }}" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="{{ static_asset('assets1/images/banner2.png') }}" style="background-image: url({{ static_asset('assets1/images/banner2.png') }});">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner_content overflow-hidden">
                                	<h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">50% off in all products</h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Men's Fashion</h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{ route('search') }}" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="{{ static_asset('assets1/images/banner3.png') }}" style="background-image: url({{ static_asset('assets1/images/banner3.png') }});">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner_content overflow-hidden">
                                	<h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">Taking your Viewing Experience to Next Level</h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Summer Sale</h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{ route('search') }}" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- START SECTION BANNER -->
<div class="section pb_20">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="single_banner">
                	<img src="{{ static_asset('assets1/images/shop_banner_img1.png') }}" alt="shop_banner_img1"/>
                    <div class="single_banner_info">
                        <h5 class="single_bn_title1">Super Sale</h5>
                        <h3 class="single_bn_title">New Collection</h3>
                        <a href="{{ route('search') }}" class="single_bn_link">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="single_banner">
                	<img src="{{ static_asset('assets1/images/shop_banner_img2.png') }}" alt="shop_banner_img2"/>
                    <div class="single_banner_info">
                        <h3 class="single_bn_title">Gift</h3>
                        <h4 class="single_bn_title1">Sale 40% Off</h4>
                        <a href="{{ route('search') }}" class="single_bn_link">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>{{ translate('Best Selling') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    @php
                        $best_selling_products = Cache::remember('best_selling_products', 86400, function () {
                            return filter_products(\App\Models\Product::where('published', 1)->orderBy('num_of_sale', 'desc'))->limit(20)->get();
                        });   
                    @endphp
                    @if (get_setting('best_selling') == 1 && count($best_selling_products) > 0)

                        @foreach ($best_selling_products as $key => $product)
                        <div class="item">
                            <div class="product">
                                @include('frontend.partials.product_box',['product' => $product])
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- START SECTION SINGLE BANNER --> 
    <div class="section bg_light_blue2 pb-0 pt-md-0">
        <div class="container">
            <div class="row align-items-center flex-row-reverse justify-content-center">
                <div class="col-md-4">
                    <div class="medium_divider d-none d-md-block clearfix"></div>
                    <div class="trand_banner_text text-center text-md-start">
                        <div class="heading_s1 mb-3">
                            <span class="sub_heading">New season trends!</span>
                            <h2>Accessories</h2>
                        </div>
                        <h5 class="mb-4">Sale Get up to 50% Off</h5>
                        <a href="{{ route('search') }}" class="btn btn-fill-out rounded-0">Shop Now</a>
                    </div>
                    <div class="medium_divider clearfix"></div>
                </div>
                <div class="col-md-4">
                    <div class="text-center trading_img">
                        <img src="{{ static_asset('assets1/images/tranding_img.png') }}" alt="tranding_img"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SINGLE BANNER --> 

    @php
        $num_todays_deal = count($todays_deal_products);
    @endphp

    <!-- Flash Deal -->
    @php
        $flash_deal = \App\Models\FlashDeal::where('status', 1)->where('featured', 1)->first();
    @endphp
    

    <!-- Best Selling  -->
    <!-- <div id="section_best_selling">

    </div> -->

    
    

    <!-- Banner Section 3 -->
    @if (get_setting('home_banner3_images') != null)
    <div class="mb-2 mb-md-3 mt-2 mt-md-3">
        <div class="container">
            @php 
                $banner_3_imags = json_decode(get_setting('home_banner3_images')); 
                $data_md = count($banner_3_imags) >= 2 ? 2 : 1;
            @endphp
            <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15" data-items="{{ count($banner_3_imags) }}" data-xxl-items="{{ count($banner_3_imags) }}" data-xl-items="{{ count($banner_3_imags) }}" data-lg-items="{{ $data_md }}" data-md-items="{{ $data_md }}" data-sm-items="1" data-xs-items="1" data-arrows="true" data-dots="false">
                @foreach ($banner_3_imags as $key => $value)
                    <div class="carousel-box overflow-hidden hov-scale-img">
                        <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}" class="d-block text-reset overflow-hidden">
                            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($value) }}" 
                            alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100 has-transition" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Auction Product -->
    @if(addon_is_activated('auction'))
        <div id="auction_products">
        </div>
    @endif

    <!-- Cupon -->
    @if(get_setting('coupon_system') == 1)
    <div class="mb-2 mb-md-3 mt-2 mt-md-3" style="background-color: {{ get_setting('cupon_background_color', '#292933') }}">
        <div class="container">
            <div class="row py-5">
                <div class="col-xl-8 text-center text-xl-left">
                    <div class="d-lg-flex">
                        <div class="mb-3 mb-lg-0">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="109.602" height="93.34" viewBox="0 0 109.602 93.34">
                                <defs>
                                  <clipPath id="clip-pathcup">
                                    <path id="Union_10" data-name="Union 10" d="M12263,13778v-15h64v-41h12v56Z" transform="translate(-11966 -8442.865)" fill="none" stroke="#fff" stroke-width="2"/>
                                  </clipPath>
                                </defs>
                                <g id="Group_24326" data-name="Group 24326" transform="translate(-274.201 -5254.611)">
                                  <g id="Mask_Group_23" data-name="Mask Group 23" transform="translate(-3652.459 1785.452) rotate(-45)" clip-path="url(#clip-pathcup)">
                                    <g id="Group_24322" data-name="Group 24322" transform="translate(207 18.136)">
                                      <g id="Subtraction_167" data-name="Subtraction 167" transform="translate(-12177 -8458)" fill="none">
                                        <path d="M12335,13770h-56a8.009,8.009,0,0,1-8-8v-8a8,8,0,0,0,0-16v-8a8.009,8.009,0,0,1,8-8h56a8.009,8.009,0,0,1,8,8v8a8,8,0,0,0,0,16v8A8.009,8.009,0,0,1,12335,13770Z" stroke="none"/>
                                        <path d="M 12335.0009765625 13768.0009765625 C 12338.3095703125 13768.0009765625 12341.0009765625 13765.30859375 12341.0009765625 13762 L 12341.0009765625 13755.798828125 C 12336.4423828125 13754.8701171875 12333.0009765625 13750.8291015625 12333.0009765625 13746 C 12333.0009765625 13741.171875 12336.4423828125 13737.130859375 12341.0009765625 13736.201171875 L 12341.0009765625 13729.9990234375 C 12341.0009765625 13726.6904296875 12338.3095703125 13723.9990234375 12335.0009765625 13723.9990234375 L 12278.9990234375 13723.9990234375 C 12275.6904296875 13723.9990234375 12272.9990234375 13726.6904296875 12272.9990234375 13729.9990234375 L 12272.9990234375 13736.201171875 C 12277.5576171875 13737.1298828125 12280.9990234375 13741.1708984375 12280.9990234375 13746 C 12280.9990234375 13750.828125 12277.5576171875 13754.869140625 12272.9990234375 13755.798828125 L 12272.9990234375 13762 C 12272.9990234375 13765.30859375 12275.6904296875 13768.0009765625 12278.9990234375 13768.0009765625 L 12335.0009765625 13768.0009765625 M 12335.0009765625 13770.0009765625 L 12278.9990234375 13770.0009765625 C 12274.587890625 13770.0009765625 12270.9990234375 13766.412109375 12270.9990234375 13762 L 12270.9990234375 13754 C 12275.4111328125 13753.9990234375 12278.9990234375 13750.4111328125 12278.9990234375 13746 C 12278.9990234375 13741.5888671875 12275.41015625 13738 12270.9990234375 13738 L 12270.9990234375 13729.9990234375 C 12270.9990234375 13725.587890625 12274.587890625 13721.9990234375 12278.9990234375 13721.9990234375 L 12335.0009765625 13721.9990234375 C 12339.412109375 13721.9990234375 12343.0009765625 13725.587890625 12343.0009765625 13729.9990234375 L 12343.0009765625 13738 C 12338.5888671875 13738.0009765625 12335.0009765625 13741.5888671875 12335.0009765625 13746 C 12335.0009765625 13750.4111328125 12338.58984375 13754 12343.0009765625 13754 L 12343.0009765625 13762 C 12343.0009765625 13766.412109375 12339.412109375 13770.0009765625 12335.0009765625 13770.0009765625 Z" stroke="none" fill="#fff"/>
                                      </g>
                                    </g>
                                  </g>
                                  <g id="Group_24321" data-name="Group 24321" transform="translate(-3514.477 1653.317) rotate(-45)">
                                    <g id="Subtraction_167-2" data-name="Subtraction 167" transform="translate(-12177 -8458)" fill="none">
                                      <path d="M12335,13770h-56a8.009,8.009,0,0,1-8-8v-8a8,8,0,0,0,0-16v-8a8.009,8.009,0,0,1,8-8h56a8.009,8.009,0,0,1,8,8v8a8,8,0,0,0,0,16v8A8.009,8.009,0,0,1,12335,13770Z" stroke="none"/>
                                      <path d="M 12335.0009765625 13768.0009765625 C 12338.3095703125 13768.0009765625 12341.0009765625 13765.30859375 12341.0009765625 13762 L 12341.0009765625 13755.798828125 C 12336.4423828125 13754.8701171875 12333.0009765625 13750.8291015625 12333.0009765625 13746 C 12333.0009765625 13741.171875 12336.4423828125 13737.130859375 12341.0009765625 13736.201171875 L 12341.0009765625 13729.9990234375 C 12341.0009765625 13726.6904296875 12338.3095703125 13723.9990234375 12335.0009765625 13723.9990234375 L 12278.9990234375 13723.9990234375 C 12275.6904296875 13723.9990234375 12272.9990234375 13726.6904296875 12272.9990234375 13729.9990234375 L 12272.9990234375 13736.201171875 C 12277.5576171875 13737.1298828125 12280.9990234375 13741.1708984375 12280.9990234375 13746 C 12280.9990234375 13750.828125 12277.5576171875 13754.869140625 12272.9990234375 13755.798828125 L 12272.9990234375 13762 C 12272.9990234375 13765.30859375 12275.6904296875 13768.0009765625 12278.9990234375 13768.0009765625 L 12335.0009765625 13768.0009765625 M 12335.0009765625 13770.0009765625 L 12278.9990234375 13770.0009765625 C 12274.587890625 13770.0009765625 12270.9990234375 13766.412109375 12270.9990234375 13762 L 12270.9990234375 13754 C 12275.4111328125 13753.9990234375 12278.9990234375 13750.4111328125 12278.9990234375 13746 C 12278.9990234375 13741.5888671875 12275.41015625 13738 12270.9990234375 13738 L 12270.9990234375 13729.9990234375 C 12270.9990234375 13725.587890625 12274.587890625 13721.9990234375 12278.9990234375 13721.9990234375 L 12335.0009765625 13721.9990234375 C 12339.412109375 13721.9990234375 12343.0009765625 13725.587890625 12343.0009765625 13729.9990234375 L 12343.0009765625 13738 C 12338.5888671875 13738.0009765625 12335.0009765625 13741.5888671875 12335.0009765625 13746 C 12335.0009765625 13750.4111328125 12338.58984375 13754 12343.0009765625 13754 L 12343.0009765625 13762 C 12343.0009765625 13766.412109375 12339.412109375 13770.0009765625 12335.0009765625 13770.0009765625 Z" stroke="none" fill="#fff"/>
                                    </g>
                                    <g id="Group_24325" data-name="Group 24325">
                                      <rect id="Rectangle_18578" data-name="Rectangle 18578" width="8" height="2" transform="translate(120 5287)" fill="#fff"/>
                                      <rect id="Rectangle_18579" data-name="Rectangle 18579" width="8" height="2" transform="translate(132 5287)" fill="#fff"/>
                                      <rect id="Rectangle_18581" data-name="Rectangle 18581" width="8" height="2" transform="translate(144 5287)" fill="#fff"/>
                                      <rect id="Rectangle_18580" data-name="Rectangle 18580" width="8" height="2" transform="translate(108 5287)" fill="#fff"/>
                                    </g>
                                  </g>
                                </g>
                            </svg>
                        </div>
                        <div class="ml-lg-3">
                            <h5 class="fs-36 fw-400 text-white mb-3">{{ translate(get_setting('cupon_title')) }}</h5>
                            <h5 class="fs-20 fw-400 text-gray">{{ translate(get_setting('cupon_subtitle')) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 text-center text-xl-right mt-4">
                    <a href="{{ route('coupons.all') }}" class="btn text-white hov-bg-white hov-text-dark border border-width-2 fs-16 px-4" style="border-radius: 28px;background: rgba(255, 255, 255, 0.2);box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.16);">{{ translate('View All Coupons') }}</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Category wise Products -->
    <div id="section_home_categories" class="mb-2 mb-md-3 mt-2 mt-md-3">

    </div>

    <!-- Classified Product -->
    @if(get_setting('classified_product') == 1)
        @php
            $classified_products = \App\Models\CustomerProduct::where('status', '1')->where('published', '1')->take(6)->get();
        @endphp
        @if (count($classified_products) > 0)
            <section class="mb-2 mb-md-3 mt-2 mt-md-3">
                <div class="container">
                    <!-- Top Section -->
                    <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                        <!-- Title -->
                        <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                            <span class="">{{ translate('Classified Ads') }}</span>
                        </h3>
                        <!-- Links -->
                        <div class="d-flex">
                            <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary" href="{{ route('customer.products') }}">{{ translate('View All Products') }}</a>
                        </div>
                    </div>
                    <!-- Banner -->
                    @if (get_setting('classified_banner_image') != null || get_setting('classified_banner_image_small') != null)
                        <div class="mb-3 overflow-hidden hov-scale-img d-none d-md-block">
                            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" 
                                data-src="{{ uploaded_asset(get_setting('classified_banner_image')) }}" 
                                alt="{{ env('APP_NAME') }} promo" class="lazyload img-fit h-100 has-transition" 
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </div>
                        <div class="mb-3 overflow-hidden hov-scale-img d-md-none">
                            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" 
                                data-src="{{ get_setting('classified_banner_image_small') != null ? uploaded_asset(get_setting('classified_banner_image_small')) : uploaded_asset(get_setting('classified_banner_image')) }}" 
                                alt="{{ env('APP_NAME') }} promo" class="lazyload img-fit h-100 has-transition" 
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </div>
                    @endif
                    <!-- Products Section -->
                    <div class="bg-white">
                        <div class="row no-gutters border-top border-left">
                            @foreach ($classified_products as $key => $classified_product)
                                <div class="col-xl-4 col-md-6 border-right border-bottom has-transition hov-shadow-out z-1">
                                    <div class="aiz-card-box p-2 has-transition bg-white">
                                        <div class="row hov-scale-img">
                                            <div class="col-4 col-md-5 mb-3 mb-md-0">
                                                <a href="{{ route('customer.product', $classified_product->slug) }}" class="d-block overflow-hidden h-auto h-md-150px text-center">
                                                    <img class="img-fluid lazyload mx-auto has-transition"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($classified_product->thumbnail_img) }}"
                                                        alt="{{ $classified_product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                </a>
                                            </div>
                                            <div class="col">
                                                <h3 class="fw-400 fs-14 text-dark text-truncate-2 lh-1-4 mb-3 h-35px d-none d-sm-block">
                                                    <a href="{{ route('customer.product', $classified_product->slug) }}" class="d-block text-reset hov-text-primary">{{ $classified_product->getTranslation('name') }}</a>
                                                </h3>
                                                <div class="fs-14 mb-3">
                                                    <span class="text-secondary">{{ $classified_product->user ? $classified_product->user->name : '' }}</span><br>
                                                    <span class="fw-700 text-primary">{{ single_price($classified_product->unit_price) }}</span>
                                                </div>
                                                @if($classified_product->conditon == 'new')
                                                    <span class="badge badge-inline badge-soft-info fs-13 fw-700 p-3 text-info" style="border-radius: 20px;">{{translate('New')}}</span>
                                                @elseif($classified_product->conditon == 'used')
                                                    <span class="badge badge-inline badge-soft-warning fs-13 fw-700 p-3 text-danger" style="border-radius: 20px;">{{translate('Used')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif


    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s1 text-center">
                        <h2>{{ translate('New Products') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        @if (count($newest_products) > 0)
                            @foreach ($newest_products as $key => $new_product)
                            <div class="item">
                                <div class="product">
                                    @include('frontend.partials.product_box',['product' => $new_product])
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <!-- START SECTION TESTIMONIAL -->
<div class="section bg_redon">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h2>Our Client Say!</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
            	<div class="testimonial_wrap testimonial_style1 carousel_slider owl-carousel owl-theme nav_style2" data-nav="true" data-dots="false" data-center="true" data-loop="true" data-autoplay="true" data-items='1'>
                	<div class="testimonial_box">
                    	<div class="testimonial_desc">
                        	<p>"I bought a most gorgeous black evening skirt from Odelyn a few years ago. I was slightly hesitant about buying it at first but Odelyn gently persuaded me to try it on and I was convinced. An unusual design, beautifully made, it makes me feel (and look) stunning, in a subtle kind of way - the best way! I have worn it to dinner at special places like Claridges as well as small intimate restaurants, and it never fails to draw attention. Women usually ask me, "Where have you bought that skirt from??" Men just keep on looking.

I also have one of Odelyn's shorter length knitted scarves, in white. It's very good weight, knitted from a soft, beautiful cotton yarn that always feels silky yet warm, and gives an accent of brightness at the neck without too much bulky length.</p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="{{ static_asset('assets1/images/user_img1.jpg') }}" alt="user_img1" />
                            </div>
                            <div class="author_name">
                                <h6>Penelope Watson-Farrar</h6>
                                <span>Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_box">
                    	<div class="testimonial_desc">
                        	<p>"As a size 22-24 woman I have felt alienated from fashion in the last ten years. Meeting Odelyn was a miracle; she has great empathy and a unique understanding of design for fully figured women, unlike the other designers at Spitalfields Market.
The only person that I can think that she is equivalent to is the great Issey Miyake - high quality.

Odelyn's designs are so elegant yet innovative in design. She has knitted two skirts for me and two beautiful multi throws and two neck scarves that have been appropriate for all four seasons. I know these clothes will be worn time and time again, because of the robust knit combinations and durability of the clothes that will last for years.

Her high standard of designs have enabled me to have more choice within the fashion industry now. Odelyn Smith's designs are truly unique and are beautifully crafted"</p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="{{ static_asset('assets1/images/user_img2.jpg') }}" alt="user_img2" />
                            </div>
                            <div class="author_name">
                                <h6>Tara Bhattacharya</h6>
                                <span>Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_box">
                    	<div class="testimonial_desc">
                        	<p>"I have bought three organza shawls as presents for members of my family from Odelyn. The shawls were sewn in rich colours of gold and purple. They were all delighted with their presents that fitted perfectly. I have been told by each family member that they always receive great comments when the shawls are worn.
I have also purchased a woolen shawl for myself which it looks beautiful worn both in the day and at night."</p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="{{ static_asset('assets1/images/user_img3.jpg') }}" alt="user_img3" />
                            </div>
                            <div class="author_name">
                                <h6>Sharon Arthur</h6>
                                <span>Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_box">
                    	<div class="testimonial_desc">
                        	<p>"Loving the cuffs and the whole style of Odelyn's work???.totally original!! Every time I wear one of the pieces I have purchased I always have someone asking me, "Where can I buy that?" etc
                            I am an artist who is about to release an Album and will definitely be wearing Odelyn Smith's designs. A talented, original, creative, Designer."</p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="{{ static_asset('assets1/images/user_img4.jpg') }}" alt="user_img4" />
                            </div>
                            <div class="author_name">
                                <h6>John Gibbons</h6>
                                <span>Customer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION TESTIMONIAL -->

<!-- START SECTION SHOP INFO -->
<div class="section pb_70">
    	<div class="container">
            <div class="row g-0">
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-shipped"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>Free Delivery</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-money-back"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>30 Day Return</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-support"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>27/4 Support</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END SECTION SHOP INFO -->

    
    <!-- Top Brands -->
    @if (get_setting('top_brands') != null)
        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <!-- Top Section -->
                <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title -->
                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">{{ translate('Top Brands') }}</h3>
                    <!-- Links -->
                    <div class="d-flex">
                        <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary" href="{{ route('brands.all') }}">{{ translate('View All Brands') }}</a>
                    </div>
                </div>
                <!-- Brands Section -->
                <div class="bg-white px-3">
                    <div class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-4 row-cols-3 gutters-16 border-top border-left">
                        @php $top_brands = json_decode(get_setting('top_brands')); @endphp
                        @foreach ($top_brands as $value)
                            @php $brand = \App\Models\Brand::find($value); @endphp
                            @if ($brand != null)
                                <div class="col text-center border-right border-bottom hov-scale-img has-transition hov-shadow-out z-1">
                                    <a href="{{ route('products.brand', $brand->slug) }}" class="d-block p-sm-3">
                                        <img src="{{ uploaded_asset($brand->logo) }}" class="lazyload h-md-100px mx-auto has-transition p-2 p-sm-4 mw-100"
                                            alt="{{ $brand->getTranslation('name') }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                        <p class="text-center text-dark fs-12 fs-md-14 fw-700 mt-2">{{ $brand->getTranslation('name') }}</p>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.auction_products') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
        });
    </script>
@endsection
