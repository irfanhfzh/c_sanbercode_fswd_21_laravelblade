<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class PertanyaanController extends Controller
{
    public function index(){
        $pertanyaan = FacadesDB::table('pertanyaan')->get();
        // dd($pertanyaan);
        return view('pertanyaan.index', compact('pertanyaan'));
    }
    public function store(Request $request){
        // dd($request->all());

        $request->validate([
            "judul" => 'required|unique:pertanyaan',
            "isi" => 'required'
        ]);

        $query = FacadesDB::table('pertanyaan')->insert([
            "judul" => $request['judul'],
            "isi" => $request['isi']
        ]);

        return redirect('/pertanyaan')->with('sukses', 'Pertanyaan berhasil dibuat!');
    }
    public function create(){
        return view('pertanyaan.create');
    }

    public function show($id){
        $pertanyaan = FacadesDB::table('pertanyaan')->where('id', $id)->first();
        // dd($pertanyaan);
        return view('pertanyaan.show', compact('pertanyaan'));
    }

    public function edit($id){
        $pertanyaan = FacadesDB::table('pertanyaan')->where('id', $id)->first();

        return view('pertanyaan.edit', compact('pertanyaan'));
    }

    public function update($id, Request $request){
        $request->validate([
            "judul" => 'required|unique:pertanyaan',
            "isi" => 'required'
        ]);

        $query = FacadesDB::table('pertanyaan')
                            ->where('id', $id)
                            ->update([
                                'judul' => $request['judul'],
                                'isi' => $request['isi']
                            ]);
            
        return redirect('/pertanyaan')->with('sukses', 'Pertanyaan berhasil diupdate!');
    }

    public function destroy($id){
        $query = FacadesDB::table('pertanyaan')->where('id', $id)->delete();
        return redirect('/pertanyaan')->with('sukses', 'Pertanyaan berhasil dihapus!');
    }
}
