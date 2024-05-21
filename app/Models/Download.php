<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'application_id',
        'downloaded_version'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
