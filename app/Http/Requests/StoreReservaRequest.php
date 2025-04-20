<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $quarto_id
 * @property mixed $preco_total
 */

class StoreReservaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'quarto_id' => 'required|numeric',
            'preco_total' => 'required|numeric',
        ];
    }
}
