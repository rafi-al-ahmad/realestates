<?php

namespace App\Models;

use App\Traits\ModelTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, ModelTranslations;

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
}
