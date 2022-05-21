<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'social.*' => 'nullable|url'
        ];
    }

    public function attributes()
    {
        return [
            'social.facebook' => 'facebook',
            'social.twitter' => 'twitter',
            'social.instagram' => 'instagram',
            'social.website' => 'website',
        ];
    }
}
