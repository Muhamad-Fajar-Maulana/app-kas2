<?php
namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Kategori;
use App\Models\TipeTransaksi;
use App\Models\Log;
use App\Http\Requests\StoreKasRequest;
use Illuminate\Support\Facades\Auth;

class KasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kass = Kas::with(['kategori','tipeTransaksi','user'])->latest()->paginate(10);
        return view('kas.index', compact('kass'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $tipe = TipeTransaksi::all();
        return view('kas.create', compact('kategori','tipe'));
    }

    public function store(StoreKasRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $kas = Kas::create($data);

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'model' => 'Kas',
            'model_id' => $kas->id,
            'new_data' => $kas->toArray(),
        ]);

        return redirect()->route('kas.index')->with('success','Data kas berhasil disimpan');
    }

    public function edit(Kas $kas)
    {
        $kategori = Kategori::all();
        $tipe = TipeTransaksi::all();
        return view('kas.edit', compact('kas','kategori','tipe'));
    }

    public function update(StoreKasRequest $request, Kas $kas)
    {
        $old = $kas->toArray();
        $kas->update($request->validated());

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'update',
            'model' => 'Kas',
            'model_id' => $kas->id,
            'old_data' => $old,
            'new_data' => $kas->toArray(),
        ]);

        return redirect()->route('kas.index')->with('success','Data kas diperbarui');
    }

    public function destroy(Kas $kas)
    {
        $old = $kas->toArray();
        $kas->delete();

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'delete',
            'model' => 'Kas',
            'model_id' => $kas->id,
            'old_data' => $old,
        ]);

        return redirect()->route('kas.index')->with('success','Data kas dihapus');
    }
}
