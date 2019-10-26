<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\OrderRepository;
use App\Repositories\Admin\ProductRepository;
use MetaTag;

class MainController extends AdminBaseController
{
    private $orderRepository;
    private $productRepository;

    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = app(OrderRepository::class);
        $this->productRepository = app(ProductRepository::class);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        //$perpage = 4;

        $last_orders = $this->orderRepository->getAllOrders(12);
        $last_products = $this->productRepository->getLastProducts(7);

        $countOrders = MainRepository::getCountOrders();
        $countUsers = MainRepository::getCountUsers();
        $countProducts = MainRepository::getCountProducts();
        $countCategories = MainRepository::getCountCategories();

        MetaTag::setTags(['title'], 'Admin panel');
        return view('blog.admin.main.index', compact('last_products' , 'last_orders' , 'countOrders', 'countUsers', 'countProducts', 'countCategories'
            ));
    }
}
