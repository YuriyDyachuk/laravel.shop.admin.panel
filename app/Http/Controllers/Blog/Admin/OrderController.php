<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\OrderRepository;
use Illuminate\Http\Request;
use MetaTag;

class OrderController extends AdminBaseController
{
    private $orderRepository;

    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = app(OrderRepository::class);
    }

    public function index()
    {
        $perpage = 5;
        $countOrders = MainRepository::getCountOrders();
        $paginator = $this->orderRepository->getAllOrders(6);

        MetaTag::setTags(['title' => 'Список заказов'] );
        return view('blog.admin.order.index', compact('countOrders','paginator'));
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

        $item = $this->orderRepository->getId($id);
        if (empty($item)) {
            abort(404);
        }

        $order = $this->orderRepository->getOneOrder($item->id);
        if (!$order) {
            abort(404);
        }

        $order_products = $this->orderRepository->getAllOrderProductsId($item->id);
        MetaTag::setTags(['title' => "Заказ № $item->id"]);
        return view('blog.admin.order.edit', compact('order_products', 'item', 'order'));

    }

    public function change($id) {
        $result = $this->orderRepository->changeStatusOrder($id);
        if ($result) {
            return redirect()
                ->route('blog.admin.orders.edit', $id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения']);
        }



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
