<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\Admin\Category;
use App\Repositories\Admin\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MetaTag;
class CategoryController extends AdminBaseController
{

    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->categoryRepository = app(CategoryRepository::class);
    }

    public function index()
    {
        $arrMenu = Category::all();
        $menu = $this->categoryRepository->buildMenu($arrMenu);

        MetaTag::setTags(['title' => 'Список катагорий']);
        return view('blog.admin.category.index', ['menu' => $menu]);
    }

    public function mydel() {

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
