<?php

namespace App\Http\Controllers\Admin\Client;

use Illuminate\Database\Eloquent\Model;

class Recherche extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'Creation_Date',
        'Modiciation_Date',
        'Date_Naissance'
    ];

	const select = [
		'Prospect.Id_Prospect',
		'Nom',
		'Prenom',
		'Date_Naissance',
		'Prospect.Modiciation_Date',
		'Prospect_Campagne.Id_Prospect_Campagne',
		'Prospect_Campagne.Id_Campagne',
		'Campagne.Code',
		'Partenaire.Designation',
		'Email.Email',
		'Telephone.Numero'
		];

    /**
     * return prospect info from database searched by email
     * 
     * @param  string $email
     * 
     * @return QueryBuilder
     */
    public static function getProspectInfoByEmail($email)
    {
    	return \DB::connection('sqlsrv')
    		->table('UNICITE_GLOBALE.dbo.Prospect')
    		->select(Recherche::select)
    		->join('UNICITE_GLOBALE.dbo.Prospect_Email','Prospect.Id_Prospect','=','Prospect_Email.Id_Prospect')
    		->join('UNICITE_GLOBALE.dbo.Email','Email.Id_Email','=','Prospect_Email.Id_Email')
    		->join('UNICITE_GLOBALE.dbo.Prospect_Telephone','Prospect.Id_Prospect','=','Prospect_Telephone.Id_Prospect')
    		->join('UNICITE_GLOBALE.dbo.Telephone','Telephone.Id_Telephone','=','Prospect_Telephone.Id_Telephone')
    		->join('UNICITE_GLOBALE.dbo.Prospect_Campagne','Prospect.Id_Prospect','=','Prospect_Campagne.Id_Prospect')
    		->join('UNICITE_GLOBALE.dbo.Campagne','Prospect_Campagne.Id_Campagne','=','Campagne.Id_Campagne')
    		->join('UNICITE_GLOBALE.dbo.Partenaire','Campagne.Id_Partenaire','=','Partenaire.Id_Partenaire')
    		->where('Email.Email',$email)
    		->orderBy('Prospect_Campagne.Id_Prospect_Campagne','desc');
    }

    /**
     * return prospect info from database searched by phone
     * 
     * @param  string $email
     * 
     * @return QueryBuilder
     */
    public static function getProspectInfoByPhone($phone)
    {
    	return \DB::connection('sqlsrv')
    		->table('UNICITE_GLOBALE.dbo.Prospect')
    		->select(Recherche::select)
    		->join('UNICITE_GLOBALE.dbo.Prospect_Telephone','Prospect.Id_Prospect','=','Prospect_Telephone.Id_Prospect')
    		->join('UNICITE_GLOBALE.dbo.Telephone','Telephone.Id_Telephone','=','Prospect_Telephone.Id_Telephone')
    		->join('UNICITE_GLOBALE.dbo.Prospect_Email','Prospect.Id_Prospect','=','Prospect_Email.Id_Prospect')
    		->join('UNICITE_GLOBALE.dbo.Email','Email.Id_Email','=','Prospect_Email.Id_Email')
    		->join('UNICITE_GLOBALE.dbo.Prospect_Campagne','Prospect.Id_Prospect','=','Prospect_Campagne.Id_Prospect')
    		->join('UNICITE_GLOBALE.dbo.Campagne','Prospect_Campagne.Id_Campagne','=','Campagne.Id_Campagne')
    		->join('UNICITE_GLOBALE.dbo.Partenaire','Campagne.Id_Partenaire','=','Partenaire.Id_Partenaire')
    		->where('Telephone.numero',$phone)
    		->orderBy('Prospect_Campagne.Id_Prospect_Campagne','desc');
    }

    /**
     * return prospect info from database searched by phone
     * 
     * @param  string $email
     * 
     * @return QueryBuilder
     */
    public static function getProspectInfoByNomPrenomDateNaissance($nom,$prenom,$date_naissance)
    {
    	return \DB::connection('sqlsrv')
    		->table('UNICITE_GLOBALE.dbo.Prospect')
    		->select(Recherche::select)
    		->join('UNICITE_GLOBALE.dbo.Prospect_Telephone','Prospect.Id_Prospect','=','Prospect_Telephone.Id_Prospect')
    		->join('UNICITE_GLOBALE.dbo.Telephone','Telephone.Id_Telephone','=','Prospect_Telephone.Id_Telephone')
    		->join('UNICITE_GLOBALE.dbo.Prospect_Email','Prospect.Id_Prospect','=','Prospect_Email.Id_Prospect')
    		->join('UNICITE_GLOBALE.dbo.Email','Email.Id_Email','=','Prospect_Email.Id_Email')
    		->join('UNICITE_GLOBALE.dbo.Prospect_Campagne','Prospect.Id_Prospect','=','Prospect_Campagne.Id_Prospect')
    		->join('UNICITE_GLOBALE.dbo.Campagne','Prospect_Campagne.Id_Campagne','=','Campagne.Id_Campagne')
    		->join('UNICITE_GLOBALE.dbo.Partenaire','Campagne.Id_Partenaire','=','Partenaire.Id_Partenaire')
    		->where([
    					'nom' => $nom,
    					'prenom' => $prenom,
    					'date_naissance' => $date_naissance,
    				])
    		->orderBy('Prospect_Campagne.Id_Prospect_Campagne','desc');
    }

}
