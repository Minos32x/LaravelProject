<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Post;


class StorePostRequest extends FormRequest
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
        $post = $this->route('post');
//        $post = Post::find($id);
        return [
            'title' => [
                'required', 'min:3', Rule::unique('posts')->ignore($post->title, 'title')
            ],
            'description' => 'required|min:10',
            'user_id' => 'required|exists:users,id',
            'image' => 'image|mimes:png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Post Title Should Be Filled',
            'title.min' => 'Post Title Should Be At Least 3 Char',
            'description.required' => 'Post Description Should Be Filled',
            'description.min' => 'Post Title Should Be At Least 10 Char'

        ];

    }

}
