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
        'confirmation'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function getTotalFeedbackCount()
    {
        return Feedback::whereIn('application_id', $this->applications()->pluck('id'))->count();
    }

    public function getTotalDownloadCount()
    {
        return $this->applications()->sum('download_count');
    }
}
