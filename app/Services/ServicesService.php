<?php

namespace App\Services;

use App\Core\BaseService;
use App\Core\JWToken;
use App\Models\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ServicesService extends BaseService {
    
    public function __construct(Services $model) {
        $this->model = $model;
    }
}