<?php

namespace App\Models;

use App\Core\DocStatus;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', DocStatus::COLUMN_NAME];

    public function users(){
        return $this->belongsToMany(User::class,'users_roles','role_id', 'user_id');
    }
}
