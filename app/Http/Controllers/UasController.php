<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\Uas;
use RealRashid\SweetAlert\Facades\Alert;

class UasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uas = Uas::all();
        return view('uas.index',compact('uas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Uas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uas = new Uas;

        $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $uas->npm = $request->npm;
        $uas->nama = $request->nama;
        $uas->alamat = $request->alamat;

        $simpan = $uas->save();

        
        if($simpan){
            Alert::success('success', 'data berhasil ditambah');
            redirect('/uas');
        }else{
            Alert::error('Failed', 'Gagal menyimpan data');
        }
        
        return redirect('/uas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uas = Uas::where('id',$id)->first();

        return view('uas.edit', compact('uas'));
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

        $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $uas = Uas::find($id);
        $uas->npm = $request->npm;
        $uas->nama = $request->umur;
        $uas->alamat = $request->alamat;

        $ubah = $uas->save();

        if($ubah){
            Alert::success('success', 'data berhasil di ubah');
            redirect('/uas');
        }else{
            Alert::error('Failed', 'Gagal menyimpan data');
        }
        
        return redirect('/uas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uas = Uas::find($id);
        $hapus= $uas ->delete();


        Alert::success('success', 'data berhasil di hapus');

        return redirect('/uas');
    }
}
