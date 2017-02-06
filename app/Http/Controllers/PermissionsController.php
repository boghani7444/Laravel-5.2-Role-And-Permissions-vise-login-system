<?php namespace App\Http\Controllers;

use App\Repositories\PermissionRepository as Permission;
use App\Repositories\RoleRepository as Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class PermissionsController extends Controller {

	private $role;
	private $permission;

	public function __construct(Permission $permission, Role $role)
	{
		$this->permission = $permission;
		$this->role = $role;
	}

	public function index()
	{
		$permissions = $this->permission->paginate(10);
		$login_user =  Auth::user();
		$menu = 'permissions';
		return view('permissions.index', compact(['permissions','login_user','menu']));
	}

	public function create()
	{
		$login_user =  Auth::user();
		$menu = 'permissions';
		return view('permissions.create', compact(['login_user','menu']));
	}

	public function store(Request $request)
	{
		$this->validate($request, array('name' => 'required', 'display_name' => 'required', 'route' => 'required'));

		$permission = $this->permission->create($request->all());

		$role = $this->role->findBy('name', 'admin');

		$role->perms()->sync([$permission->id], false);

		Flash::success('Permission successfully created');

		return redirect('/permissions');
	}

	public function edit($id)
	{
		$login_user =  Auth::user();
		$menu = 'permissions';
		$permission = $this->permission->find($id);
		return view('permissions.edit', compact(['permission','login_user','menu']));
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, array('name' => 'required', 'display_name' => 'required', 'route' => 'required'));

		$permission = $this->permission->find($id);
		$permission->update($request->all());

		Flash::success('Permission successfully updated');

		return redirect('/permissions');
	}

	public function destroy($id)
	{
		$this->permission->delete($id);
		Flash::success('Permission successfully deleted');
		return redirect('/permissions');
	}

}