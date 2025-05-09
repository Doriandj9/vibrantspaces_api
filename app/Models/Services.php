<?php

namespace App\Models;

use App\Casts\PayloadCast;
use App\Core\DocStatus;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'title',
        'header',
        'subheader',
        'list',
        'trans',
        'picture',
        DocStatus::COLUMN_NAME,
    ];

    protected $casts = [
        'list'=> PayloadCast::class,
        'trans'=> PayloadCast::class,
    ];
    
}
