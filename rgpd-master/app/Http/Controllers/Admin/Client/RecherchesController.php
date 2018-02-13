<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Admin\Client\Recherche;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\RechercheRequest;

class RecherchesController extends Controller
{
	/**
	 * Show the form for search of client's data.
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
    	return view('admin.clients.recherches.search');
    }

	/**
	 * Show the form for search of client's data.
	 * @return \Illuminate\Http\Response
	 */
    public function search(RechercheRequest $request)
    {
    	if($request->recherche == 'email')
    	{
    		$prospects = Recherche::getProspectInfoByEmail($request->email)->paginate(env('PROSPECT_MAX_PAGE'));
    		return view('admin.clients.recherches.search',compact('prospects'));
    	}
    	if($request->recherche == 'telephone')
    	{
    		$prospects = Recherche::getProspectInfoByPhone($request->telephone)->paginate(env('PROSPECT_MAX_PAGE'));
    		return view('admin.clients.recherches.search',compact('prospects'));
    	}
    	if($request->recherche == 'client')
    	{
    		$prospects = Recherche::getProspectInfoByNomPrenomDateNaissance($request->nom,$request->prenom,$request->date_naissance)->paginate(env('PROSPECT_MAX_PAGE'));
    		return view('admin.clients.recherches.search',compact('prospects'));
    	}
    	return back();
    }

    public function search(rechercheRequest $request)
    {
    	
    }


}
