<?php

namespace App\Core;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWToken {

    private const ALG = 'HS256';
    private const KEY = 'Vibrantspaces_2025';
    public static function create($data): string
    {
        $token = JWT::encode($data,self::KEY,self::ALG);
        return $token;
    }

    public static function verify($token): bool
    {
        $key = new Key(self::KEY,self::ALG);
        try {
            JWT::decode($token,$key);
            return true;
        } catch (\Throwable $e) {
            return false;        
        }
    }

    public static function decode($token)
    {
        $keyToken = new Key(self::KEY,self::ALG);
        $token = JWT::decode($token,$keyToken);
        return $token;
    }
}