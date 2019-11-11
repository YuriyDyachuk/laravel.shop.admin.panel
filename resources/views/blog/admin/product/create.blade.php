@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Создание нового товара @endslot
            @slot('parent') Главная @endslot
            @slot('product') Список товаров @endslot
            @slot('active') Новый товар @endslot
        @endcomponent
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{ route('blog.admin.products.store', $item->id) }}" method="POST" id="add"
                          data-toggle="validator">
                        @csrf

                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Наименование товара</label>
                                <input type="text" class="form-control" name="title" id="title"
                                placeholder="Наименование товара" value="{{old('title')}}" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <select name="parent_id" id="parent_id" class="form-control" required>
                                    <option>-- Выберите категорию --</option>
                                    @include('blog.admin.category.include.edit_categories_all_list',
                                    ['categories' => $categories])
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="keywords" id="keywords" class="form-control"
                                placeholder="Ключевые слова" value="{{old('keywords')}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" name="keywords" id="description" class="form-control"
                                       placeholder="Описание" value="{{old('description')}}">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="price">Цена</label>
                                <input type="text" name="price" id="description" class="form-control"
                                       placeholder="Цена" value="{{old('price')}}"
                                pattern="^[0-9.]{1,}$" required data-error="Допускаются цифры и десятичная точка">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="price">Цена</label>
                                <input type="text" name="old_price" id="description" class="form-control"
                                       placeholder="Старая цена" value="{{old('price')}}"
                                       pattern="^[0-9.]{1,}$" required data-error="Допускаются цифры и десятичная точка">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="content">Контент</label>
                                <textarea name="content" id="editor1" cols="80" rows="10">{{old('content')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" checked> Статус
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="hit"> Хит
                                </label>
                            </div>

                        </div>
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
