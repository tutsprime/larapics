<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyCommentRequest extends FormRequest
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
            'body' => 'required|string'
        ];
    }

    public function getData()
    {
        $comment = $this->route('comment');

        return [
            'body' => "@" . $comment->user->username . " " . $this->body,
            'image_id' => $comment->image_id,
            'user_id' => $this->user()->id
        ];
    }
}
