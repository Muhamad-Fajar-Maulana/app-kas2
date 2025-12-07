<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\TipeTransaksi;
use App\Models\Kas;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        Kategori::insert([
            ['nama'=>'Umum', 'keterangan'=>'Kategori umum', 'created_at'=>now(),'updated_at'=>now()],
            ['nama'=>'Operasional', 'keterangan'=>'Biaya operasional','created_at'=>now(),'updated_at'=>now()],
        ]);

        TipeTransaksi::insert([
            ['nama'=>'Pemasukan','created_at'=>now(),'updated_at'=>now()],
            ['nama'=>'Pengeluaran','created_at'=>now(),'updated_at'=>now()],
        ]);

        Kas::create([
            'tanggal' => now()->toDateString(),
            'user_id' => 1,
            'kategori_id' => 1,
            'tipe_transaksi_id' => 1,
            'nominal' => 100000,
            'keterangan' => 'Saldo awal',
        ]);
    }
}
