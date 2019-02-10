@extends('frontend.layout')

@section('content')
<!-- banner -->


<div class="banner-bottom" id="content">
    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Checkout - Payment method</li>
            </ul>
        </div>

        <div class="col-md-9" id="checkout">

            <div class="box">

            @if(session('payment') == 'paypal')
                {!! Form::open(['url' => 'https://www.paypal.com/cgi-bin/webscr']) !!}

                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="shumonpal1-facilitator@gmail.com">
                <input name="currency_code" type="hidden" value="USD">
                <input type="hidden" name="amount" value="{{ Cart::instance('cart')->total()}}">
                <!-- Enable override of buyers's address stored with PayPal . -->
                <input type="hidden" name="address_override" value="1">
                <!-- Set variables that override the address stored with PayPal. -->
                <input type="hidden" name="first_name" value="John">
                <input type="hidden" name="last_name" value="Doe">
                <input type="hidden" name="address1" value="345 Lark Ave">
                <input type="hidden" name="city" value="San Jose">
                <input type="hidden" name="state" value="CA">
                <input type="hidden" name="zip" value="95121">
                <input type="hidden" name="country" value="US">
                <input type="hidden" name="email" value="shumonpal1@gmail.com">
                <input type="hidden" name="return" value="http://localhost/e-shop/en/checkout-step-4">
            @elseif(session('payment') == 'cash')
                {!! Form::open(['route' => 'orders']) !!}
            @endif

                    <h1 class="box-header">Checkout - Payment method</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{route('checkout1')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                        </li>
                        <li><a href="{{route('checkout2')}}"><i class="fa fa-truck"></i><br>Delivery Method</a>
                        </li>
                        <li><a href="{{route('checkout3')}}"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="active"><a href="{{route('checkout3')}}"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach(Cart::instance('cart')->content()->take(4) as $carts)
                                    <!-- <input type="hidden" name="{{ $carts->name }} ({{ $carts->qty }})" value="{{ $carts->price * $carts->qty }}"> -->
                                    <tr>
                                        <td>
                                            <a href="{{ url('product-details', $carts->id) }}">
                                            <img src="{{ productsImageUrl($carts->id) }}" alt="{{ $carts->name }}">
                                        </a>
                                        </td>
                                        <td><a href="{{ url('product-details', $carts->id) }}">{{ $carts->name }}</a>
                                        </td>
                                        <td>{{ $carts->qty }}</td>
                                        <td>${{ $carts->price }}</td>
                                        <td>$0.00</td>
                                        <td>${{ $carts->price * $carts->qty }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th>${{ Cart::instance('cart')->subtotal() }}</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.content -->
                    

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{route('checkout3')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Back to Payment method</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Place Order <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col-md-9 -->

        @include('frontend.carts.orderSum')

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
@if(session('payment') == 'paypal')
<script type="text/javascript">
    $(window).bind('beforeunload', function(){
        {{ Cart::instance('cart')->destroy() }}
        //return '{{ Cart::instance('cart')->subtotal() }}';
    });
</script>
@endif
@endsection