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


}
