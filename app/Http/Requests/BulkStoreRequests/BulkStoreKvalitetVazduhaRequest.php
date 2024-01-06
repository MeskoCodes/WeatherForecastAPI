<?php

namespace App\Http\Requests\BulkStoreRequests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BulkStoreKvalitetVazduhaRequest extends FormRequest
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
            '*.vremenska_stanica_id' => ['required', 'integer'],
            '*.pm10' => ['required', 'numeric'],
            '*.pm2_5' => ['required', 'numeric'],
            '*.so2' => ['required', 'numeric'],
            '*.co' => ['required', 'numeric'],
            '*.o3' => ['required', 'numeric'],
            '*.azot_dioksid' => ['required', 'numeric'],
            '*.sumpordioksid' => ['required', 'numeric'],
        ];        
    }

    protected function prepareForValidation()
    {
        $data = [];
        foreach ($this->toArray() as $obj) {
            $obj['vremenska_stanica_id'] = $obj['vremenskaStanicaId'] ?? null;
            $obj['pm10'] = $obj['PM10'] ?? null;
            $obj['pm2_5'] = $obj['PM25'] ?? null;
            $obj['so2'] = $obj['SO2'] ?? null;
            $obj['co'] = $obj['CO'] ?? null;
            $obj['o3'] = $obj['O3'] ?? null;
            $obj['azot_dioksid'] = $obj['azotDioksid'] ?? null;
            $obj['sumpordioksid'] = $obj['sumporDioksid'] ?? null;
    
            $data[] = $obj;
        }
    
        $this->merge($data);
    }
    
}