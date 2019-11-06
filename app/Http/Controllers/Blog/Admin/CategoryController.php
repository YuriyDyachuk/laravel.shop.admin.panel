<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\AdminCategoryUpdateRequest;
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

    /** @throws \Exception */
    public function mydel() {
        $id = $this->categoryRepository->getRequestID();
        if (!$id) {
            return back()->withErrors(['msg' => 'Ошибка с ID']);
        }

        $children = $this->categoryRepository->checkChildren($id);
        if ($children) {
            return back()->withErrors(['msg' => 'Удаление невозможно в кат-рии есть вложеные кат-рии!']);
        }

        $parents = $this->categoryRepository->checkParentsProductsId($id);
        if ($parents) {
            return back()->withErrors(['msg' => 'Удаление невозможно в кат-рии есть товары!']);
        }

        $delete = $this->categoryRepository->deleteCategory($id);
        if ($delete) {
            return redirect()
                ->route('blog.admin.categories.index')
                ->with(['success' => "Запись id [$id] удалена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления!']);
        }

    }

    public function create()
    {
        $item = new Category();
        $categoryList = $this->categoryRepository->getComboBosCategories();



        MetaTag::setTags(['title' => 'Создание новой категории']);
        return view('blog.admin.category.create',
            ['categories' => Category::with('children')
                ->where('parent_id', 0)
                ->get(),
                'delimiter' => '-',
                'item' => $item,
            ]);

    }


    public function store(AdminCategoryUpdateRequest $request)
    {
        $name = $this->categoryRepository->checkUniqueName($request->title, $request->parent_id);
        if ($name) {
            return back()
                ->withErrors(['msg' => 'Не может быть в одной и той же категории двух одинаковых.
                    Выберите другую категорию'])
                ->withInput();
        }

        $data = $request->input();
        $item = new Category();
        $item->fill($data)->save();
        if ($item) {
            return redirect()
                ->route('blog.admin.categories.create', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

    }

    public function show($id)
    {
        //
    }

    public function edit(CategoryRepository $categoryRepository, $id)
    {
        $item = $this->categoryRepository->getId($id);
        if (empty($item)) {
            abort(404);
        }
        MetaTag::setTags(['title' => "Редактирование категории № $id"]);
        return view('blog.admin.category.edit',
            ['categories' => Category::with('children')
                ->where('parent_id', 0)
                ->get(),
                'delimiter' => '-',
                'item' => $item,
            ]);
    }

    public function update(AdminCategoryUpdateRequest $request, $id)
    {$item = $this->categoryRepository->getId($id);
    if (empty($item)) {
        return back()
            ->withErrors(['msg' => "Запись - [{$id}] не найдена"])
            ->withInput();
    }
    $data = $request->all();
    $result = $item->update($data);
    if ($result) {
        return redirect()
            ->route('blog.admin.categories.edit', $item->id)
            ->with(['success' => 'Успешно сохранено']);
    } else {
        return back()
            ->withErrors(['msg' => 'Ошибка сохранения'])
            ->withInput();
    }

    }

    public function destroy($id)
    {
        //
    }
}
