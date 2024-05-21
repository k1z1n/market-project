<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Developer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'status',
        'blocked',
        'password',
    ];

    public function applications(){
        return $this->hasMany(Application::class);
    }
}
