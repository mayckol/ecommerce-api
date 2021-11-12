<?php

namespace App\Http\Requests\Admin\Feedstock;

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
            'worker_service_id' => 'nullable|exists:worker_services,id',
            'name' => 'nullable|max:255'
        ];
    }

    public function all($keys = null): array
    {
        return array_merge(parent::all(), $this->route()->parameters());
    }
}
