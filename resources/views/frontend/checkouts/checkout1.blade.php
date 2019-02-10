@extends('frontend.layout')

@section('content')
<!-- banner -->

<div class="banner-bottom" id="content">
    <div class="container">
            <!-- breadcrumbs -->
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>Checkout - Address</li>
            </ul>
        </div>
            <!-- //breadcrumbs --> 
        <div class="col-md-9" id="checkout">

            <div class="box">
            @if(! Auth::guard('customer_guard')->check())
                {!! Form::open(['url' => 'customer-register', 'method' => 'post']) !!}
            @else
            <?php $user = Auth::guard('customer_guard')->user(); ?>
                {!! Form::model($user, ['url' => ['customer-register', $user->id], 'method' => 'put']) !!}
            @endif
                    <h1  class="box-header">Checkout</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="{{route('checkout1')}}"><i class="fa fa-map-marker"></i><br>Address</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <label for="firstname">Firstname</label>
                                    {!! Form::text('firstname', old('firstname'), ['id' => 'firstname', 'class' => 'form-control']) !!} 
                                    @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <label for="lastname">Lastname</label>
                                    {!! Form::text('lastname', old('lastname'), ['id' => 'lastname', 'class' => 'form-control']) !!} 
                                    @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                                    <label for="street">Street</label>
                                    {!! Form::text('street', old('street'), ['id' => 'street', 'class' => 'form-control']) !!} 
                                    @if ($errors->has('street'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                    <label for="company">Company</label>
                                    {!! Form::text('company', old('company'), ['id' => 'company', 'class' => 'form-control']) !!} 
                                    @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                                    <label for="zip">ZIP</label>
                                    {!! Form::text('zip', old('zip'), ['id' => 'zip', 'class' => 'form-control']) !!} 
                                    @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <label for="state">State</label>
                                    {!!Form::select('state', ['Stefen' => 'Stefen', 'New yark' => 'New yark'], old('state'), ['class' => 'form-control', 'id' => 'state', 'placeholder' => 'Select State...'])!!}
                                    @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                    <label for="country">Country</label>
                                    {!!Form::select('country', ['Bangledesh' => 'Bangledesh', 'Nepal' => 'Nepal', 'India' => 'India'], old('country'), ['class' => 'form-control', 'id' => 'country', 'placeholder' => 'Select Country...'])!!}
                                    @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone">Telephone</label>
                                    {!! Form::text('phone', old('phone'), ['id' => 'phone', 'class' => 'form-control']) !!} 
                                    @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Email</label>
                                    {!! Form::text('email', old('email'), ['id' => 'email', 'class' => 'form-control']) !!} 
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->
                      
                    </div>

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{route('cart')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to cart</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
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