<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class TagsRequest extends BackendRequest
{

    public function rules()
    {

        return [
            'name' => 'required',
        ];

    }

}