<?php

namespace App\Models;

use App\Traits\ModelTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Property extends Model implements HasMedia
{
    use HasFactory, ModelTranslations, InteractsWithMedia;

    protected $fillable = [
        "title",
        "description",
        "meta_title",
        "meta_desc",
        // "url",
        "price_tl",
        "price_usd",
        "rent_deposit",
        "rental_income",
        "credit_eligibility",
        "interchange",
        "dues",
        "net_area",
        "gross_area",
        "living_rooms_no",
        "bedrooms_no",
        "bathrooms_no",
        "building_floors",
        "floor_number",
        "is_furnished",
        "is_featured",
        "views",
        "status",
        "address_id",
        "user_status_id",
        "heating_type_id",
        "building_age_id",
        "type_id",
        "housing_type_id",
        "property_type_id",
        "category_id",
        "agent_id",
    ];

    protected $translatable = [
        "title",
        "description",
        "meta_title",
        "meta_desc",
        "url",
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: $this->getAttributeTranslation()
        );
    }


    protected function description(): Attribute
    {
        return Attribute::make(
            get: $this->getAttributeTranslation()
        );
    }


    protected function metaTitle(): Attribute
    {
        return Attribute::make(
            get: $this->getAttributeTranslation()
        );
    }


    protected function metaDescription(): Attribute
    {
        return Attribute::make(
            get: $this->getAttributeTranslation()
        );
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CONTAIN, 500, 500)
            ->nonQueued();
    }

    public function features()
    {
        return $this->belongsToMany(Definition::class, 'property_features', 'property_id', 'feature_id')
            ->where('type', Definition::types['feature'])->select('definitions.id', 'definitions.title', 'definitions.group');
    }


    public function address()
    {
        return $this->morphOne(Address::class, 'model');
    }

    public function propertyType()
    {
        return $this->hasOne(Definition::class, 'id', 'property_type_id');
    }

    public function housingType()
    {
        return $this->hasOne(Definition::class, 'id', 'housing_type_id');
    }

    public function userStatus()
    {
        return $this->hasOne(Definition::class, 'id', 'user_status_id');
    }

    public function buildingAge()
    {
        return $this->hasOne(Definition::class, 'id', 'building_age_id');
    }

    public function agent()
    {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }


    public function getImagesAttribute()
    {
        $modelMedia = [];

        foreach ($this->media as $key => $mediaItem) {
            $modelMedia[$key]['id'] = $mediaItem->id;
            $modelMedia[$key]['file_name'] = $mediaItem->file_name;
            $modelMedia[$key]['mime_type'] = $mediaItem->mime_type;
            $modelMedia[$key]['size'] = $mediaItem->size;
            $modelMedia[$key]['url'] = $mediaItem->getUrl();
            $modelMedia[$key]['srcset'] = $mediaItem->getSrcset();
        }

        return $modelMedia;
    }

    public function image()
    {
        if (isset($this->media[0])) {
            return $this->media[0];
        }
        return null;
    }

    public static function getActiveFeatured($limit = 9)
    {
        return static::where('is_featured', 1)->where('status', 1)->with([
            'media',
            'propertyType',
            'housingType',
            'address',
            'agent',
        ])->limit($limit)->get();
    }

}
