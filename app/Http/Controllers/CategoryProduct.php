<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view('admin.add_category_product');
    }

    public function all_category_product()
    {
        $result = DB::table('categories')->get();
        $manager_category_product = view('admin.all_category_product')->with('result', $result);
        return view('admin_dashboard')->with('admin.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request)
    {
        $data = array();
        $data['name'] = $request->category_product_name;
        $data['description'] = $request->category_product_description;
        $data['status'] = $request->category_product_status;
        $result = DB::table('categories')->insert($data);

        if ($result)
        {
            Session::put('message', 'Thêm danh mục sản phẩm thành công');
            return Redirect::to('add-category-product');
        }
        else
        {
            Session::put('message', 'Thêm danh mục sản phẩm thất bại');
            return Redirect::to('add-category-product');
        }
    }

    public function active_category_product($category_product_id)
    {
        DB::table('categories')->where('id', $category_product_id)->update(['status'=>0]);
        Session::put('message', 'Hiện danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function unactive_category_product($category_product_id)
    {
        DB::table('categories')->where('id', $category_product_id)->update(['status'=>1]);
        Session::put('message', 'Ẩn danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function update_category_product($category_product_id)
    {
        $result = DB::table('categories')->where('id', $category_product_id)->get();
        $manager_category_product = view('admin.update_category_product')->with('result', $result);
        return view('admin_dashboard')->with('update.all_category_product', $manager_category_product);
    }

    public function upddate_category_product(Request $request ,$category_product_id)
    {
        $data = array();
        $data['name'] = $request->category_product_name;
        $data['description'] = $request->category_product_description;
        $result = DB::table('categories')->where('id', $category_product_id)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product()
    {

    }
}
