<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'room_type_id'  => 'required',
            'name'          => 'required',
            'price'         => 'required',
            'is_active'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'room_type_id.required' => 'tipe kamar tidak boleh kosong',
            'name.required'         => 'nama kamar tidak boleh kosong',
            'price.required'        => 'harga kamar tidak boleh kosong',
            'is_active.required'    => 'aktivasi kamar tidak boleh kosong',
        ];
    }
}