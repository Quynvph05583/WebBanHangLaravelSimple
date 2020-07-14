<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Products;
use App\Model\Category;
use App\Model\Comment;
class FrontendController extends Controller
{
    //
    public function getHome() {
        $data['featured'] = Products::where('prod_featured', 1)->orderBy('prod_id', 'desc')->get();
        $data['products'] = Products::orderBy('prod_id', 'desc')->get();
        return view('frontend.home', $data);
    }

    public function getSearch(Request $request) {
        $result = $request->result;
        $data['keyword'] = $result;
        $result = str_replace('', '%', $result);
        $data['items'] = Products::where('prod_name', 'like', '%'.$result.'%')->get();
        return view('frontend.search', $data);
    }

    public function getDetail($id) {
        $data['items'] = Products::find($id);
        $data['comments'] = Comment::where('com_product', $id)->get();
        return view('frontend.details', $data);
    }

    public function getCategory($id){
        $data['cate'] = Category::find($id);
        $data['items'] = Products::where('prod_cate', $id)->orderBy('prod_id', 'desc')->paginate(8);
        return view('frontend.category', $data);
    }

    public function postComment(Request $request, $id) {
        $comment = new Comment();
        $comment->com_name = $request->name;
        $comment->com_content = $request->contents;
        $comment->com_email = $request->email;
        $comment->com_product = $id;
        $comment->created_at = date('Y-m-d H:i:s');
        $comment->save();
        return back();
    }
}
