@extends('admin_dashboard')
@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    @php
                        $message = Session::get('message');
                        if ($message)
                        {
                            echo $message;
                            Session::put('message', null);
                        }
                    @endphp
                    <div class="position-center">
                        <form role="form" action="{{URL::to('save-brand-product')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea name="brand_product_description" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu">
                            </textarea>
                            </div>
                            <div class="form-group">
                                <label> Hiển thị </label>
                                <select name="category_product_status" class="form-control input-sm m-bot15">
                                    <option value="0"> Hiện </option>
                                    <option value="1"> Ẩn </option>
                                </select>
                            </div>
                            <button type="submit" name="add-brand-product" class="btn btn-info"> Thêm thương hiệu </button>
                        </form>
                    </div>

                </div>
            </section>

        </div>

    </div>
@endsection
