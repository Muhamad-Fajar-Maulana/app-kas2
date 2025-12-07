<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTipeTransaksiRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:100',
        ];
    }
}
