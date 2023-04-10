<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UmrahRequest extends FormRequest
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
            'name' => 'required',
            'location' => 'required',
            'from_city' => 'required',
            'to_city' => 'required',
            'makkah_desciption' => 'required',
            'madina_desciption' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_active' => 'required|in:active,dsiactive',
            'type' => 'required|in:regular,stop_over',
            'package_type' => 'required|in:umar,hajj',
            'is_offer' => '',
            'files.*' => 'required|image',
            'files' => 'required|array|max:20',
            'included' => 'required',
            'not_selected' => 'required',
            'important_notes' => 'required',
            'how_to_book' => 'required',
            'city_transit' => '',
            'start_date_transit' => '',
            'end_date_transit' => '',
            'description_transit' => '',
            'day_name_1' => 'required',
            'day_desciption_1' => 'required',
            'day_number_1' => 'required',
            'price_name_1' => 'required',
            'number_per_room_1' => 'required',
            'price_1' => 'required',


        ];
    }

    public function messages()
    {
        return [
//            'name.required' => trans('validation.nameIsRequired'),
        ];
    }
}