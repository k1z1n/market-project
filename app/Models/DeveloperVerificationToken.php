<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperVerificationToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'expires_at',
        'sent_at',
        'developer_id',
    ];
}
