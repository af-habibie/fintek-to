<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::orderBy('name', 'asc')->get();
        $transaksi = Transaksi::orderBy('id', 'desc')->latest()->paginate(15);
        return view('transaksi.index', compact('transaksi', 'user'));
    }

    public function create()
    {
        $user = User::orderBy('name', 'asc')->get();
        return view('transaksi.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'pembeli' => 'required',
                'jumlah_barang' => 'required',
                'nama_barang' => 'required',
                'total_harga' => 'required'
            ],
        );

        $transaksi = new Transaksi;
        $transaksi->pembeli = $request->pembeli;
        $transaksi->jumlah_barang = $request->jumlah_barang;
        $transaksi->nama_barang = $request->nama_barang;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->save();

        return redirect()->route('transaksis.index');
    }
    
    public function show(Transaksi $transaksi)
    {
        $user = User::orderBy('name', 'asc')->get();
        return view('transaksi.show', compact('transaksi','user'));
    }

    public function edit(Transaksi $transaksi)
    {
        $user = User::orderBy('name', 'asc')->get();
        return view('transaksi.edit', compact('transaksi', 'user'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate(
            [
                'pembeli' => 'required',
                'jumlah_barang' => 'required',
                'nama_barang' => 'required',
                'total_harga' => 'required'
            ],
        );
        
        $data = Transaksi::find($transaksi->id);
        $data->pembeli = $request->pembeli;
        $data->jumlah_barang = $request->jumlah_barang;
        $data->nama_barang = $request->nama_barang;
        $data->total_harga = $request->total_harga;
        $data->save();

        return redirect()->route('transaksis.index');
    }

    public function destroy(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->id);
        return redirect()->route('transaksis.index');
    }
}
