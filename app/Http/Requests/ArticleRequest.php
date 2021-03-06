<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'title' => 'required|min:3|max:252',
          'body' => 'required|max:252',
          'hi_price' => 'integer|max:9000000',
          'low_price' => 'integer|min:1000|max:9000000',
          'kind' => 'required',

            //
        ];
    }
}
