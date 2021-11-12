<?php

namespace App\Http\Requests\Admin\Feedstock;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'worker_service_id' => 'required|exists:worker_services,id',
            'name' => 'required|max:255'
        ];
    }
}
