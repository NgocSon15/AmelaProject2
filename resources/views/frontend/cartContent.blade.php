<div class="cart_title">Shopping Cart</div>
<div style="margin-top: 67px;" id="cart_content">
    @if(Session::has('cart') && !empty(Session::get('cart')))
        <div style="border: solid 1px #e8e8e8; box-shadow: 0px 1px 5px rgb(0 0 0 / 10%);">
            <div style="width: 100%; padding: 15px 46px 15px 15px;">
                <table class="w-100">
                    <thead>
                    <th class="cart_item_title pt-4"></th>
                    <th class="cart_item_title pt-4">Name</th>
                    <th class="cart_item_title pt-4">Color</th>
                    <th class="cart_item_title pt-4">Brand</th>
                    <th class="cart_item_title pt-4 text-right">Price</th>
                    <th class="cart_item_title pt-4"></th>
                    </thead>
                    <tbody>
                    @foreach(Session::get('cart') as $key => $car)
                        <tr>
                            <td class="cart_item_image ml-4" style="display:flex; align-items: center"><img class="align-self-center" src="{{ asset('storage/'. $car->image) }}" style="max-width: 133px;" alt=""></td>
                            <td class="cart_item_text text-align-center ml-4">{{ $car->name }}</td>
                            <td class="cart_item_text text-align-center ml-4">{{ $car->color }}</td>
                            <td class="cart_item_text text-align-center ml-4">{{ $car->brand->name }}</td>
                            @if($car->onSale)
                                <td class="cart_item_text text-align-center ml-4 text-right number_output">{{ $car->price - ($car->price * $car->salePercent / 100) }}</td>
                            @else
                                <td class="cart_item_text text-align-center ml-4 text-right number_output">{{ $car->price }}</td>
                            @endif
                            <td class="cart_item_text text-align-center ml-4 text-right">
                                <button type="button" class="btn btn-danger" value="{{ $key }}" id="btn_clear">Remove</button>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    @else
        Your cart is empty
    @endif
</div>

<!-- Order Total -->
<div class="order_total">
    <div class="order_total_content text-md-right">
        <div class="order_total_title">Order Total:</div>
        <div class="order_total_amount number_output">{{ Session::get('price') ?? 0 }}</div>
    </div>
</div>

<div class="cart_buttons">
    <button type="button" class="button cart_button_clear">Back</button>
    <button type="button" class="button cart_button_checkout" id="btn_order">Order</button>
</div>
