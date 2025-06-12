<?php

namespace App\Models;

use App\Casts\PayloadCast;
use App\Core\BaseModel;
use App\Core\DocStatus;

class Notification extends BaseModel
{
    protected $fillable = [
        'sender',
        'receiver',
        'payload',
        'type',
        DocStatus::COLUMN_NAME,
        'created_by',
        'updated_by',
        'data_service_id',
        'email',
        'attachments',
        'phone_number',
        'doc_type'
    ];


    protected $casts = [
        'payload' => PayloadCast::class,
    ];

}
