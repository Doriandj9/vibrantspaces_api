<?php

namespace App\Services;

use App\Core\BaseService;
use App\Core\JWToken;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthServices extends BaseService {
    
    private const TIME_SESSION = 120;

    public function __construct(User $model){
        $this->model = $model;
    }


    public function attempt(){
        $request = request();

        if(!Auth::attempt($request->all())){
           throw new \ErrorException("Credenciales Incorrectas");
        }
        $timeExpired = now()->addMinutes(self::TIME_SESSION);
        $accessToken = $request->user()->createToken('auth_token', [], $timeExpired)->plainTextToken;
        $jwt = JWToken::create($request->user()->toArray());

        $response = [
            'token' => $accessToken,
            'time_expired_token' => $timeExpired->format('Y-m-d H:i:s'),
            'jwt' => $jwt,
        ];
        return  $response;
    }

    public function updateData($id){
       
        $user = $this->update($id);
        $timeExpired = now()->addMinutes(self::TIME_SESSION);
        $accessToken = $user->createToken('auth_token', [], $timeExpired)->plainTextToken;
        $jwt = JWToken::create($user->toArray());

        $response = [
            'token' => $accessToken,
            'time_expired_token' => $timeExpired->format('Y-m-d H:i:s'),
            'jwt' => $jwt,
        ];
        return  $response;
    }
}