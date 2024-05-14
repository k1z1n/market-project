<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'sequence',
    ];

    public function application(){
        return $this->belongsTo(Application::class);
    }
}
