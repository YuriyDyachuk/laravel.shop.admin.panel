<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\Admin\Category;
use App\Repositories\Admin\ProductRepository;
use MetaTag;
use Illuminate\Http\Request;

class ProductController extends AdminBaseController
{
    private $productRepository;

    public function __construct()
    {
        parent::__construct();
        $this->productRepository = app(ProductRepository::class);
    }

    public function index()
    {
        $perpage = 7;
        $getAllProducts = $this->productRepository->getAllProducts($perpage);
        $count_product = $this->productRepository->getCountProducts();


        MetaTag::setTags(['title' => 'Список продуктов']);
        return view('blog.admin.product.index', compact('getAllProducts', 'count_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Category();

        MetaTag::setTags(['title' => 'Создание нового продукта']);
        return view('blog.admin.product.create', [
            'categories' => Category::with('children')
                            ->where('parent_id', '0')
                            ->get(),
            'delimiter' => '-',
            'item'      => $item,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
