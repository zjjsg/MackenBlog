<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class ArticleForm extends BackendForm
{
    public function rules()
    {

        return [
            'cate_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ];

    }
}