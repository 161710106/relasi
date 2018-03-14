<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelajaran;
use App\Pengajar;
use Session;
class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $pelajaran = Pelajaran::with('Pengajar')->get();
        return view('pelajaran.index',compact('pelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Pengajar = Pengajar::all();
        return view('pelajaran.create',compact('Pengajar'));
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
            'pelajaran' => 'required|unique:pelajarans',
            'pengajar_id' => 'required'
        ]);
        $pelajaran = new Pelajaran;
        $pelajaran->pelajaran = $request->pelajaran;
        $pelajaran->pengajar_id = $request->pengajar_id;
        $pelajaran->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$pelajaran->pelajaran</b>"
        ]);
        return redirect()->route('pelajaran.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        return view('pelajaran.show',compact('pelajaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        $pengajar = Pengajar::all();
        $selectedPengajar = Pelajaran::findOrFail($id)->pengajar_id;
        return view('pelajaran.edit',compact('pelajaran','pengajar','selectedPengajar'));
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
        $this->validate($request,[
            'pelajaran' => 'required',
            'pengajar_id' => 'required'
        ]);
        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->pelajaran = $request->pelajaran;
        $pelajaran->pengajar_id = $request->pengajar_id;
        $pelajaran->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$pelajaran->nama</b>"
        ]);
        return redirect()->route('pelajaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('pelajaran.index');
    }
}
