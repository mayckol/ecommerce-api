<?php

namespace App\Http\Requests\Customer\Rating;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'rating' => 'required|exists:ratings,id',
            'client_id' => 'nullable|exists:users,id',
            'worker_service_id' => 'nullable|exists:worker_services,id',
            'rate' => 'nullable|numeric|min:0|max:5',
        ];
    }

    public function all($keys = null): array
    {
        return array_merge(parent::all(), $this->route()->parameters());
    }
}
