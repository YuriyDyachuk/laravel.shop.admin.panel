<?php
/**
 * Created by PhpStorm.
 * User: Rostov
 * Date: 28.10.2019
 * Time: 17:35
 */

namespace App\Repositories\Admin;

use App\Models\Admin\User as Model;
use App\Repositories\CoreRepository;

class UserRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllUsers($perpage) {
        $users = $this->startConditions()
            ->join('user_roles', 'user_roles.user_id', '=', 'users.id')
            ->join('roles', 'user_roles.role_id', '=', 'roles.id')
            ->select('users.id', 'users.name', 'users.email', 'roles.name as role')
            ->orderBy('users.id')
            ->toBase()
            ->paginate($perpage);
        return $users;
    }


}
