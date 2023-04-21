@extends('admin_dashboard')
@section('main_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
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
                    <form role="form" action="{{URL::to('save-category-product')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea name="category_product_description" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label> Hiển thị </label>
                            <select name="category_product_status" class="form-control input-sm m-bot15">
                                <option value="0"> Hiện </option>
                                <option value="1"> Ẩn </option>
                            </select>
                        </div>
                        <button type="submit" name="add-category-product" class="btn btn-info"> Thêm danh mục </button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>
@endsection
