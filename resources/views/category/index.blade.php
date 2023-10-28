<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
        <title>دسته‌بندی‌ها</title>
    </head>
    <body>
        <section class="row p-5">
            <section class="col-12">
                <section class="main-body-container">
                    <section class="main-body-container-header">
                        <h5>
                            دسته‌بندی‌ها
                        </h5>
                    </section>
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{ route('category.create') }}" class="btn btn-info btn-sm">ایجاد دسته‌بندی جدید</a>
                    </section>

                    <section class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام دسته‌بندی</th>
                                    <th>دسته‌بندی والد</th>
                                    <th>وضعیت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->parent_id ? $category->parent->name : 'دسته‌بندی اصلی' }}</td>
                                    <td>
                                        <label>
                                            <input type="checkbox" @if ($category->status === 1)
                                            checked
                                            @endif>
                                        </label>
                                    </td>
                                    <td class="width-16-rem text-left">
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                        <form class="d-inline" action="{{ route('category.destroy', $category->id) }}" method="post">@csrf
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </section>
            </section>
        </section>
    </body>
</html>

