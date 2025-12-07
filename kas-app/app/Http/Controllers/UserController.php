<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('user.index', compact('data'));
    }

    public function create()
    {
        return view('user.form');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['status'] = '1'; // default aktif
            User::create($data);

            DB::commit();
            return redirect()->route('user.index')->with('success', 'Data Berhasil Disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user.index')->with('error', $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('user.form_edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        DB::beginTransaction();
        try {
            $user->update($request->all());
            DB::commit();
            return redirect()->route('user.index')->with('success', 'Data Berhasil Diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user.index')->with('error', $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Data Berhasil Dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', $e->getMessage());
        }
    }
}