<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\AdminUserEditRequest;
use App\Models\Admin\User;
use App\Models\UserRole;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\UserRepository;
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


    /**
     * @param AdminUserEditRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminUserEditRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        if (!$user) {
            return back()
                ->withErrors(['msg' => 'Ошибка создания!'])
                ->withInput();
        } else {
            $role = UserRole::create([
               'user_id' => $user->id,
               'role_id' => (int)$request['role'],
            ]);

            if (!$role) {
                back()->withErrors(['msg' => 'Ошибка создания!'])
                    ->withInput();
            } else {
                return redirect()
                    ->route('blog.admin.users.index')
                    ->with(['success' => 'Успешно сохранено']);
            }
        }

    }

    public function edit($id)
    {
        $perpage = 5;
        $item = $this->userRepository->getId($id);
        if (empty($item)) {
            abort(404);
        }

        $orders = $this->userRepository->getUserOrders($id, $perpage);
        $role = $this->userRepository->getUserRole($id);
        $count = $this->userRepository->getCountOrdersUs($id);
        $count_orders = $this->userRepository->getCountOrder($id, $perpage);


        MetaTag::setTags(['title' => "Редактирование пользователя № {$item->id}"]);
        return view('blog.admin.user.edit', compact('item','orders', 'role', 'count', 'count_orders'));

    }

    public function update(AdminUserEditRequest $request, User $user, UserRole $role)
    {
        $user->name = $request['name'];
        $user->email = $request['email'];
        $request['password'] == null ?: $user->password = bcrypt($request['password']);
        $save = $user->save();
        dd($save);
        if (!$save) {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        } else {
            $role->where('user_id', $user->id)->update(['role_id' => (int)$request['role']]);
            return redirect()
                ->route('blog.admin.users.edit', $user->id)
                ->with(['success' => 'Успешно сохранено']);
        }


    }


    public function destroy($id)
    {
        //
    }
}
