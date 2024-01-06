<?php

namespace App\Http\Requests\BulkStoreRequests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BulkStorePadavineRequest extends FormRequest
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
     * @return array<string,
     */
    public function rules()
    {
        return [
            '*.vremenska_stanica_id'=>['required', 'integer'],
            '*.prognoza_id'=>['required', 'integer'],
            '*.datum'=>['required', 'date'],
            '*.kolicina_padavina'=>['required', 'numeric'],
        ];
    }
    protected function prepareforValidation(){
        $data=[];
        foreach($this->toArray() as $obj){
            $obj['vremenska_stanica_id'] = $obj['vremenskaStanicaId']??null;
            $obj['prognoza_id'] = $obj['prognozaId']??null;
            $obj['datum'] = $obj['Datum']??null;
            $obj['kolicina_padavina'] = $obj['kolicinaPadavina']??null;
            $data[] = $obj;
    }
        $this-> merge ($data);
}
}