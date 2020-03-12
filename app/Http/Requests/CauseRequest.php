<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CauseRequest extends FormRequest
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
            //validation rules for causelist form
            'case_fileno' => 'required|unique:cases',
            'judge_id' => 'required|integer',
            'court_id' => 'required|integer',
            'action' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'case_date'=>'required',
            'litigants' => 'required',
        ];
    }
}
