@extends('frontend.layout')

@section('content')
<!-- banner -->


<div class="banner-bottom" id="content">
    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a>
                </li>
                <li>Orders</li>
            </ul>
        </div>

        @if(session('success'))
        <div class="col-md-12" id="checkout">
            {{ session('success') ? messege('success', session('success')) : '' }}     
        </div>
        <!-- /.col-md-12 -->
        @endif


        
        <div class="col-md-12" id="checkout">

            <div class="box">
            	<div class="content">
                        <div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Order No</th>
            <th>Product name</th>
            <th>Quantity</th></th>
            <th>Amount</th>
            <th>Order date</th>
            <th>Shipment</th>
        </tr>
    </thead>
    <tbody>
        <?php $ordersUnq = $orders->unique('order_id')->all();?>

	    @foreach($ordersUnq as $pdt)

    	<tr>
    		<td>#{{$pdt->order_id}}</td>
    		<td>
	        @foreach($orders->where('order_id', $pdt->order_id) as $pdts)
                <p class="border-bottom">{{ $pdts->productName($pdts->product_id) }}</p> 
	    	@endforeach
	    	</td>
	    	<td>
	        @foreach($orders->where('order_id', $pdt->order_id) as $pdts)
                <p class="border-bottom">{{ $pdts->qty }}</p>
	        @endforeach
	    	</td>
	    	<td>${{ $pdt->total }}</td>
	    	<td>{{ $pdt->created_at->format('d M y') }}</td>
	    	<td><div class="status status-Panding"></div>{{ $pdt->orderstatus }}</td>

	    @endforeach
		</tr>
    </tbody>
    
</table>

                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.content -->
                           
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col-md-12 -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->
@endsection