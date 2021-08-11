@extends('frontend.layout')

@section('title')
    {{ __('language.home') }}
@endsection
@section('content')
    <!-- Banner -->

    <div class="banner">
        <div class="banner_background" style="background-image:url('{{ asset('frontend/images/banner_background.jpg') }}')"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{ asset('storage/' .$carBanner1->image) }}" alt="" style="max-height: 459px; max-width: 521px"></div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">brand new supercar</h1>
                        <div class="banner_price">
                            @if($carBanner1->onSale)
                                <span class="number_output">{{ $carBanner1->price }}</span>
                                <br><div class="number_output">{{ $carBanner1->price - ($carBanner1->price * $carBanner1->salePercent / 100) }}</div>
                            @else
                                <div class="number_output">{{ $carBanner1->price }}</div>
                            @endif
                        </div>
                        <div class="banner_product_name">{{ $carBanner1->name }}</div>
                        <div class="button banner_button"><a href="#">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deals of the week -->

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                    <!-- Deals -->

                    <div class="deals">
                        <div class="deals_title">Deals of the Week</div>
                        <div class="deals_slider_container">

                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">
                                @for($i = 0; $i < 3; $i++)
                                    <!-- Deals Item -->
                                    <div class="owl-item deals_item">
                                        <div class="deals_image d-flex" style="height: 234.8px">
                                            <img src="{{ asset('storage/' .$mostViewCars->get($i)->image) }}" alt="" class="align-self-center">
                                        </div>
                                        <div class="deals_content">
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_category"><a href="#">{{ $mostViewCars->get($i)->brand->name }}</a></div>
                                            </div>
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_name"><a href="#">{{ $mostViewCars->get($i)->name }}</a></div>
                                            </div>
                                                @if($mostViewCars->get($i)->onSale)
                                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                                        <div class="deals_item_price number_output">{{ $mostViewCars->get($i)->price - ($mostViewCars->get($i)->price * $mostViewCars->get($i)->salePercent / 100) }}</div>
                                                    </div>
                                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                                        <div class="deals_item_price_a ml_auto number_output" style="text-decoration-line: line-through">{{ $mostViewCars->get($i)->price }}</div>
                                                    </div>
                                                @else
                                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                                        <div class="product_price number_output" style="font-size: 24px ">{{ $mostViewCars->get($i)->price }}</div>
                                                    </div>
                                                @endif
                                            <div class="available">
                                                <div class="available_line d-flex flex-row justify-content-start">
                                                    <div class="available_title">Available: <span>{{ $mostViewCars->get($i)->quantity }}</span></div>
                                                    <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                                </div>
                                                <div class="available_bar"><span style="width:100%"></span></div>
                                            </div>
                                            <div class="button banner_button" id="add_to_cart" value="{{ $mostViewCars->get($i)->id }}"><a href="#">Add To Cart</a></div>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                        </div>
                    </div>

                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Featured</li>
                                    <li>On Sale</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                    @for($i = 3; $i < count($mostViewCars); $i++)
                                        <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('storage/' . $mostViewCars->get($i)->image) }}" alt="" style="max-width: 80%"></div>
                                                <div class="product_content">
                                                    @if($mostViewCars->get($i)->onSale)
                                                        <div class="product_price number_output discount">{{ $mostViewCars->get($i)->price - ($mostViewCars->get($i)->price * $mostViewCars->get($i)->salePercent / 100) }}</div>
                                                        <span class="number_output" style="text-decoration-line: line-through">{{ $mostViewCars->get($i)->price }}</span>
                                                    @else
                                                        <div class="product_price number_output">{{ $mostViewCars->get($i)->price }}</div>
                                                    @endif
                                                    <div class="product_name"><div><a href="product.html">{{ $mostViewCars->get($i)->name }}</a></div></div>
                                                    <div class="product_extras">
                                                        <button class="product_cart_button" id="add_to_cart" value="{{ $mostViewCars->get($i)->id }}">Add To Cart</button>
                                                    </div>
                                                </div>
                                                @if($mostViewCars->get($i)->onSale)
                                                    <ul class="product_marks">
                                                        <li class="product_mark product_discount">-{{ $mostViewCars->get($i)->salePercent ?? 0 }}%</li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->

                            <div class="product_panel panel">
                                <div class="featured_slider slider">
                                    @foreach($onSaleCars as $onSaleCar)
                                        <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('storage/' .$onSaleCar->image) }}" style="max-width: 80%" alt=""></div>
                                                <div class="product_content">
                                                    <div class="product_price number_output discount">{{ $onSaleCar->price - ($onSaleCar->price * $onSaleCar->salePercent / 100) }}</div>
                                                    <span class="number_output" style="text-decoration-line: line-through">{{ $onSaleCar->price }}</span>
                                                    <div class="product_name"><div><a href="product.html">{{ $onSaleCar->name }}</a></div></div>
                                                    <div class="product_extras">
                                                        <button class="product_cart_button" id="add_to_cart" value="{{ $onSaleCar->id }}">Add To Cart</button>
                                                    </div>
                                                </div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">-{{ $onSaleCar->salePercent ?? 0 }}%</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Popular Brands</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                        <div class="popular_categories_link"><a href="#">full catalog</a></div>
                    </div>
                </div>

                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">
                            @foreach($brands as $brand)
                                <!-- Popular Brands Item -->
                                <div class="owl-item">
                                    <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <div class="popular_category_image"><img src="{{ asset('storage/' .$brand->image) }}" style="width:100%;" alt=""></div>
                                        <div class="popular_category_text">{{ $brand->name }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner_2">
        <div class="banner_2_background" style="background-image:url('{{ asset('frontend/images/banner_2_background.jpg') }}')"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->

            <div class="owl-carousel owl-theme banner_2_slider">

                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">{{ $carBanner2->brand->name }}</div>
                                        <div class="banner_2_title">{{ $carBanner2->name }}</div>
                                        <div class="banner_2_text">{{ $carBanner2->description }}</div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="{{ asset('storage/'. $carBanner2->image) }}" style="width: 100%;" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">{{ $carBanner3->brand->name }}</div>
                                        <div class="banner_2_title">{{ $carBanner3->name }}</div>
                                        <div class="banner_2_text">{{ $carBanner3->description }}</div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="{{ asset('storage/'. $carBanner3->image) }}" style="width: 100%;" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">{{ $carBanner4->brand->name }}</div>
                                        <div class="banner_2_title">{{ $carBanner4->name }}</div>
                                        <div class="banner_2_text">{{ $carBanner4->description }}</div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="{{ asset('storage/'. $carBanner4->image) }}" style="width: 100%;" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Hot New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">New Arrivals</div>
                            <ul class="clearfix">
                                <li class="active">Featured</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">
                                        @for($i = 1; $i < count($newArrivals); $i++)
                                            <!-- Slider Item -->
                                            <div class="arrivals_slider_item">
                                                <div class="border_active"></div>
                                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('storage/' . $newArrivals->get($i)->image) }}" style="max-width: 80%" alt=""></div>
                                                    <div class="product_content">
                                                        @if($newArrivals->get($i)->onSale)
                                                            <div class="product_price number_output discount">{{ $newArrivals->get($i)->price - ($newArrivals->get($i)->price * $newArrivals->get($i)->salePercent / 100) }}</div>
                                                            <span class="number_output" style="text-decoration-line: line-through">{{ $newArrivals->get($i)->price }}</span>
                                                        @else
                                                            <div class="product_price number_output">{{ $newArrivals->get($i)->price }}</div>
                                                        @endif
                                                        <div class="product_name"><div><a href="product.html">{{ $newArrivals->get($i)->name }}</a></div></div>
                                                        <div class="product_extras">
                                                            <button class="product_cart_button" value="{{ $newArrivals->get($i)->id }}" id="add_to_cart">Add to Cart</button>
                                                        </div>
                                                    </div>
                                                    <ul class="product_marks">
                                                        <li class="product_mark product_new">new</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="arrivals_single clearfix">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="arrivals_single_image"><img src="{{ asset('storage/' . $newArrivals->first()->image) }}" style="max-width: 200px" alt=""></div>
                                        <div class="arrivals_single_content">
                                            <div class="arrivals_single_category"><a href="#">{{ $newArrivals->first()->brand->name }}</a></div>
                                            <div class="arrivals_single_name_container clearfix">
                                                <div class="arrivals_single_name"><a href="#">{{ $newArrivals->first()->name }}</a></div>
                                            </div>
                                            @if($newArrivals->first()->onSale)
                                                <div class="number_output discount" style="font-size: 16px; font-weight: 500; color: #df3b3b">{{ $newArrivals->first()->price - ($newArrivals->first()->price * $newArrivals->first()->salePercent / 100) }}</div>
                                                <span class="number_output" style="text-decoration-line: line-through">{{ $newArrivals->first()->price }}</span>
                                            @else
                                                <div class="number_output" style="font-size: 16px; font-weight: 500">{{ $newArrivals->first()->price }}</div>
                                            @endif
                                            <form action="#"><button class="arrivals_single_button" value="{{ $newArrivals->first()->id }}" id="add_to_cart">Add to Cart</button></form>
                                        </div>
                                        <ul class="arrivals_single_marks product_marks">
                                            <li class="arrivals_single_mark product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Hot Best Sellers</div>
                            <ul class="clearfix">
                                <li class="active">Top 20</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <div class="bestsellers_panel panel active">

                            <!-- Best Sellers Slider -->

                            <div class="bestsellers_slider slider">
                                @foreach($bestSellers as $car)
                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image" style="display:flex; align-items: center"><img src="{{ asset('storage/' . $car->image) }}" style="max-width: 115px" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">{{ $car->brand->name }}</a></div>
                                            <div class="bestsellers_name"><a href="product.html">{{ $car->name }}</a></div>
                                            @if($car->onSale)
                                                <div class="bestsellers_price number_output" style="color: #df3b3b">{{ $car->price - ($car->price * $car->salePercent / 100) }}</div>
                                                <span class="number_output" style="text-decoration-line: line-through">{{ $car->price }}</span>
                                            @else
                                                <div class="bestsellers_price number_output">{{ $car->price }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    @if($car->onSale)
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        </ul>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">

                        <!-- Brands Slider -->

                        <div class="owl-carousel owl-theme brands_slider">
                            @foreach($brands as $brand)
                                <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('storage/'. $brand->image) }}" style="max-height: 40%" alt=""></div></div>
                            @endforeach
                        </div>

                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('customScript')
    <script>
        $(document).ready(function() {
            {{--$('#cart_count').html('<span>' + {{ count(Session::get('cart')) }} + '</span>');--}}
            {{--var price = {{Session::get('price')}};--}}
            {{--console.log({{ Session::get('price') }});--}}
            {{--price = Intl.NumberFormat().format(price);--}}
            // $('#order_price').text(price);
            $(document).on('click', '#add_to_cart', function (e) {
                e.preventDefault();
                var id = $(this).attr('value');
                addToCart(id);
            })

            function addToCart(id) {
                $.ajax({
                    url: '{{ route('cart.add') }}',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                    },
                    complete: function(res)
                    {
                        $('#cart_count').html('<span>' + res.responseJSON[0] + '</span>');
                        var price = res.responseJSON[1];
                        price = Intl.NumberFormat().format(price);
                        $('#order_price').text(price);
                    }
                })
            }
        })
    </script>
@endsection
