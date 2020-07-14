@extends('frontend.master')
@section('main')
@section('title', 'Chi tiết sản phầm')
	<link rel="stylesheet" href="css/details.css">

					<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$items->prod_name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img style="width:250px" src="{{asset('lib/storage/app/products/'.$items->prod_image)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Giá: <span class="price">{{number_format($items->prod_price, 0, '', ',')}} VNĐ</span></p>
									<p>Bảo hành: {{$items->prod_warranty}}</p>
									<p>Phụ kiện: {{$items->prod_accessories}}</p>
									<p>Tình trạng: {{$items->prod_conditon}}</p>
									<p>Khuyến mại: {{$items->prod_promotion}} %</p>
									<p>Còn hàng: @if($items->prod_status == 1) Còn hàng @else Hết hàng @endif</p>
									<p class="add-cart text-center"><a href="{{asset('cart/add/'.$items->prod_id)}}">Đặt hàng online</a></p>
								</div>
							</div>
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">{!! $items->prod_description !!}</p>
						</div>
						<div id="comment">
                            <h4>Đánh giá & Bình luận</h4>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
							<div class="col-md-9 comment">
								<form method="post">
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="contents"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
									</div>
                                    {{csrf_field()}}
								</form>
							</div>
						</div>
						<div id="comment-list">
							<ul>
                                @foreach($comments as $comment)
								<li class="com-title">
									{{$comment->com_name}}
									<br>
									<span>{{date("Y-m-d h:i:sa ", strtotime($comment->created_at))}}</span>
								</li>
								<li class="com-details">
                                    {{$comment->com_content}}
								</li>
                                    <hr>
							    @endforeach
                            </ul>
						</div>
					</div>
					<!-- end main -->

@stop
