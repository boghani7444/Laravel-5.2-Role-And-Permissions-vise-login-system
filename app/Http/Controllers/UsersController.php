<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Criteria\User\UsersWithRoles;
use App\Repositories\UserRepository as User;
use App\Repositories\RoleRepository as Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class UsersController extends Controller {

	/**
	 * @var User
	 */
	protected $user;

	/**
	 * @param User $user
	 * @param Role $role
	 */
	public function __construct(User $user, Role $role)
	{
		$this->user = $user;
		$this->role = $role;
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$users = $this->user->pushCriteria(new UsersWithRoles())->paginate(10);
		$login_user =  Auth::user();
		$menu = 'users';
		return view('users.index', compact(['users','login_user','menu']));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$roles = $this->role->all();
		$login_user =  Auth::user();
		$menu = 'users';
		return view('users.create', compact(['roles','login_user','menu']));
	}

	/**
	 * @param CreateUserRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(Request $request)
	{
		$user = $this->user->create($request->all());

		if($request->get('role'))
		{
			$user->roles()->sync($request->get('role'));
		}
		else
		{
			$user->roles()->sync([]);
		}

		Flash::success('User successfully created');

		return redirect('/users');
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);
		$roles = $this->role->all();
		$userRoles = $user->roles()->lists('id')->toArray();
		$login_user =  Auth::user();
		$menu = 'user';
		return view('users.edit', compact(['user','login_user', 'menu','roles', 'userRoles']));
	}

	/**
	 * @param $id
	 * @param UpdateUserRequest $request
	 */
	public function update(Request $request, $id)
	{
		$user = $this->user->find($id);

		$user->name = $request->get('name');
		$user->email = $request->get('email');

		if($request->get('password'))
		{
			$user->password = $request->get('password');
		}
		$user->save();

		if($request->get('role'))
		{
			$user->roles()->sync($request->get('role'));
		}
		else
		{
			$user->roles()->sync([]);
		}

		Flash::success('User successfully updated');

		return redirect('/users');
	}

	/**
	 * @param $id
	 */
	public function destroy($id)
	{
		$this->user->delete($id);

		Flash::success('User successfully deleted');

		return redirect('/users');
	}

}