<?php

namespace App\Services;

use App\Core\BaseService;
use App\Models\DataServices;

class DataServicesService extends BaseService {

    public function __construct(DataServices $model) {
        $this->model = $model;
    }
}