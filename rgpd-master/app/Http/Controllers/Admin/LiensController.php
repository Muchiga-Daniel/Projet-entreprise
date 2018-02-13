<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Demande;
use App\Http\Controllers\Admin\Lien;
use App\Http\Requests\LiensRequest;

class LiensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($demande_id)
    {
        $lien = new Lien;
        return view('admin.liens.create',compact('lien','demande_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LiensRequest $request)
    {
        $demande = Demande::find($request->demande_id);
        $lien = new Lien;
        $lien = $lien->create($request->all());
        if($lien !== false)
        {
            $demande->lien_id = $lien->id;
            $demande->save();
            $request->session()->flash('alert', ['class'=>'success','message'=>'Lien créé avec succès']);
        }
        return redirect(url()->previous());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Controllers\Admin\Lien  $lien
     * @return \Illuminate\Http\Response
     */
    public function show(Lien $lien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Controllers\Admin\Lien  $lien
     * @return \Illuminate\Http\Response
     */
    public function edit(Lien $lien)
    {
        return view('admin.liens.edit',compact('lien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Controllers\Admin\Lien  $lien
     * @return \Illuminate\Http\Response
     */
    public function update(LiensRequest $request, Lien $lien)
    {
        if($lien->save($request->all()))
        {
            $request->session()->flash('alert', ['class'=>'success','message'=>'Lien modifié avec succès']);
        }
        return redirect(url()->previous());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Controllers\Admin\Lien  $lien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lien $lien)
    {
        $lien->deleted_at = date();
        if($lien->save())
        {
            $request->session()->flash('alert', ['class'=>'success','message'=>'Lien supprimé avec succès']);
        }
        return back();
    }
}
