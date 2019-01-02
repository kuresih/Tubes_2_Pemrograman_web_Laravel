<?php

namespace App\Http\Controllers;

use App\Puisii;
use Illuminate\Http\Request;

class PuisiiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puisiis = Puisii::orderBy('id', 'DESC')->paginate(5);
        return view('puisii.index', compact('puisiis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puisii.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $puisii = Puisii::create($request->all());

        return redirect()->route('puisii.index')->with('message', 'Puisi berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puisii = Puisii::findOrFail($id);
        return view('puisii.show', compact('puisii'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puisii = Puisii::findOrFail($id);
        return view('puisii.edit', compact('puisii'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required'
        ]);

        $puisii = Puisii::findOrFail($id)->update($request->all());

        return redirect()->route('puisii.index')->with('message', 'Puisi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puisii = Puisii::findOrFail($id)->delete();
        return redirect()->route('puisii.index')->with('message', 'Puisi berhasil dihapus!');
    }
}
