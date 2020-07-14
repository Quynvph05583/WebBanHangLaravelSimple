<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
class CategoryController extends Controller
{

    public function getCate() {
        $data['catelist'] = Category::all();
        return view('backend.category', $data);
    }

    public function postCate(Request $request) {
    $category = new Category();
    $category->cate_name = $request->name;
    $category->cate_slug = str_slug($request->name);
    $category->save();
    return back();
    }

    public function getEditCate($id) {
        $data['cate'] = Category::find($id);
        return view('backend.editcategory', $data);
    }

    public function postEditCate(EditCateRequest $request,$id) {
        $category = category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return redirect()->intended('admin/category');
    }

    public function getDeleteCate($id) {
        Category::destroy($id);
        return back();
    }
}
