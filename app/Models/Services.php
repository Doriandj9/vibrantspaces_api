<?php

namespace App\Models;

use App\Casts\PayloadCast;
use App\Core\BaseModel;
use App\Core\DocStatus;

class Services extends BaseModel
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
    
    public function dataServices(){
        return $this->hasMany(DataServices::class,'services_id','id');
    }
}
