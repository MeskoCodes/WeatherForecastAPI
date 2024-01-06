<?php

namespace App\Http\Requests\UpdateRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePadavineRequest extends FormRequest
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
            'prognoza_id'=>['required'],
            'vremenska_stanica_id'=>['required'],
            'datum'=>['required'],
            'kolicina_padavina'=>['required'],
        ];
    }   else{
        return[
            'vremenska_stanica_id'=>['sometimes','required'],
            'prognoza_id'=>['sometimes','required'],
            'datum'=>['sometimes','required'],
            'kolicina_padavina'=>['sometimes','required'],
        ];
    }
    }
    protected function prepareforValidation(){
        $this->merge([
            'vremenskaStanicaId'=>$this->vremenska_stanica_id,
            'prognozaId'=>$this->prognoza_id,
            'Datum'=>$this->datum,
            'kolicinaPadavina'=>$this->kolicina_padavina,
            
        ]);
    }
}
