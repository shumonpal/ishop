
{!! Form::label('sub_cat_name', null, ['class' => 'col-sm-2 control-label']) !!}
<div class="col-sm-4">
  <?php $sub_category = $sub_cats->pluck('name', 'id') ?>
  {!! Form::select('products_sub_categories_id', $sub_category, 'Select Sub Category', [ 'placeholder' => 'Select Sub Category...', 'class' => 'form-control select2' ] ) !!}
</div>