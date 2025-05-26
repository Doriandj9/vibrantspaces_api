<?php


namespace App\Filters;

use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Builder;

class DataServiceFilter extends FilterBuilder {
 
    public function docStatus($doc_status = null)
    {
        
        if ($doc_status) {
            $this->builder->when($doc_status, function (Builder $builder) use ($doc_status) {
                $builder->where('data_services.doc_status', $doc_status);    
            });     
        }
    }

    

    public function search($search = null)
    {
        if($search){
            // $this->groupSearch($search, ['record']);
            $this->builder->when($search, function (Builder $builder) use ($search) {
                $builder->join('users','users.id','=','receipts.user_id')
                ->where('users.last_name','ilike',"%". $search ."%")
                ->orWhere('users.first_name','ilike',"%". $search ."%");
            });

        }
    }
}