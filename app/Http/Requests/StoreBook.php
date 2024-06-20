<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string',
            'cover'=>'required|image|mimes:png,gif,jpeg,webp',
            'author'=>'required|string',
            'category'=>'array',
            'page_count'=>'required|integer',
            'reading_time'=>'required|string',
            'year_of_publication'=>'required|integer',
            'age_restriction'=>'required|integer',
            'description'=>'required|string',
            'date_of_writing'=>'required|date',
            'volume'=>'required|integer',
            'isbn'=>'required|string',
            'interpreter'=>'required|string',
            'epub'=>'required|file'
        ];
    }
}
