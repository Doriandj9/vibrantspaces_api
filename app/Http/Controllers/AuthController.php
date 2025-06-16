<?php

namespace App\Http\Controllers;

use App\Core\JWToken;
use App\Models\User;
use App\Services\AuthServices;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthServices $service)
    {
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
            return response_error($th->getMessage(), false);
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
            }
            ;
            $user->tokens()->delete();
            return \response_success(['message' => 'Cierre de session exitoso.']);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    public function updateData(Request $request, $id)
    {
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
            ]);
            $data = $this->service->updateData($id);
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage(), false);
        }
    }

    public function forwardPassword(Request $request)
    {

        try {
            $request->validate([
                'email' => 'required|email'
            ]);
            $user = $this->service->where('email', $request->get('email'))->first();
            if (!$user) {
                throw new \ErrorException('Not found email');
            }
            $date = now();
            $date = $date->addMinutes(120);
            $data = [
                'email' => $request->get('email'),
                'expired_date' => $date->format('Y-m-d H:i:s')
            ];
            $token = JWToken::create($data);


            $dataDb = [
                'email' => $request->get('email'),
                'token' => $token,
                'created_at' => now()
            ];
            DB::table('password_reset_tokens')->updateOrInsert(['email' => $request->email], $dataDb);
            $url = env('APP_URL_FRONTEND') . '/auth/change-password?t=' . base64_encode($token);
            sendEmail($request->get('email'), 'Reset Password', 'emails.forward-password', ['url' => $url]);
            return response_success('OK');
        } catch (\Throwable $th) {
            return response_error($th->getMessage(), false);
        }
    }



    public function verifyResetPass(Request $request)
    {
        try {
            $request->validate([
                'token' => 'required'
            ]);

            $t = base64_decode($request->get('token'));
            $token = DB::table('password_reset_tokens')->where('token', '=', $t)
                ->first();

            if (!$token) {
                throw new \ErrorException('Token not found');
            }

            $values = JWToken::decode($t);
            $timeToken = $values->expired_date;

            $time = now();
            $timeExpired = Carbon::parse($timeToken);
            if ($timeExpired->lte($time)) {
                return throw new \ErrorException('The time to reset your password has expired, please request it again.');
            }

            return response_success(['email' => $values->email]);
        } catch (\Throwable $th) {
            return response_error($th->getMessage(), false);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required',
                'email' => 'required'
            ]);
            $user= $this->service->where('email', $request->get('email'))->first();
            $user->password = $request->password;
            $user->save();
            return response_success('OK');
        } catch (\Throwable $th) {
            return response_error($th->getMessage(), false);
        }
    }
}