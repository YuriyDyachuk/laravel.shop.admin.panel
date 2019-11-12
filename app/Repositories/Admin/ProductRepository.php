<?php
/**
 * Created by PhpStorm.
 * User: Rostov
 * Date: 21.10.2019
 * Time: 17:50
 */

namespace App\Repositories\Admin;

use App\Models\Admin\Product as Model;
use App\Repositories\CoreRepository;


class ProductRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getLastProducts($perpage) {
        $get = $this->startConditions()
            ->orderBY('id', 'DESC')
            ->limit($perpage)
            ->paginate($perpage);
        return $get;
    }

    public function getAllProducts($perpage)
    {
        $get_all = $this->startConditions()
            ->join('categories','products.category_id','=','categories.id')
            ->select('products.*', 'categories.title AS cat')
            ->orderBy(\DB::raw('LENGTH(products.title)','products.title'))
            ->limit($perpage)
            ->paginate($perpage);
        return $get_all;
    }

    public function getCountProducts()
    {
        $count_product = $this->startConditions()
            ->count();
        return $count_product;
    }


}
