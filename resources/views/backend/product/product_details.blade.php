@extends('admin.admin_master')
@section('admin')
    <div class="col-12 mt-10">
        <div class="box">
            <div class="box-body">
                <h2 class="text-center">Product Details</h2>
                <h5>Product Name En: {{ $products->product_name_en }} </h5>
                <h5>Product Name Hin: {{ $products->product_name_hin }} </h5>
                <h5>Product Code: {{ $products->product_code }} </h5>
                <h5>Product Short Descp En: {{ $products->short_descp_en }} </h5>
                <h5>Product Short Descp Hin: {{ $products->short_descp_hin }} </h5>
                <h5>Product Long Descp En: {!! $products->long_descp_en !!} </h5>
                <h5>Product Long Descp Hin: {!! $products->long_descp_hin !!}</h5>
                <h5>Product Size: {{ $products->product_size_en }} </h5>
                <h5>Product Color: {{ $products->product_color_en }} </h5>
                <h5>Product Image: <img src="{{ asset($products->product_thambnail) }}"
                        style="width: 60px; height: 50px;"></h5>
                <h5>Product Quantity: {{ $products->product_qty }}</h5>
                <h5>Product Selling Price: {{ $products->selling_price }}</h5>
                <h5>Product Discount: {{ $products->discount_price }} </h5>
            </div>
        </div>
        
    </div>

@endsection
