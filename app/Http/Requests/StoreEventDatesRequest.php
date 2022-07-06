<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventDatesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'event_id' => 'required|numeric|exists:events,id',
            'name' => 'required',
            'is_show' => 'required|boolean',
            'start_datetime' => 'required|date_format:Y-m-d H:i:s|after:'.now(),
            'end_datetime' => 'required|date_format:Y-m-d H:i:s|after:start_datetime'
        ];
    }
}
