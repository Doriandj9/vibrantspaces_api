<?php

namespace App\Http\Controllers;

use App\Core\JWToken;
use App\Services\AuthServices;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthServices $service){
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            $data = $this->service->attempt();
            
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage(),false);
        }
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        try {
            $user = \auth()->user();
            if (!$user) {
                throw new \ErrorException('No tiene permito este recurso');
            };
            $user->tokens()->delete();
            return \response_success(['message' => 'Cierre de session exitoso.']);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    public function updateData(Request $request, $id){
        try {
            $data = $this->service->update($id);
            $jwt = JWToken::create($data->toArray());
            return response_success([
                'jwt' => $jwt,
                'time_expired_token' => null,
                'token' => null
            ]);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

   public function updateAccount(Request $request, $id)
    {
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            $data = $this->service->updateData($id);
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage(),false);
        }
    }
}