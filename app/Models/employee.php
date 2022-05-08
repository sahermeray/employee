<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'country_id',
        'city_id',
        'department_id',
        'state_id',
    ];
}
