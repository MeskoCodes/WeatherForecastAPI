<?php

namespace App\Http\Requests\UpdateRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKvalitetVazduhaRequest extends FormRequest
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
        'pm10' =>['required'],
        'pm2_5'=>['required'],
        'so2'=>['required'],
        'co'=>['required'],
        'o3'=>['required'],
        'azot_dioksid'=>['required'],
        'sumpordioksid'=>['required']
        ];
    } 
    else {
        return[
        'vremenska_stanica_id'=>['sometimes','required'],
        'pm10' =>['sometimes','required'],
        'pm2_5'=>['sometimes','required'],
        'so2'=>['sometimes','required'],
        'co'=>['sometimes','required'],
        'o3'=>['sometimes','required'],
        'azot_dioksid'=>['sometimes','required'],
        'sumpordioksid'=>['sometimes','required']
    ];

    }
}

    protected function prepareforValidation(){
        $this->merge([
            'vremenskaStanicaId' => $this-> vremenska_stanica_id,
            'PM10'=>$this->pm10,
            'PM25'=>$this->pm2_5,
            'SO2'=>$this->so2,
            'CO'=>$this->co,
            'O3'=>$this->o3,
            'azotDioksid'=>$this->azot_dioksid,
            'sumporDioksid'=>$this->sumpordioksid
        ]);
    }
}
