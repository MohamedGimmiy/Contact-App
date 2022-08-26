<?php

namespace App\Models;

use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
use App\Scopes\ContactSearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','address','email','phone','company_id', 'user_id'];
    public $filterColumns = ['company_id'];
    public function company()
    {

        return $this->belongsTo(Company::class)->withoutGlobalScopes();
    }


    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
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
        static::addGlobalScope(new ContactSearchScope);
    }

    // customizing key route model binding to use first_name instead of id
/*     public function getRouteKeyName()
    {
        # code...
        return 'first_name';
    } */
}
