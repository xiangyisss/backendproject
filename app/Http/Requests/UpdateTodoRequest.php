<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
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
            'top_priority' => 'string|nullable',
            'goal_date' => 'int|nullable',
            'secondary_task' => 'string|nullable',
            'note' => 'string|nullable',
        ];
    }
}
