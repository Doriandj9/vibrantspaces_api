<?php

namespace App\Models;

use App\Core\DocStatus;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
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
        'doc_type'
    ];



}
