<?php

namespace App\Http\Requests\Admin\SchedulingService;

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
            'scheduling_service' => 'required|exists:scheduling_services,id',
            'worker_id' => 'nullable|exists:users,id',
            'available_day' => 'nullable|date|date_format:Y-m-d',
            'start_at' => 'nullable|date_format:H:i',
            'end_at' => 'nullable|date_format:H:i|after:start_at',
            'price' => 'nullable|numeric'
        ];
    }

    public function all($keys = null): array
    {
        return array_merge(parent::all(), $this->route()->parameters());
    }
}
