<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FilterScope implements Scope {

    protected $filterColumns = [];
    public function apply(Builder $builder, Model $model)
    {
        $columns = property_exists($model, 'filterColumns') ? $model->filterColumns : $this->filterColumns;

        foreach($columns as $column){
            if($value = request()->query($column)){
                $builder->where($column, $value);
            }
        }
    }

}
?>
