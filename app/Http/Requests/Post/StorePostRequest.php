<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if($this->user_id==auth()->user()->id){
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:200',
            'body' => 'required|max:350',
            'user_id' => 'required',
            'community_id'=> 'required',
        ];
    }
}
