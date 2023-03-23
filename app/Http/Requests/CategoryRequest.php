<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        $slug = request()->isMethod('put') ? 'required|unique:articles, slug' . $this->id : 'required|unique:articles';
        $image = request()->isMethod('put') ? 'nullable|mimes:jpg, png, jpeg' . $this->id : 'required:image';

        return [
           'title' => 'required|min:5|max:255',
           'slug' => $slug,
           'introduction' => 'required|min:10|max:255',
           'body' => 'required',
           'image' => $image,
           'status' => 'required|boolean',
           'category_id' => 'required|integer'
        ];
    }
}
