<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
        <title>ویرایش دسته‌بندی</title>
    </head>
    <body>
        <section class="row p-5">
            <section class="col-12">
                <section class="main-body-container">
                    <section class="main-body-container-header">
                        <h5>
                            ویرایش دسته‌بندی
                        </h5>
                    </section>

                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{ route('category.index') }}" class="btn btn-dark btn-sm">بازگشت</a>
                    </section>

                    <section>
                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <section class="row">

                                <section class="col-12 col-md-6 my-2">
                                    <div class="form-group">
                                        <label for="name">نام دسته</label>
                                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{old('name', $category->name)}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">دسته والد</label>
                                        <select name="parent_id" id="" class="form-control form-control-sm">
                                            <option value="">دسته‌ی اصلی</option>
                                            @foreach ($parent_categories as $parent_category)

                                            <option value="{{ $parent_category->id }}"  @if(old('parent_id', $category->parent_id) == $parent_category->id) selected @endif>{{ $parent_category->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>

                                    <section class=" my-2">
                                    <div class="form-group">
                                        <label for="status">وضعیت</label>
                                        <select name="status" id="status" class="form-control form-control-sm">
                                            <option value="0" @if (old('status', $category->status)==0) selected @endif>غیرفعال</option>
                                            <option value="1" @if (old('status',$category->status)==1) selected @endif>فعال</option>
                                        </select>
                                    </div>

                                    <section class="">
                                        <button class="btn btn-danger btn-sm">ثبت</button>
                                    </section>

                                </section>
                            </section>
                        </form>
                    </section>
                </section>
            </section>
        </section>
    </body>
</html>

