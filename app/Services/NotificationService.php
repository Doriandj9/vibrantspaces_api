<?php

namespace App\Services;

use App\Core\BaseService;
use App\Models\Notification;

class NotificationService extends BaseService {
    
    public function __construct(Notification $model) {
        $this->model = $model;
    }
}