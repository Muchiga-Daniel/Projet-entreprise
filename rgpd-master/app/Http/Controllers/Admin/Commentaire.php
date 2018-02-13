<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'texte','user_id','demande_id'
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

    protected $with = ['user'];

    /**
     * Get the demande record associated with the comment.
     */
    public function demande()
    {
        return $this->belongsTo('App\Http\Controllers\Admin\Demande');
    }

    /**
     * Get the user record associated with the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}