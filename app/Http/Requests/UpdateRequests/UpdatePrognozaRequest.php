<?php

namespace App\Http\Requests\UpdateRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrognozaRequest extends FormRequest
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
            'datum'=>['required'],
            'temperatura' =>['required'],
            'pritisak_vazduha' => ['required'],
            'vlaznost_vazduha' => ['required'],  
            'brzina_vetra' =>['required'],
            'smer_vetra'=>['required'],
        ];
    }   else{
        return[
            'vremenska_stanica_id'=>['sometimes','required'],
            'datum'=>['sometimes','required'],
            'temperatura' =>['sometimes','required'],
            'pritisak_vazduha' => ['sometimes','required'],
            'vlaznost_vazduha' =>['sometimes','required'],
            'brzina_vetra' =>['sometimes','required'],
            'smer_vetra'=>['sometimes','required']
        ];
    }
    }
    protected function prepareforValidation(){
        $this->merge([
            'vremenskaStanicaId'=>$this->vremenska_stanica_id,
            'Datum'=>$this->datum,
            'Temperatura' =>$this->temperatura,
            'pritisakVazduha' =>$this->pritisak_vazduha,
            'vlaznostVazduha' =>$this->vlaznost_vazduha, 
            'brzinaVetra' =>$this->brzina_vetra,
            'smerVetra'=>$this->smer_vetra
            
        ]);
    }
}
