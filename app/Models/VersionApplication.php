<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VersionApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'version',
        'note',
        'size',
        'application_id',
    ];
}
