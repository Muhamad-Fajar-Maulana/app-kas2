<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKasRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'tanggal' => 'required|date',
            'kategori_id' => 'nullable|exists:kategori,id',
            'tipe_transaksi_id' => 'required|exists:tipe_transaksi,id',
            'nominal' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ];
    }
}
