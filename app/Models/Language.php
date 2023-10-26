<?php

//namespace Io238\ISOCountries\Models;
namespace App\Models;

class Language extends BaseModel {

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return parent::resolveRouteBinding(strtolower($value), $field);
    }

    public static function enabled()
    {
        $locale = config('iso-countries.locales');
        return Language::whereIn('id', $locale)->get();
    }

}
