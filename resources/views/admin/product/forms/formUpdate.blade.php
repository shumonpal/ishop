
@if($errors->any())
  <div class="alert alert-danger"><ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  </ul></div>
@endif


  {!! Form::model($productById, ['route' => ['products.update', $productById->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => 'true']) !!}

    <div class="box-body">
    <!-- Name & Brand -->
      <div class="form-group">
        {!! Form::label('product_name', null, ['class' => 'col-sm-2 control-label', 'placeholder' => 'Product Name']) !!}
        <div class="col-sm-4">
          {!! Form::text('pdt_name', null, ['class' => 'form-control', 'id' => 'pdt_name', 'placeholder' => 'Product Name']) !!}
        </div>

        {!! Form::label('brand_name', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          <select name="brand_id" class="form-control select2">
            <option value="">Select a brand</option>
            @foreach($productBrands as $brand)
            <option value="{{ $brand->id }}" {{ $brand->id == $productById->brand_id ? 'selected' : '' }}>{{ title_case($brand->name) }}</option>
            @endforeach
          </select>
        </div>

      </div>

      <!-- Category & sub category -->
      <div class="form-group">
        {!! Form::label('cat_name', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          <select name="categories_id" class="form-control select2 select_item" data-url="{{ route('select') }}" data-token="{{ csrf_token() }}">
            <option value="">Select a category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $productById->categories_id ? 'selected' : '' }}>{{ title_case($category->name) }}</option>
            @endforeach
          </select>
        </div>

        <div class="get_item">
          {!! Form::label('sub_cat_name', null, ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-sm-4">
            <select name="products_sub_categories_id" class="form-control select2">
              <option value="">Select a category</option>
              @foreach($sub_cats as $sub_cat)
              <option value="{{ $sub_cat->id }}" {{ $sub_cat->id == $productById->products_sub_categories_id ? 'selected' : '' }}>{{ title_case($sub_cat->name) }}</option>
              @endforeach
            </select>
            
          </div>
        </div>

      </div>

      <!-- Price & Up Price -->
      <div class="form-group">
        {!! Form::label('price', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          {!! Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Price']) !!}
        </div>

        {!! Form::label('up_price', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          {!! Form::text('up_price', null, ['class' => 'form-control', 'id' => 'up_price', 'placeholder' => 'Up Price']) !!}
        </div>

      </div>

      <!-- Short description -->
      <div class="form-group">
        {!! Form::label('short_description', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
          {!! Form::textarea('short_descp', null, ['class' => 'bootstrap-editor', 'placeholder' => 'Short Description Here']) !!}
        </div>

      </div>

      <!-- Description -->
      <div class="form-group">
        {!! Form::label('Description', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
          {!! Form::textarea('descp', null, ['class' => 'bootstrap-editor', 'placeholder' => 'Description Here']) !!}
        </div>

      </div>

      <!-- IS..... -->
      <div class="form-group">
        {!! Form::label('is_hot', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          {!! Form::radio('is_hot', 1, true, ['class' => ' flat-red', 'id' => 'is_hot']) !!} Yes &ensp;&ensp;
          {!! Form::radio('is_hot', 0, false, ['class' => ' flat-red']) !!} No
        </div> 

        {!! Form::label('is_special', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          {!! Form::radio('is_special', 1, true, ['class' => ' flat-red', 'id' => 'is_special']) !!} Yes &ensp;&ensp;
          {!! Form::radio('is_special', 0, false, ['class' => ' flat-red']) !!} No
        </div>

      </div>

      <!-- Is.... -->
      <div class="form-group">
        {!! Form::label('is_discount', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          {!! Form::text('is_discount', null, ['class' => 'form-control', 'id' => 'is_discount', 'placeholder' => 'Discount']) !!}
        </div>

        {!! Form::label('is_featured', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          {!! Form::radio('is_featured', 1, true, ['class' => ' flat-red', 'id' => 'is_special']) !!} Yes &ensp;&ensp;
          {!! Form::radio('is_featured', 0, false, ['class' => ' flat-red']) !!} No
        </div>

      </div>

      <!-- In stock.... -->
      <div class="form-group">
        {!! Form::label('in_stock', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          {!! Form::number('in_stock', null, ['class' => 'form-control', 'id' => 'in_stock', 'placeholder' => 'In Stock']) !!}
        </div>

      </div>


      <!-- banner Image.... -->
      <div class="form-group">

        {!! Form::label('banner_image', null, ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-4">
          <div class="replace-parent">
            <img src="{{ asset($productById->banner_image) }}" class="" height="200">&ensp;<a class="btn btn-default replace" href="">Change Image?</a>
          </div>
          <div class="hidden replace-parent">
            {!! Form::file('banner_image', [
              'id' => 'banner_image', 
              'class' => 'file', 
              'data-show-upload' => false,
              'data-allowed-file-extensions' => '["jpg", "png", "gif"]'] ) !!}
          </div>

        </div>

        {!! Form::label('warranty_period', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          {!! Form::number('warranty_period', null, ['class' => 'form-control', 'id' => 'warrenty_period', 'placeholder' => 'Warrenty Period']) !!}

        </div>

      </div>


      <!-- Images.... -->
      <div class="form-group input-group-lg">
        {!! Form::label('images(Multiple)', null, ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-10">
          <div class="">
          @foreach($productById->images as $image)
            <img src="{{ asset($image->image_url) }}" class="" height="120">
          @endforeach
            &ensp;<a class="btn btn-default" href="{{ route('product-images.edit', $productById->id) }}">Change Images?</a>
          </div>

        </div>
      </div>

      <!-- Colors.... -->
      <div class="form-group">
        {!! Form::label('colors', null, ['class' => 'col-sm-2 control-label']) !!}

        <div class="col-sm-10 increment">
          <div class="">
            @foreach($productById->colors as $color)
              <div style="float:left;margin-right:7px;width:25px;height:25px;background-color:{{ $color->color }}"></div>
            @endforeach
              &ensp;<a class="btn btn-default replace" href="">Change Colors?</a>
          </div>
          <div class="hidden">
            <div class="col-sm-2 colors input-group">
              {!! Form::text('color[]', null, [
                'id' => 'color', 
                'class' => 'form-control colorpicker1', 
                'multiple' => 'multiple',
                'placeholder' => 'Color'] ) !!}
              <div class="input-group-btn">
                <button class="btn btn-info extended-btn"><i class="fa fa-plus"></i></button>
              </div>
          </div>
          </div>
          

        </div>

      </div>

      <!-- Sizes -->
      <div class="form-group">
        
        {!! Form::label('sizes(Multiple)', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-5">
          <ul style="margin-left: -38px;">
          @foreach($productById->sizable as $sizable)
            <?php $sizes = App\Frontend\ProductsSize::where('id', $sizable->size_id)->get(); ?>
            @foreach($sizes as $size)
              <li class="pdt-size">{{ $size->size }}</li>
            @endforeach
          @endforeach
          </ul>
          <select name="size[]" class="form-control select2" multiple="multiple">
            <option value="">Select a Size</option>
            @foreach(App\Frontend\ProductsSize::all() as $size_name)
              <option value="{{ $size_name->id }}">{{ title_case($size_name->size) }}</option>
            @endforeach
          </select>
          
        </div>

      </div>


    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-default">Cancel</button>
      <button type="submit" class="btn btn-info pull-right">Product Save</button>
    </div>
    <!-- /.box-footer -->

{!! Form::close() !!}
    
    <!-- Hidden color field for ext extended Color Feild -->
    
    <div class="extended-div hidden">
      <div class="col-sm-2 colors input-group">
        {!! Form::text('color[]', null, [
            'id' => 'color', 
            'class' => 'form-control colorpicker1', 
            'multiple' => 'multiple',
            'placeholder' => 'Color'] ) !!}
        <div class="input-group-btn">
          <button class="btn btn-danger remove-div"><i class="fa fa-times"></i></button>
        </div>
      </div>
    </div>