<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;

class Lien extends Model
{
	private $uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'valide_at','user_id','id_prospect','uuid','campagne_recrutement'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'valide_at',
        'deleted_at'
    ];

    protected $with = ['user'];
    
    /**
     * Get the comments for the demande.
     */
    public function demande()
    {
        return $this->hasOne('App\Http\Controllers\Admin\Demande','lien_id');
    }

    /**
     * Get the user record associated with the demande.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the valide_at date value. if empty, egal to now()+env(LIEN_VALIDE_DEFAULT_DAY)
     * @return datetime return valide_at value
     */
    public function getValideatAttribute($value)
    {
    	if(empty($value))
    	{		
	        $value = Carbon::create();
	        $value = $value->addDays(env('LIEN_VALIDE_DEFAULT_DAY'))->toDateString();
    	}
    	return $value;
    }

    /**
     * Get the Uuid value. if empty, egal to Uuid class
     * @return datetime return Uuid value
     */
    public function getUuidAttribute($value)
    {
    	if(empty($value))
    	{
    		$this->uuid = Uuid::uuid4();
	        $value = $this->uuid;
    	}
    	return $value;
    }

    /**
     * Get the Url value. if empty, egal to url
     * @return datetime return Url value
     */
    public function getUrlAttribute($value)
    {
    	if(empty($value))
    	{
	        $value = url('client');
	        $value .= '/'.$this->uuid;
    	}
    	return $value;
    }

}
