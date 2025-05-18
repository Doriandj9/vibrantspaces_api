<?php

namespace App\Models;

use App\Core\BaseModel;
use App\Core\DocStatus;

class Role extends BaseModel
{
    protected $fillable = ['name', DocStatus::COLUMN_NAME];

    public function users(){
        return $this->belongsToMany(User::class,'users_roles','role_id', 'user_id');
    }
}
