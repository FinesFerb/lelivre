<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBook extends FormRequest
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
            'title'=>'string',
            'cover'=>'image|mimes:png,gif,jpeg,webp',
            'author'=>'string',
            'category'=>'array',
            'page_count'=>'integer',
            'reading_time'=>'string',
            'year_of_publication'=>'integer',
            'age_restriction'=>'integer',
            'description'=>'string',
            'date_of_writing'=>'date',
            'volume'=>'integer',
            'isbn'=>'string',
            'interpreter'=>'string',
            'epub'=>'file'
        ];
    }
}
