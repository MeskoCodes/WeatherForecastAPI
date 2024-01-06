<?php

namespace App\Http\Requests\StoreRequests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreObavijestiRequest extends FormRequest
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
            'tip_obavijesti'=>['required'],
            'sadrzaj'=>['required'],
        ];
    }

    protected function prepareforValidation(){
        $this->merge([
            'vremenskaStanicaId' => $this-> vremenska_stanica_id,
            'tipObavijesti'=>$this->tip_obavijesti,
            'Sadrzaj'=>$this->sadrzaj,
            
        ]);
    }
}