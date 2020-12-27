<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{

    use IssueTokenTrait;

	private $client;

	public function __construct(){
		$this->client = Client::find(1);
	}
	
	public function register(Request $request) {

    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6',
			'alamat_rumah' => 'required',
			'no_telepon' => 'required',
			'role' => 'required'
    	]);

    	$user = User::create([
    		'name' => request('name'),
    		'email' => request('email'),
			'password' => bcrypt(request('password')),
			'alamat_rumah' => request('alamat_rumah'),
			'no_telepon' => request('no_telepon'),
			'role' => request('role')
    	]);

    	return $this->issueToken($request, 'password');


    	//dd($request->all());

    }
}
