<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;
use App\User;

class CreatePostRequest extends FormRequest
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
        $id = $this->route('id');
        // $post=Post::find($id)->user->id;
      
        // $user_id = User::find($id);

        return [
            'title' => 'required|unique:posts|min:3',
            'description' => 'required|min:10',
            'user_id' => 'exists:users,id',
            'image' => 'image|mimes:png,jpg,jpeg',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Post Title Should Be Filled',
            'title.min' => 'Post Title Should Be At Least 3 Char',

            'description.required' => 'Post Description Should Be Filled',
            'description.min' => 'Post Title Should Be At Least 10 Char',

            'user_id.exists' => "User Id isn't Valid",
            'image.image' => "Image Type Isn't Compitable",




        ];

    }
}
