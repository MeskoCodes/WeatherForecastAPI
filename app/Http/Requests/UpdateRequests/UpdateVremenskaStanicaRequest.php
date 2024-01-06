<?php

namespace App\Http\Requests\UpdateRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVremenskaStanicaRequest extends FormRequest
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
                'naziv_stanice'=>['required'],
            ];
        } else {
            return [
                'naziv_stanice'=>['sometimes','required'], 
            ];
        }

    }

    protected function prepareforValidation(){
        $this->merge([
            'nazivStanice'=>$this->naziv_stanice
        ]);
    }
}
