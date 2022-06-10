<?php

namespace App\Http\Requests\Partners;

use Illuminate\Foundation\Http\FormRequest;

class PartnersUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'is_show'   => 'nullable|boolean',
            'name'      => 'required|string|min:3|max:255',
            'name_en'   => 'nullable|string|min:3|max:255',
            'name_tk'   => 'nullable|string|min:3|max:255',
            'title'     => 'required|string|min:3|max:255',
            'title_en'  => 'nullable|string|min:3|max:255',
            'title_tk'  => 'nullable|string|min:3|max:255',
            'phone'     => 'nullable|string|min:7|max:255',
            'faks'      => 'nullable|string|min:7|max:255',
            'email'     => 'nullable|string|email|max:255',
            'web'       => 'nullable|string|min:5|max:255',
            'adress'    => 'nullable|string|min:5|max:255',
            'adress_en' => 'nullable|string|min:5|max:255',
            'adress_tk' => 'nullable|string|min:5|max:255',
            'thumbnail' => 'nullable|image',
        ];
    }
}
