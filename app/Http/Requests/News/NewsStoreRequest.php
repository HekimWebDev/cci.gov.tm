<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'      => 'required|string|min:3|max:255',
            'title_en'   => 'nullable|string|min:3|max:255',
            'title_tk'   => 'nullable|string|min:3|max:255',
            'desc'       => 'required|string|min:5',
            'desc_en'    => 'nullable|string|min:5',
            'desc_tk'    => 'nullable|string|min:5',
            'publish_at' => 'required|date',
            'thumbnail'  => 'required|image',
        ];
    }
}
