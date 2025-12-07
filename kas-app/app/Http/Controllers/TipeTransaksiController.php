<?php
namespace App\Http\Controllers;

use App\Models\TipeTransaksi;
use App\Models\Log;
use App\Http\Requests\StoreTipeTransaksiRequest;
use Illuminate\Support\Facades\Auth;

class TipeTransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = TipeTransaksi::latest()->paginate(10);
        return view('tipe_transaksi.index', ['tipeTransaksi' => $items]);
    }

    public function create()
    {
        return view('tipe_transaksi.create');
    }

    public function store(StoreTipeTransaksiRequest $request)
    {
        $data = $request->validated();
        $item = TipeTransaksi::create($data);

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'model' => 'TipeTransaksi',
            'model_id' => $item->id,
            'new_data' => $item->toArray(),
        ]);

        return redirect()->route('tipe_transaksi.index')->with('success','Tipe transaksi dibuat');
    }

    public function edit(TipeTransaksi $tipeTransaksi)
    {
        return view('tipe_transaksi.edit', compact('tipeTransaksi'));
    }

    public function update(StoreTipeTransaksiRequest $request, TipeTransaksi $tipeTransaksi)
    {
        $old = $tipeTransaksi->toArray();
        $tipeTransaksi->update($request->validated());

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'update',
            'model' => 'TipeTransaksi',
            'model_id' => $tipeTransaksi->id,
            'old_data' => $old,
            'new_data' => $tipeTransaksi->toArray(),
        ]);

        return redirect()->route('tipe_transaksi.index')->with('success','Tipe transaksi diperbarui');
    }

    public function destroy(TipeTransaksi $tipeTransaksi)
    {
        $old = $tipeTransaksi->toArray();
        $tipeTransaksi->delete();

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'delete',
            'model' => 'TipeTransaksi',
            'model_id' => $tipeTransaksi->id,
            'old_data' => $old,
        ]);

        return redirect()->route('tipe_transaksi.index')->with('success','Tipe transaksi dihapus');
    }
}
