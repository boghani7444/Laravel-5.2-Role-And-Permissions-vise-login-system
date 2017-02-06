<?php namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class PermissionRepository extends Repository {

	public function model()
	{
		return 'App\Models\Permission';
	}

}