<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

    /**
     * @mixin Builder
     */
class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'telephone',
        'address',
        'country',
        'role',
        'step',
    ];

}
