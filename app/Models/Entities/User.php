<?php

namespace App\Models\Entities;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
     * @mixin Builder
     */
class User extends Model implements Authenticatable
{
    use HasFactory;use AuthenticableTrait;
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
