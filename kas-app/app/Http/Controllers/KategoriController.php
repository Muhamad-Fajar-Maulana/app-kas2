<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Log;
use App\Http\Requests\StoreKategoriRequest;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategoris = Kategori::latest()->paginate(10);
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(StoreKategoriRequest $request)
    {
        $data = $request->validated();
        $kategori = Kategori::create($data);

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'model' => 'Kategori',
            'model_id' => $kategori->id,
            'new_data' => $kategori->toArray(),
        ]);

        return redirect()->route('kategori.index')->with('success','Kategori berhasil dibuat');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(StoreKategoriRequest $request, Kategori $kategori)
    {
        $old = $kategori->toArray();
        $kategori->update($request->validated());

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'update',
            'model' => 'Kategori',
            'model_id' => $kategori->id,
            'old_data' => $old,
            'new_data' => $kategori->toArray(),
        ]);

        return redirect()->route('kategori.index')->with('success','Kategori diperbarui');
    }

    public function destroy(Kategori $kategori)
    {
        $old = $kategori->toArray();
        $kategori->delete();

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'delete',
            'model' => 'Kategori',
            'model_id' => $kategori->id,
            'old_data' => $old,
        ]);

        return redirect()->route('kategori.index')->with('success','Kategori dihapus');
    }
}
