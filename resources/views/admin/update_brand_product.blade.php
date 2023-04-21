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
                            <form role="form" action="{{URL::to('upddate-brand-product/'.$value->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" value="{{$value->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea name="brand_product_description" class="form-control" id="exampleInputPassword1" > {{$value->description}} </textarea>
                                </div>

                                <button type="submit" name="upddate-brand-product" class="btn btn-info"> Cập nhật thương hiệu </button>
                            </form>
                        </div>@endforeach

                </div>
            </section>

        </div>

    </div>
@endsection
