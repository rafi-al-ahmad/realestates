<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;

trait ModelTranslations
{
    use HasTranslations;

    public $displayLanguage = null;
    public $rawTranslations = false;

    /**
     * Get the model's attribute translation by language.
     *
     * @return function
     */
    protected function getAttributeTranslation()
    {
        return function ($value) {
            $decodedValue = json_decode($value, true);
            if ($this->rawTranslations) {
                return $decodedValue;
            }

            if ($this->displayLanguage) {
                if (isset($decodedValue[$this->displayLanguage])) {
                    return $decodedValue[$this->displayLanguage];
                }
            }
            if (isset($decodedValue[App::currentLocale()])) {
                return $decodedValue[App::currentLocale()];
            }
            if (isset($decodedValue[config("app.fallback_locale")])) {
                return $decodedValue[config("app.fallback_locale")];
            }
            return '';
        };
    }

    // public function getAttributeValue($key): mixed
    // {
    //     return parent::getAttributeValue($key);
    // }
}
