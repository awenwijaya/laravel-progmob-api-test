<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
use App\Models\User;

class LoginController extends Controller
{

    use IssueTokenTrait;

	private $client;

	public function __construct(){
		$this->client = Client::find(1);
	}

    public function login(Request $request){

    	$this->validate($request, [
    		'username' => 'required',
            'password' => 'required'
        ]);
        return $this->issueToken($request, 'password');
    }

    public function refresh(Request $request){

    	$this->validate($request, [
    		'refresh_token' => 'required'
    	]);

    	return $this->issueToken($request, 'refresh_token');
    }


    public function logout(Request $request){

        $accessToken = Auth::user()->token();

        $refreshToken = DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);

        $accessToken->revoke();

        return response()->json([], 204);

    }

    public function user(Request $request){
        return response()->json($request->user());
    }

    public function editProfile(Request $request, $user) {
        if(Auth::attempt(['email' => $user, 'password' => $request->password])){
            $update = User::where('email',$user)->update([
                'name' => $request->name,
                'alamat_rumah' => $request->alamat_rumah,
                'no_telepon' => $request->no_telepon,
            ]);
            if($update>0){
                $usr = User::where('email', $request->email)->get();
                return response()->json([
                    'message'=>'Data berhasil diperbaharui!',
                    'data'=>$usr,
                ]);
            }else if($update==0){
                return response()->json([
                    'message'=>'Data gagal diperbaharui'
                ]);
            }
        }else{
            return response()->json([
                'message'=>'password salah'
            ]);
        }
    }

    public function listUser(Request $request){
        $this->validate($request, [
    		'username' => 'required'
        ]);
        $userdata = User::where("email", $request->username)->get();
        return response()->json([
            'data'=>$userdata
        ]);
    }


}
