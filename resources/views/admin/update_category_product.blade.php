@extends('admin_dashboard')
@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
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
                    @foreach($result as $key => $value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('upddate-category-product/'.$value->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" value="{{$value->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea name="category_product_description" class="form-control" id="exampleInputPassword1" > {{$value->description}} </textarea>
                            </div>

                            <button type="submit" name="upddate-category-product" class="btn btn-info"> Cập nhật danh mục </button>
                        </form>
                    </div>@endforeach

                </div>
            </section>

        </div>

    </div>
@endsection
