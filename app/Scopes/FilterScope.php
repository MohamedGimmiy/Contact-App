<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FilterScope implements Scope {

    public function apply(Builder $builder, Model $model)
    {
        if($company_id = request('company_id')){
            $builder->where('company_id', $company_id);
        }

        if($search = request('search')){
            $builder->where('first_name', 'LIKE',"%{$search}%");
        }
    }

}





?>
