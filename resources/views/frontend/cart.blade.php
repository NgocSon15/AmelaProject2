@extends('frontend.layout')

@section('title')
    Cart
@endsection
@section('link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">
@endsection
@section('content')
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container" id="cart_content">
                        @include('frontend.cartContent')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customScript')
    <script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btn_clear', function(e) {
                e.preventDefault();
                var id = $(this).attr('value');
                removeFromCart(id);
            });

            function removeFromCart(id)
            {
                $.ajax({
                    url: '{{ route('cart.remove') }}',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                    },
                    complete: function(res) {
                        $('#cart_content').html(res.responseText);
                        $('#cart_count').html('<span>' + {{ count(Session::get('cart')) }} + '</span>');
                        var price = {{ Session::get('price') }};
                        price = Intl.NumberFormat().format(price);
                        $('#order_price').text(price);
                        console.log({{ count(Session::get('cart')) }})
                        console.log(price);
                        $('.number_output').each(function () {
                            var value = $(this).html();
                            value = Intl.NumberFormat().format(value);
                            $(this).html(value);
                        });
                    }
                });
            }
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btn_order', function(e) {
                e.preventDefault();
                createOrder();
            })

            function createOrder()
            {
                $.ajax({
                    url: '{{ route('order.store') }}',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(res) {
                        window.location.href = '{{ route('home') }}'
                    }
                })
            }
        })

    </script>
@endsection
