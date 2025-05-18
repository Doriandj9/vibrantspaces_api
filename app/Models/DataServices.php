<?php

namespace App\Models;

use App\Core\BaseModel;

class DataServices extends BaseModel
{
    protected $fillable = [
        'type_contact',
        'description_area',
        'bathrooms',
        'rooms',
        'kitchens',
        'meters',
        'yard',
        'stairs',
        'services_id',
        'user_id',
        
    ];


    protected $with = ['user','confirmations','service'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function confirmations(){
        return $this->hasMany(Notification::class,'data_service_id','id');
    }

    public function service(){
        return $this->belongsTo(Services::class,'services_id','id');
    }

}
