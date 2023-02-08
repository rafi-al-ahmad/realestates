<?php

namespace App\Models;

use App\Traits\ModelTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    use HasFactory, ModelTranslations;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'type',
        'group',
        'payload',
        'status',
    ];


    protected $translatable = [
        'title',
    ];


    const types = [
        "heating_type" => "heating_type",
        "user_status" => "user_status",
        "building_age" => "building_age",
        "property_type" => "property_type",
        "housing_type" => "housing_type",
        "feature" => "feature",
        "advertisement_type" => "advertisement_type"
    ];


    protected function title(): Attribute
    {
        return Attribute::make(
            get: $this->getAttributeTranslation()
        );
    }
}
