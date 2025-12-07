<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $table = 'kas';
    protected $fillable = ['tanggal','user_id','kategori_id','tipe_transaksi_id','nominal','keterangan'];

    protected $dates = ['tanggal'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function tipeTransaksi()
    {
        return $this->belongsTo(TipeTransaksi::class, 'tipe_transaksi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
