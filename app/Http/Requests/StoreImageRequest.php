<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'files' => 'required|array|min:1|max:5',
            'files.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }

    public function getFiles()
    {
        return $this->validated('files');
    }
}
