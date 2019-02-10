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
                {!! Form::open(['route' => 'checkout3']) !!}
                    <h1 class="box-header">Checkout - Payment method</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{route('checkout1')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                        </li>
                        <li><a href="{{route('checkout2')}}"><i class="fa fa-truck"></i><br>Delivery Method</a>
                        </li>
                        <li class="active"><a href="{{route('checkout3')}}"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Paypal</h4>

                                    <p>We like it all.</p>

                                    <div class="box-footer text-center">
                                    
                                    <input type="radio" name="payment" value="paypal" class="checkbox-color-filter">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Payment gateway</h4>

                                    <p>VISA and Mastercard only.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="mastercard" class="checkbox-color-filter">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4>Cash on delivery</h4>

                                    <p>You pay when you get it.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="payment" value="cash" class="checkbox-color-filter">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.content -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{route('checkout2')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Delivery method</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Continue to Order review<i class="fa fa-chevron-right"></i>
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

@endsection