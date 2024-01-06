<?php

namespace App\Http\Requests\UpdateRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVremenskiUsloviRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $method = $this->method();
        if($method=='PUT'){

        return [
            'vremenska_stanica_id'=>['required'],
            'opis'=>['required'],
        ];
    }
        else{
            return[
            'vremenska_stanica_id'=>['sometimes','required'],
            'opis'=>['sometimes','required'],
        ];
        }
    }
    protected function prepareforValidation(){
        $this->merge([
            'vremenskaStanicaId' => $this-> vremenska_stanica_id,
            'Opis'=>$this->opis,
        ]);
    }
}
