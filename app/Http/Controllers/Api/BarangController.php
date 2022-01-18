<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Http\Response;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $barang = Barang::orderBy('id', 'desc')->latest()->paginate(15);
        return view('barang.index', compact('barang'));
        return Barang::all();
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_barang' => 'required|min:3|max:25|regex:/^[a-zA-Z ]+$/u',
                'harga_per_unit' => 'required',
                'photo' => 'required|max:2048|mimes:jpg,jpeg,png'
            ],
            [
                'name.regex' => 'The name field must be letter.'
            ]
        );

        $fileName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('img/barangs'), $fileName);

        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_per_unit = $request->harga_per_unit;
        $barang->photo = $fileName;
        $barang->save();

        return redirect()->route('barangs.index');
    }
    
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

   public function update(Request $request, Barang $barang)
    {
        $request->validate(
            [
                'nama_barang' => 'required|min:3|max:25|regex:/^[a-zA-Z ]+$/u',
                'harga_per_unit' => 'required',
                'photo' => 'required|max:2048|mimes:jpg,jpeg,png'
            ],
            [
                'name.regex' => 'The name field must be letter.'
            ]
        );

        $data = Barang::find($barang->id);

        if ($request->photo) {
            if (!empty($barang->photo)) {
                if (file_exists(public_path('img/barangs/' . $barang->photo))) {
                    unlink(public_path('img/barangs/' . $barang->photo));
                }
            }

            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('img/barangs'), $fileName);

            $data->photo = $fileName;
        }

        $data->nama_barang = $request->nama_barang;
        $data->harga_per_unit = $request->harga_per_unit;
        $data->save();
        return $data;

        return redirect()->route('barangs.index');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return Barang::destroy($id);
        return redirect()->route('barangs.index');
    }
}

