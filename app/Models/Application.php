<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "age",
        "logo_image",
        "banner_image",
        "description",
        "type_id",
        "category_id"
    ];
}
