<?php

namespace App\Models;

use App\Traits\ModelTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, ModelTranslations, InteractsWithMedia;

    protected $fillable = [
        "title",
        "order",
        "slug",
        "status",
    ];

    protected $translatable = [
        'title'
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: $this->getAttributeTranslation()
        );
    }

    protected function parentTitle(): Attribute
    {
        return Attribute::make(
            get: $this->getAttributeTranslation()
        );
    }

    public function image()
    {
        if (isset($this->media[0])) {
            return $this->media[0];
        }
        return null;
    }


    public function properties()
    {
        return $this->hasMany(Property::class, 'category_id', 'id');
    }

}
