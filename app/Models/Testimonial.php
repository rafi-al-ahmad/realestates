<?php

namespace App\Models;

use App\Traits\ModelTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory, ModelTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'subtitle',
        'featured',
        'text',
        'status',
        'order',
    ];

    protected $translatable = [
        'title',
        'subtitle',
        'text',
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function ($item) {
            $firstItem = static::whereNotNull('order')->orderBy("order", "asc")->first();
            $item->order = $firstItem?->order == null ? $item->id : $firstItem?->order;
            $item->save();
            static::where('id', '<>', $item->id)->increment("order");
        });
    }


    protected function text(): Attribute
    {
        return Attribute::make(
            get: $this->getAttributeTranslation()
        );
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: $this->getAttributeTranslation()
        );
    }

    protected function subtitle(): Attribute
    {
        return Attribute::make(
            get: $this->getAttributeTranslation()
        );
    }
}
