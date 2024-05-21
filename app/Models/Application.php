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

    public function scopeFilter($query, array $filters)
    {
        $sorts = [
            'title_asc' => 'title asc',
            'title_desc' => 'title desc',
            'download_count_asc' => 'download_count asc',
            'download_count_desc' => 'download_count desc',
            'feedbacks_count_asc' => 'feedbacks_count asc',
            'feedbacks_count_desc' => 'feedbacks_count desc',
        ];

        if (isset($filters['sort']) && array_key_exists($filters['sort'], $sorts)) {
            $query->orderByRaw($sorts[$filters['sort']]);
        }

        if (isset($filters['category']) && $filters['category'] != '') {
            $query->where('category_id', $filters['category']);
        }

        if (isset($filters['type']) && $filters['type'] != '') {
            $query->where('type_id', $filters['type']);
        }

        return $query;
    }
}
