<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class CategoryRequest extends BackendRequest
{
    public function rules()
    {

        return [
            'name' => 'required',
            'slug' => 'required',
            'parent_id' => 'integer',
            'seo_title' => 'required',
            'seo_key' => 'required',
            'seo_desc' => 'required',
        ];

    }
}