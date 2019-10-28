<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MetaTag;

class UserController extends AdminBaseController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
    }

    public function index()
    {
        $perpage = 8;
        $countUsers = MainRepository::getCountUsers();
        $paginator = $this->userRepository->getAllUsers($perpage);

        MetaTag::setTags(['title' => 'Список пользователей']);
        return view('blog.admin.user.index', compact('countUsers', 'paginator'));
    }


    public function create()
    {
        MetaTag::setTags(['title' => 'Добавление пользователя']);
        return view('blog.admin.user.add');
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
