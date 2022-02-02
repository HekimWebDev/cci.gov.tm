<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\App;

trait Translatable
{
    protected $defaultLocal = 'ru';
    public function __($orignFieldName)
    {
        $local = App::getLocale() ?? $this->defaultLocal;

        if ($local === 'en') {
            $fieldName = $orignFieldName . '_en';
        } elseif ($local === 'tk') {
            $fieldName = $orignFieldName . '_tk';
        } else {
            $fieldName = $orignFieldName;
        }

        $attributes = array_keys($this->attributes);
        if (!in_array($fieldName, $attributes)) {
            throw new \LogicException("No such attribute for model ", get_class($this));
        }

        // if ($local === 'en' && is_null($this->$fieldName) || empty($this->$fieldName)) {
        //     return $this->$orignFieldName;
        // } elseif ($local === 'tk' && is_null($this->$fieldName) || empty($this->$fieldName)) {
        //     return $this->$orignFieldName;
        // }

        if ($local === 'en' && is_null($this->$fieldName) || empty($this->$fieldName)) {
            // return redirect()->back();
            return null;
        } elseif ($local === 'tk' && is_null($this->$fieldName) || empty($this->$fieldName)) {
            return null;
        }

        return $this->$fieldName;
    }
}
