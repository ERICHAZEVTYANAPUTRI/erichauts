<?php

namespace App\Http\Controllers;

use App\Models\warga;
use Illuminate\Http\Request;

class wargaController extends Controller
{
    public function index(){
    $warga = warga::all();
    return view('warga.index',compact(['warga']));
    }
//method untuk menampilkan view
    public function create()
{
    //memanggil view create
    return view('warga.create');
}
//method untuk insert data ke tabel warga
public function store(Request $request)
{
    //dd($request->except(['_token','submit']));
        warga::create($request->except(['_token','submit']));
        return redirect('/warga');
}
public function edit($id)
{
    $warga = warga::find($id);
    return view('warga.edit',compact(['warga']));
}
public function update($id, Request $request)
{
$warga = warga::find($id);
$warga->update($request->except(['_token','submit']));
return redirect('/warga');
}
//method untuk menghpus data warga
public function destroy($id)
{
    $warga = warga::find($id);
    $warga->delete();
    return redirect('/warga');
}
}

