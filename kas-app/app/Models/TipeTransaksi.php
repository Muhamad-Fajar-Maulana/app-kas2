<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeTransaksi extends Model
{
    protected $table = 'tipe_transaksi';
    protected $fillable = ['nama'];

    public function kas()
    {
        return $this->hasMany(Kas::class, 'tipe_transaksi_id');
    }
}
