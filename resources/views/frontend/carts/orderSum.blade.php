<div class="col-md-3">

    <div class="box" id="order-summary">
        <div class="box-header">
            <h3>Order summary</h3>
        </div>
        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                <?php $delivery = session('delivery', 0); ?>
                    <tr>
                        <td>Order subtotal</td>
                        <th class="sub-total">${{ Cart::instance('cart')->subtotal() }}</th>
                    </tr>
                    <tr>
                        <td>Shipping and handling</td>
                        <th class="handeling">${{$delivery}}</th>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <th class="tax">${{ Cart::instance('cart')->tax() }}</th>
                    </tr>
                    <tr>                   
                        <td>Total</td>
                        <th><span class="grand-total">${{ Cart::instance('cart')->total()}}</span>
                        @if($delivery)
                        <br> + ${{$delivery}}
                        @endif
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
 
    </div>

</div>
<!-- /.col-md-3 -->