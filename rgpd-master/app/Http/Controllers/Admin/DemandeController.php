<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Controllers\Admin\Demande;
use App\Http\Requests\DemandeRequest;

class DemandeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$demandes = Demande::where('active', '=', 1)->whereNull('deleted_at')->orderBy('updated_at', 'desc')->paginate(env('DEMANDE_MAX_PAGE'));
    	return view('admin.demandes.index',compact('demandes','commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $demande = new Demande;
        return view('admin.demandes.create',compact('demande'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DemandeRequest $request)
    {
        $demande = new Demande;
        $demande->titre = $request->titre;
        $demande->description = $request->description;
        $demande->user_id = auth()->user()->id;
        if($demande->save() !== false)
        {
            $request->session()->flash('alert', ['class'=>'success','message'=>'Demande crée avec succès']);
        }
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        $commentaires = $demande->commentaires()->whereNull('deleted_at')->orderBy('updated_at', 'desc')->paginate(env('COMMENTAIRE_MAX_PAGE'));
        return view('admin.demandes.show',compact('demande','commentaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        return view('admin.demandes.edit', compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(DemandeRequest $request, Demande $demande)
    {
        if($demande->update($request->all()) !== false)
        {
            $request->session()->flash('alert', ['class'=>'success','message'=>'Demande modifiée avec succès']);
        }
        //return $this->show($demande);
        return redirect(url()->previous());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function showDestroyForm(Demande $demande)
    {
        return view('admin.demandes.destroy',compact('demande'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        $demande->deleted_at = now();
        if($demande->save() !== false)
        {
            $request->session()->flash('alert', ['class'=>'success','message'=>'Demande supprimée avec succès']);
        }
        return redirect('admin/demande');
    }
}
