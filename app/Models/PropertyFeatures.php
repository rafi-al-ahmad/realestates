<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeatures extends Model
{
    use HasFactory;


    protected $fillable = [
        'property_id',
        'feature_id',
    ];

    public function properties()
    {
        return $this->hasMany(Definition::class, 'property_id', 'id');
    }

    public static function getFeaturesByGroup($features)
    {
        // group features by group attribute
        $featuresByGroup = [];
        foreach ($features ?? [] as $feature) {
            if ($feature->group == null) {
                $featuresByGroup[0][] = $feature;
            } else {
                $featuresByGroup[$feature->group][] = $feature;
            }
        }

        return $featuresByGroup;

    }
}
