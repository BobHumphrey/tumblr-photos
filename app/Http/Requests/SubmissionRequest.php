<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SubmissionRequest extends Request
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
            'gallery_id' => 'required',
            'photo_id' => 'required',
            'submitted_date' => 'date_format:m-d-Y',
            'published_date' => 'date_format:m-d-Y',
        ];
    }
}
