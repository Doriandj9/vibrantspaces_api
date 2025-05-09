<?php

namespace App\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class BaseService {
    protected Model $model;

    public function save($extra = [], $withRequest = true): Model
    {
        if($withRequest ){
            $this->model = $this->model->fill(request()->all());
        }

        if(count($extra) > 0){
            foreach($extra as $key => $value){
                $this->model->{$key} = $value;
            }
        }
        if($this->model->password){
            $this->model->password = Hash::make($this->model->password);
        }
        $this->model->save();
        return $this->model;
    }

    public function update($id, $extra=[],$withRequest = true)
    {
        $this->model =  $this->model->find($id);
        if($withRequest){
            $this->model->fill(request()->all());
        }
        if(count($extra) > 0){
            foreach($extra as $key => $value){
                $this->model->{$key} = $value;
            }
        }
        $this->model->save();
        return $this->model;

    }

    public function __call($method, $arguments)
    {
        return $this->model->{$method}(...$arguments);
    }
}