<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tugas::orderBy('deadline', 'ASC')->get()->groupBy('nama_mapel'); 
        return view('index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tugas' => 'required',
            'nama_mapel' => 'required'
        ]);

        Tugas::create([
            'nis' => $request->nis,
            'nama_tugas' => $request->nama_tugas,
            'nama_mapel' => $request->nama_mapel,
            'deskripsi_tugas' => $request->deskripsi_tugas,
            'deadline' => $request->deadline,
        ]);

        return redirect()->to('/');
    }

    public function editStatus(Request $request, Tugas $tugas){
        $tugas->status = $request->status;
        $tugas->save();
        return redirect()->to('/');
    }

    public function editScore(Request $request, Tugas $tugas){
        $tugas->skor = $request->skor;
        $tugas->save();
        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tugas $tugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tugas)
    {
        //
    }
}
