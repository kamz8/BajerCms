<?php

namespace App\Http\Requests;

use App\Rules\EventDuration;
use App\Rules\withoutOverlapping;

class EditEventRequest extends FormRequest
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
     * @link withoutOverlapping
     * @param EventDuration
     * @return array
     */
    public function rules()
    {
        $id = $this->route('event');
        return [
            'description' => 'required',
            'start_date' => ['required','date_format:Y-m-d H:i:s','before:end_date', new EventDuration($this->end_date )],
            'end_date' => ['required','date_format:Y-m-d H:i:s','after:start_date', new withoutOverlapping($this->start_date,$id)]
        ];
    }
}
