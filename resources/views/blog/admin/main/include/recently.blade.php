<div class="col-md-6">
    <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Последние добавленные продукты</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" type="button" data-widget="collapse"><i class="fa
                    fa-minus"></i></button>
                    <button class="btn btn-box-tool" type="button" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

        <!-- ./box-header -->
        <div class="box-body">
            <ul class="products-list product-list-in-box">
                @foreach( $last_products as $product )
                <li class="item">
                    <div class="product-img">
                        @if( !empty( $product->img) )
                            <img src="{{ asset('uploads/single/'. $product->img) }}" alt="image">
                        @else
                            <img src="{{ asset('images/no_image.png') }}" alt="image">
                        @endif
                    </div>
                    <div class="product-info">
                        <a href="{{--{{ route('blog.admin.product.edit', $product->id) }}--}}"
                           class="product-title">{{ $product->title}}
                            <span class="label label-warning pull-right">{{ $product->price }}</span></a>
                            <span class="product-description">{{ $product->description }}</span>
                    </div>
                </li>
                <!-- ./item -->
                @endforeach
            </ul>
        </div>
        <!-- ./box-body -->
        <div class="box-footer clearfix">
            <a href="{{--{{ route('blog.admin.products.index') }}--}}" class="btn btn-ыьюиет-info
            btn-flat pull-left">Все продукты</a>
        </div>
        <!-- ./box-footer -->
    </div>
    <!-- ./box -->
</div>
<!-- ./col -->
