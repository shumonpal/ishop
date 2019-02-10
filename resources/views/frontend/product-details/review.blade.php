<div class="tab-2 resp-tab-content additional_info_grid " aria-labelledby="tab_item-1" style="display: {{ session('success') ? 'block' : '' }};">
	<h4>({{$pdtById->reviews->count()}}) Reviews</h4>
	<br/>
	{{ session('success') ? messege('success', session('success')) : '' }}
	
	<?php 
		$data = $reviews->where('products_id', $pdtById->id ); 
		$i = 2;
	?>
	@if($data->count() > 0)
	@foreach($data as $review)
		<div class="additional_info_sub_grids">
			<div class="col-xs-2 additional_info_sub_grid_left">
				<img src="{{ asset($review->image !== null ? $review->image : 'public/images/avater/t1.png') }}" alt=" " class="img-responsive" />
			</div>
			<div class="col-xs-10 additional_info_sub_grid_right">
				<div class="additional_info_sub_grid_rightl">
					<a href="#">{{$review->name}}</a>
					<h5>{{$review->created_at->format('M d, Y')}}</h5>
					<p>{{$review->reviews}}</p>
				</div>
				<div class="additional_info_sub_grid_rightr">
					<div class="rating">
						<input id="rating{{ $i }}" name="rating{{ $i }}" type="number" class="rating"  >
						<div class="clearfix"> </div>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#rating{{ $i }}').rating({
								size:'xs',
								displayOnly: true,
							});

							$('#rating{{ $i }}').rating('update', {{$review->ratings}});
						});
					</script>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php $i++; ?>
	@endforeach
	@endif

	<div class="review_grids">
		<h5>Add A Review</h5>
								
{!! Form::open(['route' => 'review', 'enctype' => 'multipart/form-data']) !!}
	{!! Form::hidden('products_id', $pdtById->id) !!}
	{!! Form::label('ratings', 'Add your rating:') !!}
	<div class="form-group {{$errors->has('ratings') ? 'has-error' : ''}}">
		{!! Form::number('ratings', null,  ['id' => 'rating1', 'class'=>'rating1']) !!}
		<span class="help-block">{{$errors->first('ratings')}}</span>
	</div>
	<div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
		{!! Form::text('name', old('name'),  ['placeholder' => 'Name']) !!}
		<span class="help-block">{{$errors->first('name')}}</span>
	</div>
	<div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
		{!! Form::text('email', old('email'),  ['placeholder' => 'Email', 'required' => '']) !!}
		<span class="help-block">{{$errors->first('email')}}</span>
	</div>

	<div class="form-group {{$errors->has('reviews') ? 'has-error' : ''}}">
		{!! Form::textarea('reviews', old('reviews'),  ['placeholder' => 'Please Enter Your Review']) !!}
		<span class="help-block">{{$errors->first('reviews')}}</span>
	</div>

	<div class="form-group {{$errors->has('image') ? 'has-error' : ''}}">
		{!! Form::file('image') !!}
		<span class="help-block">{{$errors->first('image')}}</span>
	</div>
	
	{!! Form::submit('Submit') !!}
{!! Form::close() !!}
							<script type="text/javascript">
								$(document).ready(function(){
									$('#rating1').rating({
										step:1,
										hoverEnabled: false,
										showClear: false,
										showCaption: false,
									});
								});
							</script>
						</div>
					</div>