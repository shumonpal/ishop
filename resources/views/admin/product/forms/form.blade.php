
@if($errors->any())
  <div class="alert alert-danger"><ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  </ul></div>
@endif

{{ session('success') ? messege('success', session('success')) : '' }}


  {!! Form::open(['route' => 'products.store', 'class' => 'form-horizontal', 'files' => 'true']) !!}

    <div class="box-body">
    <!-- Name & Brand -->
      <div class="form-group">
        {!! Form::label('product_name', null, ['class' => 'col-sm-2 control-label', 'placeholder' => 'Product Name']) !!}
        <div class="col-sm-4">
          {!! Form::text('pdt_name', null, ['class' => 'form-control', 'id' => 'pdt_name', 'placeholder' => 'Product Name']) !!}
        </div>

        {!! Form::label('brand_name', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          <?php $brands = $productBrands->pluck('name', 'id') ?>
          {!! Form::select('brand_id', $brands, 'Select Brand', ['placeholder' => 'Select Brand...', 'class' => 'form-control select2'] ) !!}
        </div>

      </div>

      <!-- Category & sub category -->
      <div class="form-group">
        {!! Form::label('cat_name', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
          <?php $category = $categories->pluck('name', 'id') ?>
          {!! Form::select('categories_id', $category, 'Select category', ['placeholder' => 'Select category...', 'class' => 'form-control select2 select_item', 'data-url' => route('select'), 'data-token' => csrf_token()] ) !!}
        </div>

        <div class="get_item">
          {!! Form::label('sub_cat_name', null, ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-sm-4">
            {!! Form::select('products_sub_categories_id', [old('products_sub_categories_id') => 'Select Category First'], old('products_sub_categories_id'), [ 'class' => 'form-control select2' ] ) !!}
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
          {!! Form::file('banner_image', [
              'id' => 'banner_image', 
              'class' => 'file', 
              'data-show-upload' => false,
              'data-allowed-file-extensions' => '["jpg", "png", "gif"]'] ) !!}

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
          {!! Form::file('image[]', [
              'id' => 'image', 
              'class' => 'file', 
              'multiple' => 'true', 
              'data-show-upload' => false,
              'data-fileinput-upload-btn' => false,
              'data-allowed-file-extensions' => '["jpg", "png", "gif"]'] ) !!}
        </div>
      </div>

      <!-- Colors.... -->
      <div class="form-group">
        {!! Form::label('color', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10 increment">
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

      <!-- Sizes -->
      <div class="form-group">
        
        {!! Form::label('sizes(Multiple)', null, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
        <?php $sizes = App\Frontend\ProductsSize::all(); ?>
          <?php $sizes = $sizes->pluck('size', 'id') ?>
          {!! Form::select('size[]', $sizes, 'Select Size', ['placeholder' => 'Select Size...', 'Multiple' => 'Multiple', 'class' => 'form-control select2'] ) !!}
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