<?php

namespace App\Http\Requests;

use App\Models\User;
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
            'social.*' => 'nullable|url',
            'options.disable_comments' => 'boolean',
            'options.moderate_comments' => 'boolean',
            'options.email_notification.*' => 'nullable',
            'user.username' => 'required|max:30|unique:users,username,' . auth()->id(),
            'user.name' => 'required|string',
            'user.profile_image' => 'nullable|image',
            'user.cover_image' => 'nullable|image',
            'user.city' => 'nullable|string',
            'user.country' => 'nullable|string',
            'user.about_me' => 'nullable|string',
        ];
    }

    public function attributes()
    {
        return [
            'social.facebook' => 'facebook',
            'social.twitter' => 'twitter',
            'social.instagram' => 'instagram',
            'social.website' => 'website',
            'user.username' => 'username',
            'user.name' => 'name',
            'user.profile_image' => 'profile image',
            'user.cover_image' => 'cover image',
            'user.city' => 'city',
            'user.country' => 'country',
            'user.about_me' => 'about me',
        ];
    }

    public function getData()
    {
        $data =  $this->validated();

        $directory = User::makeDirectory();
        $directory = $directory . "/user-" . auth()->id();

        if ($this->hasFile('user.profile_image')) {
            $data['user']['profile_image'] = $this->file('user.profile_image')->store($directory);
        }
        
        if ($this->hasFile('user.cover_image')) {
            $data['user']['cover_image'] = $this->file('user.cover_image')->store($directory);
        }

        return $data;
    }
}
