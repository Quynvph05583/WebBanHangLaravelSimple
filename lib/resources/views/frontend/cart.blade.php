@extends('frontend.master')
@section('main')
@section('title', 'Giỏ hàng')
<link rel="stylesheet" href="css/cart.css">
<script rel="stylesheet" type="text/javascript">
    function updateCart(qty, rowId) {
        $.get(
            '{{asset('cart/update')}}',
            {qty:qty, rowId:rowId},
            function() {
                location.reload();
            }
        );
    }
</script>
<div id="wrap-inner">
    <div id="list-cart">
        <h3>Giỏ hàng</h3>
        @if (Cart::count()>0)
        <form>
            <table class="table table-bordered .table-responsive text-center">
                <tr class="active">
                    <td width="11.111%">Ảnh mô tả</td>
                    <td width="22.222%">Tên sản phẩm</td>
                    <td width="22.222%">Số lượng</td>
                    <td width="16.6665%">Đơn giá</td>
                    <td width="16.6665%">Thành tiền</td>
                    <td width="11.112%">Xóa</td>
                </tr>
                @foreach($items as $cart)
                    <tr>
                        <td><img class="img-responsive" style="width:100px;" src="{{asset('lib/storage/app/products/'.$cart->options->img)}}"></td>
                        <td>{{$cart->name}}</td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" type="number" value="{{$cart->qty}}" onchange="updateCart(this.value, '{{$cart-> rowId}}')"/>
                            </div>
                        </td>
                        <td><span class="price">{{number_format($cart->price, 0, '', '.')}}</span></td>
                        <td><span class="price">{{number_format($cart->price*$cart->qty, 0, '', '.')}}</span></td>
                        <td><a href="{{asset('cart/delete/'. $cart-> rowId)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"><span class="glyphicon glyphicon-trash"></span>Xóa</a></td>
                    </tr>
                @endforeach
            </table>
            <div class="row" id="total-price">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <a href="#" class="my-btn btn">Mua tiếp</a>
                    <a href="#" class="my-btn btn">Cập nhật</a>
                    <a href="{{asset('cart/delete/all')}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Xóa giỏ hàng</a>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    Tổng thanh toán: <span class="total-price">{{$total}}</span>
                </div>
            </div>
        </form>
    </div>
    <div id="xac-nhan">
        <h3>Xác nhận mua hàng</h3>
        <form method="post">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input required type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="name">Họ và tên:</label>
                <input required type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input required type="number" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="add">Địa chỉ:</label>
                <input required type="text" class="form-control" id="add" name="add">
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
            </div>
            {{csrf_field()}}
        </form>
    </div>
    @else
        <p>Bạn chưa có sản phầm nào trong giỏ hàng</p>
    @endif
</div>
@stop
