<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','address','email','phone','company_id'];

    public function company()
    {

        return $this->belongsTo(Company::class);
    }

    // creating a local scope orderBy
    public function scopeLatestFirst($query)
    {
        # code...
        return $query->orderBy('id','desc');
    }

    // creating our local scope filter scope
    public function scopeFilter($query)
    {
        # code...
        if($company_id = request('company_id')){
            $query->where('company_id', $company_id);
        }

        if($search = request('search')){
            $query->where('first_name', 'LIKE',"%{$search}%");
        }
        return $query;
    }
}
