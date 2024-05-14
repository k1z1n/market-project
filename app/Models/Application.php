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
        "category_id",
        "developer_id"
    ];

    public function getCatalog($type){
        $typeModel = Type::where('title', $type)->first();

        if (!$typeModel) {
            abort(404);
        }

        $items = Application::where('type_id', $typeModel->id);

        return $items->get();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function latestVersion()
    {
        return $this->hasOne(VersionApplication::class)->latestOfMany();
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
