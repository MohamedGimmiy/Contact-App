<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SearchScope implements Scope {

    public function apply(Builder $builder, Model $model)
    {

        if($search = request('search')){
            $builder->where('first_name','LIKE', "%{$search}%");
            $builder->orWhere('last_name','LIKE', "%{$search}%");
            $builder->orWhere('email','LIKE', "%{$search}%");
        }
    }

}

?>
