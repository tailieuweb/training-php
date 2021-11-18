<?php

namespace Botble\Member\Http\Requests;

class PostRequest extends \Botble\Blog\Http\Requests\PostRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return parent::rules() + ['image_input' => 'image|mimes:jpg,jpeg,png'];
    }
}
