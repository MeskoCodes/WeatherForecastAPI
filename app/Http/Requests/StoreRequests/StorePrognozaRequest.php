<?php

namespace App\Http\Requests\StoreRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StorePrognozaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'vremenska_stanica_id'=>['required'],
            'datum'=>['required'],
            'temperatura' =>['required'],
            'pritisak_vazduha' => ['required'],
            'vlaznost_vazduha' => ['required'],  
            'brzina_vetra' =>['required'],
            'smer_vetra'=>['required'],
        ];
    }

    protected function prepareforValidation(){
        $this->merge([
            'vremenskaStanicaId' => $this-> vremenska_stanica_id,
            'Datum'=>$this->datum,
            'Temperatura' =>$this->temperatura,
            'pritisakVazduha' =>$this->pritisak_vazduha,
            'vlaznostVazduha' =>$this->vlaznost_vazduha, 
            'brzinaVetra' =>$this->brzina_vetra,
            'smerVetra'=>$this->smer_vetra
            
        ]);
    }
}
