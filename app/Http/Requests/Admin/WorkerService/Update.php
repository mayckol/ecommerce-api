<?php

namespace App\Http\Requests\Admin\WorkerService;

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
            'worker_service' => 'nullable|numeric',
            'worker_id' => 'nullable|exists:users,id',
            'service_id' => 'nullable|exists:services,id',
            'price' => 'nullable|numeric'
        ];
    }

    public function all($keys = null): array
    {
        return array_merge(parent::all(), $this->route()->parameters());
    }
}
