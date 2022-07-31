<?php

namespace App\Models;

use App\Scopes\FilterScope;
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

    public static function booted()
    {
        static::addGlobalScope(new FilterScope);
    }
}
