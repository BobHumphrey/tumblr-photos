<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PhotoRequest extends Request
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
            'file_name' => 'required',
            'url' => 'required',
            'posted_date' => 'required|date_format:m-d-Y',
            'notes' => 'numeric',
            'other_notes' => 'numeric'
        ];
    }
}

