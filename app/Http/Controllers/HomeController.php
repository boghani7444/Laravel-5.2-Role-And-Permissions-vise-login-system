<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	public function index()
	{
		return redirect('dashboard');
	}

}