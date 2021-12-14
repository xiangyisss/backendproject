<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveTodoRequest extends FormRequest
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
            'top_priority' => 'string|required',
            'goal_date' => 'int|required',
            'secondary_task' => 'string|required',
            'note' => 'string|nullable',
        ];
    }

    public function messages() 
    {
        return [
            'top_priority' => 'You need to fill Top Priority',
            'goal_date' => 'Goal Date is invalid',
        ];
    }
}
