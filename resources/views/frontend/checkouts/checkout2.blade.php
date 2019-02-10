@extends('frontend.layout')

@section('content')
<!-- banner -->
    
<div class="banner-bottom" id="content">
    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Checkout - Delivery method</li>
            </ul>
        </div>

        <div class="col-md-9" id="checkout">

            <div class="box">
                
                 {!! Form::open(['route' => 'checkout2']) !!}
                    <h1 class="box-header">Checkout - Delivery method</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{route('checkout1')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                        </li>
                        <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="row">                        
                            <div class="col-sm-6">
                                <div class="box shipping-method">

                                    <h4>USPS Next Day</h4>

                                    <p>Get it right on next working day - Extra $10.</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="delivery" value="20" class="checkbox-color-filter">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box shipping-method">

                                    <h4>DHL</h4>                      
                                    <p>Get it right on next 7day - fastest option possible. Extra $5</p>
                                    <div class="box-footer text-center">

                                        <input type="radio" name="delivery" value="{{config('checkout.delivery.1week')}}" class="checkbox-color-filter">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="box shipping-method">

                                    <h4>Normal delivary</h4>

                                    <p>Get it right within 1 month</p>

                                    <div class="box-footer text-center">

                                        <input type="radio" name="delivery" value="{{config('checkout.delivery.normal')}}" class="checkbox-color-filter">
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.content -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{route('checkout1')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Addresses</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Continue to Payment Method<i class="fa fa-chevron-right"></i>
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