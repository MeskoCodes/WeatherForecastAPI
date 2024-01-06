<?php

namespace App\Http\Requests\BulkStoreRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class BulkStorePrognozaRequest extends FormRequest
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
            '*.vremenska_stanica_id'=>['required','integer'],
            '*.datum'=>['required','date'],
            '*.temperatura' =>['required','integer'],
            '*.pritisak_vazduha' => ['required','integer'],
            '*.vlaznost_vazduha' => ['required','numeric'],  
            '*.brzina_vetra' =>['required','integer'],
            '*.smer_vetra'=>['required','string'],
        ];
    }
    protected function prepareforValidation(){
        $data=[];
        foreach($this->toArray() as $obj){
            $obj['vremenska_stanica_id'] = $obj['vremenskaStanicaId']??null;
            $obj['datum'] = $obj['Datum']??null;
            $obj['temperatura'] = $obj['Temperatura']??null;
            $obj['pritisak_vazduha'] = $obj['pritisakVazduha']??null;
            $obj['vlaznost_vazduha'] = $obj['vlaznostVazduha']??null;
            $obj['brzina_vetra'] = $obj['brzinaVetra']??null;
            $obj['smer_vetra'] = $obj['smerVetra']??null;
            
            $data[] = $obj;
    }
        $this-> merge ($data);
}
}
