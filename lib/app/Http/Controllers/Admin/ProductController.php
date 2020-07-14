<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products;
use App\Model\Category;
use App\Http\Requests\AddProductRequest;
use DB;
use Auth;
use App\Http\Requests\EditProductRequest;
class ProductController extends Controller
{
    //
    public function getProduct()
    {
        $data['productlist'] = DB::table('vp_products')->join('vp_category', 'vp_products.prod_cate', '=', 'vp_category.cate_id')->orderBy('prod_id', 'desc')->get();
        return view('backend.product', $data);
    }

    public function getAddProduct()
    {
        $data['catelist'] = Category::all();
        return view('backend.addProduct', $data);
    }

    public function postAddProduct(AddProductRequest $request){
        $filename = $request->img->getClientOriginalName();
        $product = new Products;
        $product->prod_name =$request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_image = $filename;
        $product->prod_accessories = $request->accessories;
        $product->prod_price = $request->price;
        $product->prod_warranty = $request->warranty;
        $product->prod_promotion = $request->promotion;
        $product->prod_condition = $request->condition;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        $product->save();
        $request->img->storeAs('products', $filename);
        return redirect()->intended('admin/product');

    }

    public function getEditProduct($id)
    {
        $data['product'] = Products::find($id);
        $data['listcate'] = Category::all();
        return view('backend.editProduct',$data);
    }

    public function postEditProduct(EditProductRequest $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_price = $request->price;
        $product->prod_accessories = $request->accessories;
        $product->prod_warranty = $request->warranty;
        $product->prod_promotion = $request->promotion;
        $product->prod_condition = $request->condition;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        if($request->hasFile('img')) {
            $img = $request->file('img');
            $filename = $img->getClientOriginalName();
            $img->storeAs('products', $filename);
            $img = $request->img->getClientOriginalName();
            $product->prod_image = $img;
        }
        $product->update();

        return redirect()->intended('admin/product');
    }

    public function getDeleteProduct($id)
    {
        Products::destroy($id);
        return redirect()->intended('admin/product');
    }

}
