<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class BrandProduct extends Controller
{
    public function add_brand_product()
    {
        return view('admin.add_brand_product');
    }

    public function all_brand_product()
    {
        $result = DB::table('brands')->get();
        $manager_category_product = view('admin.all_brand_product')->with('result', $result);
        return view('admin_dashboard')->with('admin.all_brand_product', $manager_category_product);
    }

    public function save_brand_product(Request $request)
    {
        $data = array();
        $data['name'] = $request->brand_product_name;
        $data['description'] = $request->brand_product_description;
        $data['status'] = $request->brand_product_status;
        $result = DB::table('brands')->insert($data);

        if ($result)
        {
            Session::put('message', 'Thêm thương hiệu sản phẩm thành công');
            return Redirect::to('add-brand-product');
        }
        else
        {
            Session::put('message', 'Thêm thương hiệu sản phẩm thất bại');
            return Redirect::to('add-brand-product');
        }
    }

    public function active_brand_product($brand_product_id)
    {
        DB::table('brands')->where('id', $brand_product_id)->update(['status'=>0]);
        Session::put('message', 'Hiện thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    public function unactive_brand_product($brand_product_id)
    {
        DB::table('brands')->where('id', $brand_product_id)->update(['status'=>1]);
        Session::put('message', 'Ẩn thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    public function update_brand_product($brand_product_id)
    {
        $result = DB::table('brands')->where('id', $brand_product_id)->get();
        $manager_brand_product = view('admin.update_brand_product')->with('result', $result);
        return view('admin_dashboard')->with('update.all_brand_product', $manager_brand_product);
    }

    public function upddate_brand_product(Request $request ,$brand_product_id)
    {
        $data = array();
        $data['name'] = $request->brand_product_name;
        $data['description'] = $request->brand_product_description;
        $result = DB::table('brands')->where('id', $brand_product_id)->update($data);
        Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
}
