<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $constraints = [
            'title' => "required|max:255|unique:posts,title,{$this->id}",
            'excerpt' => 'required',
            'body' => 'required',
            'min_to_read' => 'required|min:0|max:60',
            'image' => 'mimes:png,jng,jpeg'
        ];

        if (in_array($this->method(), ['POST'])) {
            $constraints['title'] = 'required|unique:posts|max:255';
            $constraints['image'] = 'required|mimes:png,jng,jpeg';
        }

        return $constraints;
    }
}
