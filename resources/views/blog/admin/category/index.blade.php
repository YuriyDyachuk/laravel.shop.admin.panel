@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Меню категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Список меню категорий @endslot
        @endcomponent
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div width="100%">
                            <small style="margin-left: 70px;" >Для редактирования - нажмите на кат-ю</small>
                            <small style="margin-left: 70px;">Нельзя удалить кат-ю имеющую наследника или товар</small>
                        </div>
                        <br>
                        @if ( $menu)
                            <div class="list-group list-group-root well">
                                @include('blog.admin.category.menu.customMenuItems', ['items' => $menu->roots()])
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- /.section -->

@endsection

