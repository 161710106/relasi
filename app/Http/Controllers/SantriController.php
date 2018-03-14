<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Santri;
use App\Pelajaran;
class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $santri = Santri::with('Pelajaran')->get();
        return view('santri.index',compact('santri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        $sa = Pelajaran::all();
        return view('santri.create',compact('sa'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'nama' => 'required|',
            'nis' => 'required',
            'pelajaran_id' => 'required|max:255'
        ]);

        $Santri = new Santri;
        $Santri->nama = $request->nama;
        $Santri->nis = $request->nis;
        $Santri->pelajaran_id = $request->pelajaran_id;
        $Santri->save();
        return redirect()->route('santri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $santri = Santri::findOrFail($id);
        return view('santri.show',compact('santri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // memanggil data pos berdasrkan id di halaman pos edit
        $sa = Pelajaran::all();
        $santri = Santri::findOrFail($id);
        return view('santri.edit',compact('sa','santri'));
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
        // unique dihapus karena ketika update data title tidak diubah juga tidak apa-apa
        $this->validate($request,[
            'nama' => 'required|max:255',
            'nis' => 'required',
            'pelajaran_id' => 'required|max:255'
        ]);

        // update data berdasarkan id
        $santri = Santri::findOrFail($id);
        $santri->nama = $request->nama;
        $santri->nis = $request->nis;
        $santri->pelajaran_id = $request->pelajaran_id;
        $santri->save();
        return redirect()->route('santri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete data beradasarkan id
        $santri = Santri::findOrFail($id);
        $santri->delete();
        return redirect()->route('santri.index');  
    }
}
