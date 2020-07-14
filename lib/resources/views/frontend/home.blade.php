@extends('frontend.master')
@section('main');
@section('title', 'Trang chủ')
                <div id="wrap-inner">
                    <div class="products">
                        <h3>sản phẩm nổi bật</h3>
                        <nav class="navbar navbar-expand-sm">
                            <!-- Brand/logo -->
                            <span class="sort" href="#">Sắp xếp theo:</span>
                            <!-- Links -->
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Mới nhất</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Bán chạy</a>
                                </li>
                                <li class="select_item">
                                    <select id="sort">
                                        <option value="price" selected="selected">Mặc định</option>
                                        <option value="price">Giá: Thấp đến Cao</option>
                                        <option value="price_desc">Giá: Cao đến Thấp</option>
                                    </select>
                                </li>
                            </ul>
                        </nav>

                        <div class="product-list row">
                            @foreach($featured as $items)
                                <div class="product-item col-md-3 col-sm-6 col-xs-12">
                                    <a href="#"><img src="{{asset('lib/storage/app/products/'.$items->prod_image)}}"
                                                     class="img-thumbnail"></a>
                                    <p><a href="#">{{$items->prod_name}}</a></p>
                                    <p class="price">{{number_format($items->prod_price, 0, '.', '.')}} VNĐ</p>
                                    <div class="marsk">
                                        <a href="{{asset('detail/'.$items->prod_id.'/'.$items->prod_slug.'.html')}}">Xem chi tiết</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="products">
                        <h3>sản phẩm mới</h3>
                        <div class="product-list row">
                            @foreach($products as $product)
                                <div class="product-item col-md-3 col-sm-6 col-xs-12">
                                    <a href="#"><img src="{{asset('lib/storage/app/products/'.$product->prod_image)}}"
                                                     class="img-thumbnail"></a>
                                    <p><a href="#">{{$product->prod_name}}</a></p>
                                    <p class="price">{{number_format($items->prod_price, 0, '.', '.')}} VNĐ</p>
                                    <div class="marsk">
                                        <a href="{{asset('detail/'.$items->prod_id.'/'.$items->prod_slug.'.html')}}">Xem chi tiết</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
@stop

                <!-- end main -->
