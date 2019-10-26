<?php
/**
 * Created by PhpStorm.
 * User: Rostov
 * Date: 26.10.2019
 * Time: 20:54
 */

namespace App\Repositories\Admin;

use App\Models\Admin\Category as Model;
use App\Repositories\CoreRepository;
use Menu as CatMenu;

class CategoryRepository extends CoreRepository
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function buildMenu($arrMenu) {
        $mBuilder = CatMenu::make('MyNav', function ($m) use ($arrMenu) {
           foreach  ($arrMenu as $item) {
               if ($item->parent_id == 0) {
                   $m->add($item->title, $item->id)
                       ->id($item->id);
               } else {
                   if ($m->find($item->parent_id)) {
                       $m->find($item->parent_id)
                           ->add($item->title, $item->id)
                           ->id($item->id);
                   }
               }
           }
        });
        return $mBuilder;
    }

}
