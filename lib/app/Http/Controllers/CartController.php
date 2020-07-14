<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Model\Products;
use Mail;
class CartController extends Controller
{
    //
    public function getAddCart($id){
        $products = Products::find($id);
        Cart::add(['id' => $id, 'name' => $products->prod_name, 'qty' => 1, 'price' => $products->prod_price, 'options' => ['img' => $products->prod_image]]);
        return redirect('cart/show');
        $data = Cart::content();
        dd($data);
    }
    public function getShowCart() {
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        return view('frontend.cart', $data);
    }

    public function getDeleteCart($id) {

        if($id == 'all') {
            Cart::destroy();
        } else {
            Cart::remove($id);
        }
        return back();
    }

    public function getUpdateCart(Request $request) {
            Cart::update($request->rowId, $request->qty);
    }

    public function postCart(Request $request) {
        $data['info'] = $request->all();
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        $email = $request->email;
        Mail::send('frontend.email', $data, function ($message) use ($email)
        {
           $message->from('quyhunter1999@gmail.com', 'QNshop');
           $message->to($email, $email);
           $message->cc('quyaka199@gmail.com', 'Nguyễn văn quý');
           $message->subject('[QN_Shop]Xác nhận hóa đơn mua hàng');
        });
        return redirect('complete');
    }

    public function getComplete() {
        return view('frontend.complete');
    }
}
