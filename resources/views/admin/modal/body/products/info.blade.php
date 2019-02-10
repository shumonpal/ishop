
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true"></span></button>
    <h4 class="modal-title">{{$product->pdt_name}}<small class="pull-right">Created: {{$product->created_at->format('dM, Y')}}</small></h4>
</div>
<div class="modal-body">

    <div class="box">
      <div class="box-body">
        <table class="table table-bordered">
          
          <tr>
            <td width="160"><p><b>Name: </b>{{ $product->pdt_name }}</p></td>
            
            <td><p><b>Brand: </b>{{ title_case($product->brands->name) }}</p></td>
            <td><p><b>Category: </b>{{ title_case($product->categories->name) }}</p></td>
            <td><p><b>Sub Category: </b>{{ title_case($product->subCategories->name) }}</p></td>
          </tr>
          <tr>
            <td><p><b>Short Description: </b></p></td>
            <td colspan="3">{{ $product->short_descp }}</td>            
          </tr>
          <tr>
            <td><p><b>Description: </b></p></td>
            <td colspan="3">{{ $product->descp }}</td>            
          </tr>
          <tr>
            <td><p><b>Price: </b>{{ $product->price }}</p></td>
            <td><p><b>Up Price: </b>{{ $product->up_price }}</p></td>
            <td><p><b>In Stock: </b>{{ $product->in_stock }}</p></td>
            <td><p><b>Warranty Period: </b>{{ $product->warranty_period }} months</p></td>
          </tr>
          <tr>
            <td><p><b>Is Hot: </b>{{ $product->isHot }}</p></td>
            <td><p><b>Is Special: </b>{{ $product->isSpecial }}</p></td>
            <td><p><b>Is Featured: </b>{{ $product->isFeatured }}</p></td>
            <td><p><b>Discount: </b>{{ $product->isDiscount }}</p></td>
          </tr>
          <tr>
            <td><p><b>Banner Image: </b></p></td>
            <td colspan="3"><img src="{{ asset($product->banner_image) }}" alt="{{ $product->pdt_name }}" height="170"></td>            
          </tr>
          <tr>
            <td><p><b>Image: </b></p></td>
            <td colspan="3">
            @foreach($product->images as $img)
              <img src="{{ asset($img->image_url) }}" alt="{{ $product->pdt_name }}" height="70">
            @endforeach
            </td>            
          </tr>
          <tr>
            <td><p><b>Color: </b></p></td>
            <td colspan="3">
            @foreach($product->colors as $color)
              <div style="float:left;margin-right:7px;width:25px;height:25px;background-color:{{ $color->color }}"></div>
            @endforeach
            </td>            
          </tr>
          
        </table>
      </div>
      <!-- /.box-body -->
      
    </div>
 

</div>

<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Save changes</a >
</div>


