<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function company()
    {
         $fillable = ['first_name','last_name','address','email','phone'];

        return $this->belongsTo(Company::class);
    }
}
