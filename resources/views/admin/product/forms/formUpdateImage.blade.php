

@if($errors->first('image'))
  <div class="alert alert-danger"><ul>
    <li>{{ $errors->first('image') }}</li>
  </ul></div>
@endif


    <div class="box-body">
    
      <!-- Images.... -->
      <!-- 
 -->
      <!-- Colors.... -->
      <div class="row">
         {{ session('success') ? messege('success', session('success')) : '' }}
         @foreach($productById->images->where('status', 1) as $image)
          <div class="col-sm-4 delete-parent">
            <div class="overlap-parent replace-parent">
                <img src="{{ asset($image->image_url) }}" class="img-responsive overlap-child">
              <div class="overlap">
                <div class="btn-group">
                  <a href="#" class="btn btn-info btn-sm image replace"><i class="fa fa-pencil"></i></a>
                  <a href="{{ route('product-images.destroy', $image->id) }}" data-token="{{ csrf_token() }}" class="btn btn-danger btn-sm delete-item"><i class="fa fa-trash-o"></i></a>
                </div>
              </div>
            </div>

            <div class="overlap-parent hidden replace-parent">
            {!! Form::open(['method' => 'PUT', 'route' => ['product-images.update', $image->id], 'files' => 'true']) !!}
              {!! Form::file('image', [
              'id' => 'image', 
              'class' => 'file', 
              'data-show-upload' => true,
              'data-allowed-file-extensions' => '["jpg", "png", "gif"]'] ) !!}
              <button type="submit" class="btn btn-default btn-block">Update</button>
            {!! Form::close() !!}
            </div>
          </div>
          @endforeach

    </div>
    <!-- /.box-body -->
    <div class="box-footer replace-parent {{$errors->first('images') ? 'hidden' : ''}}">
      <a href="{{ route('products.edit', $productById->id) }}" class="btn btn-default">Cancel</a>

      <a href="#" class="btn btn-info pull-right replace">Add New Images</a>
    </div>

    <div class="box-footer {{$errors->first('images') ? '' : 'hidden'}} replace-parent">
        @if($errors->first('images'))
        <div class="alert alert-danger"><ul>
          <li>{{ $errors->first('images') }}</li>
        </ul></div>
        @endif

        {!! Form::open(['method' => 'POST', 'route' => ['product-images.store'], 'files' => 'true']) !!}
          {!! Form::hidden('pdt_id', $productById->id) !!}
          {!! Form::file('images[]', [
            'id' => 'images', 
            'class' => 'file', 
            'multiple' => 'true', 
            'data-show-upload' => true,
            'data-allowed-file-extensions' => '["jpg", "png", "gif"]'] )
          !!}
          <button type="submit" class="btn btn-default btn-block">Update</button>
        {!! Form::close() !!}
      </div>
    <!-- /.box-footer -->


  
