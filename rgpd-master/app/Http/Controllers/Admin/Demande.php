<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Demande extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre', 'description','user_id','lien_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $with = ['user','lien'];
    
    /**
     * Get the comments for the demande.
     */
    public function commentaires()
    {
        return $this->hasMany('App\Http\Controllers\Admin\Commentaire');
    }

    /**
     * Get the user record associated with the demande.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user record associated with the demande.
     */
    public function lien()
    {
        return $this->belongsTo('App\Http\Controllers\Admin\Lien','lien_id');
    }

}
