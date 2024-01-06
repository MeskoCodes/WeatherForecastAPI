<?php

namespace App\Http\Requests\BulkStoreRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStoreLokacijeRequest extends FormRequest
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
            '*.vremenska_stanica_id'=>['required', 'integer'],
            '*.grad'=>['required','string'],
            '*.drzava'=>['required','string'],
        ];
    }

    protected function prepareforValidation(){
        $data=[];
        foreach($this->toArray() as $obj){
            $obj['vremenska_stanica_id'] = $obj['vremenskaStanicaId']??null;
            $obj['grad'] = $obj['Grad']??null;
            $obj['drzava'] = $obj['Drzava']??null;
            $data[] = $obj;
    }
        $this-> merge ($data);
    }

}