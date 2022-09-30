<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Surat::all();
        return view('surat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('file_surat')) {
            $pathFile = $request->file('file_surat');
            $nameFile = $pathFile->getClientOriginalName();
            $path = $request->file('file_surat')->storeAs('file_surat', $nameFile, 'public');
        }

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'file_surat' => 'storage/' . $path,
        ]);

        return redirect()->route('surat.index')->with(['success' => 'Data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Surat::find($id);

        return view('surat.detail', compact('data'));
    }

    /**
     * Display the specified resource by keyword.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = Surat::where('judul', 'LIKE', '%' . $request->keyword . '%')->get();

        return view('surat.index', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Surat::find($id)->delete();

        return back()->with(['success' => 'Data berhasil dihapus']);
    }
}